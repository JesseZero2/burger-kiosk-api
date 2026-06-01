<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    /**
     * GET /api/payments
     * List all payments (admin use).
     */
    public function index()
    {
        $payments = Payment::with('order')->latest()->get();
        return response()->json($payments);
    }

    /**
     * GET /api/payments/{payment_id}
     * View a single payment with its order.
     */
    public function show(int $paymentId)
    {
        $payment = Payment::with('order.items')->find($paymentId);

        if (!$payment) {
            return response()->json(['message' => 'Payment not found.'], 404);
        }

        return response()->json($payment);
    }

    /**
     * POST /api/payments
     * Record a payment for an order.
     *
     * Body:
     *   order_id         (required) integer
     *   payment_method   (required) cash|card|gcash|maya
     *   amount           (required) numeric  — amount tendered
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id'       => 'required|integer|exists:orders,id',
            'payment_method' => 'required|in:cash,card,gcash,maya',
            'amount'         => 'required|numeric|min:0',
        ]);

        $order = Order::findOrFail($validated['order_id']);

        // Prevent double-payment
        $existingPaid = Payment::where('order_id', $order->id)
            ->where('payment_status', 'paid')
            ->exists();

        if ($existingPaid) {
            return response()->json(['message' => 'This order has already been paid.'], 422);
        }

        // Validate tendered amount covers order total
        if ($validated['amount'] < $order->total) {
            return response()->json([
                'message'       => 'Insufficient amount. Order total is ' . $order->total,
                'order_total'   => $order->total,
                'amount_given'  => $validated['amount'],
                'short_by'      => $order->total - $validated['amount'],
            ], 422);
        }

        return DB::transaction(function () use ($validated, $order) {
            $payment = Payment::create([
                'order_id'        => $order->id,
                'payment_method'  => $validated['payment_method'],
                'amount'          => $validated['amount'],
                'payment_status'  => 'paid',
                'transaction_ref' => 'TXN-' . strtoupper(Str::random(10)),
                'authorized_at'   => now(),
                'captured_at'     => now(),
            ]);

            // Auto-update order status to preparing once paid
            $order->update(['status' => 'preparing']);

            $change = $validated['amount'] - $order->total;

            return response()->json([
                'message'         => 'Payment recorded successfully.',
                'payment'         => $payment->load('order'),
                'change'          => round($change, 2),
            ], 201);
        });
    }

    /**
     * GET /api/payments/order/{order_id}
     * Get payment(s) for a specific order.
     */
    public function byOrder(int $orderId)
    {
        $order = Order::findOrFail($orderId);

        $payments = Payment::where('order_id', $orderId)->get();

        return response()->json([
            'order'    => $order,
            'payments' => $payments,
        ]);
    }

    /**
     * POST /api/payments/{payment_id}/void
     * Void / cancel a payment (e.g. wrong item, customer cancels).
     * Also sets order status back to cancelled.
     */
    public function void(int $paymentId)
    {
        $payment = Payment::find($paymentId);

        if (!$payment) {
            return response()->json(['message' => 'Payment not found.'], 404);
        }

        if ($payment->payment_status === 'voided') {
            return response()->json(['message' => 'Payment is already voided.'], 422);
        }

        DB::transaction(function () use ($payment) {
            $payment->update(['payment_status' => 'voided']);
            $payment->order->update(['status' => 'cancelled']);
        });

        return response()->json([
            'message' => 'Payment voided and order cancelled.',
            'payment' => $payment->fresh()->load('order'),
        ]);
    }
}