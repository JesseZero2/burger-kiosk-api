<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * GET /api/cart/{session_id}
     * View all items currently in a cart session.
     */
    public function show(string $sessionId)
    {
        $cart = Cart::with('items')->where('session_id', $sessionId)->first();

        if (!$cart) {
            return response()->json(['message' => 'Cart not found.'], 404);
        }

        return response()->json($cart);
    }

    /**
     * POST /api/cart/{session_id}/items
     * Add an item to the cart (creates cart if it doesn't exist yet).
     *
     * Body:
     *   menu_item_id  (optional) integer
     *   product_name  (required) string
     *   quantity      (required) integer >= 1
     *   price         (required) numeric
     *   order_type    (optional) dine_in|take_out  — only used on first creation
     */
    public function addItem(Request $request, string $sessionId)
    {
        $validated = $request->validate([
            'menu_item_id' => 'nullable|integer',
            'product_name' => 'required|string',
            'quantity'     => 'required|integer|min:1',
            'price'        => 'required|numeric|min:0',
            'order_type'   => 'sometimes|in:dine_in,take_out',
        ]);

        return DB::transaction(function () use ($validated, $sessionId) {
            // Get or create the cart for this session
            $cart = Cart::firstOrCreate(
                ['session_id' => $sessionId],
                ['order_type' => $validated['order_type'] ?? 'dine_in', 'total' => 0]
            );

            // If the same menu item already exists in the cart, increase quantity
            $existing = $cart->items()
                ->where('menu_item_id', $validated['menu_item_id'] ?? null)
                ->where('product_name', $validated['product_name'])
                ->first();

            if ($existing) {
                $existing->quantity += $validated['quantity'];
                $existing->subtotal  = $existing->quantity * $existing->price;
                $existing->save();
            } else {
                $cart->items()->create([
                    'menu_item_id' => $validated['menu_item_id'] ?? null,
                    'product_name' => $validated['product_name'],
                    'quantity'     => $validated['quantity'],
                    'price'        => $validated['price'],
                    'subtotal'     => $validated['quantity'] * $validated['price'],
                ]);
            }

            $cart->recalculateTotal();

            return response()->json($cart->load('items'), 201);
        });
    }

    /**
     * DELETE /api/cart/{session_id}/items/{item_id}
     * Remove a single item from the cart.
     */
    public function removeItem(string $sessionId, int $itemId)
    {
        $cart = Cart::where('session_id', $sessionId)->first();

        if (!$cart) {
            return response()->json(['message' => 'Cart not found.'], 404);
        }

        $item = $cart->items()->find($itemId);

        if (!$item) {
            return response()->json(['message' => 'Item not found in cart.'], 404);
        }

        $item->delete();
        $cart->recalculateTotal();

        return response()->json($cart->load('items'));
    }

    /**
     * DELETE /api/cart/{session_id}
     * Clear all items from a cart (e.g. customer wants to start over).
     */
    public function clear(string $sessionId)
    {
        $cart = Cart::where('session_id', $sessionId)->first();

        if (!$cart) {
            return response()->json(['message' => 'Cart not found.'], 404);
        }

        $cart->items()->delete();
        $cart->recalculateTotal();

        return response()->json(['message' => 'Cart cleared.', 'cart' => $cart]);
    }

    /**
     * POST /api/cart/{session_id}/checkout
     * Convert cart into a real Order (hands off to Jesse's order system).
     * The cart is deleted after a successful checkout.
     *
     * Body:
     *   order_type  (optional) dine_in|take_out  — overrides cart value if provided
     */
    public function checkout(Request $request, string $sessionId)
    {
        $validated = $request->validate([
            'order_type' => 'sometimes|in:dine_in,take_out',
        ]);

        $cart = Cart::with('items')->where('session_id', $sessionId)->first();

        if (!$cart) {
            return response()->json(['message' => 'Cart not found.'], 404);
        }

        if ($cart->items->isEmpty()) {
            return response()->json(['message' => 'Cannot checkout an empty cart.'], 422);
        }

        return DB::transaction(function () use ($cart, $validated) {
            $orderType   = $validated['order_type'] ?? $cart->order_type;
            $queueNumber = Order::whereDate('created_at', today())->count() + 1;

            // Create the order (mirrors Jesse's OrderController logic)
            $order = Order::create([
                'order_number' => 'BK-' . now()->format('YmdHis'),
                'queue_number' => $queueNumber,
                'order_type'   => $orderType,
                'status'       => 'pending',
                'subtotal'     => $cart->total,
                'total'        => $cart->total,
            ]);

            // Copy cart items → order items
            foreach ($cart->items as $cartItem) {
                $order->items()->create([
                    'product_id'   => $cartItem->menu_item_id,
                    'product_name' => $cartItem->product_name,
                    'quantity'     => $cartItem->quantity,
                    'price'        => $cartItem->price,
                    'subtotal'     => $cartItem->subtotal,
                ]);
            }

            // Clean up the cart after successful checkout
            $cart->items()->delete();
            $cart->delete();

            return response()->json([
                'message' => 'Checkout successful. Order created.',
                'order'   => $order->load('items'),
            ], 201);
        });
    }
}