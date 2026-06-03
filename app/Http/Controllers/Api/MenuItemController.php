<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuItem;

class MenuItemController extends Controller
{
    /**
     * Return all available menu items.
     * Kiosk only shows items where available = true.
     * Admin can pass ?all=1 to get everything including hidden items.
     */
    public function index(Request $request)
    {
        $query = MenuItem::query();

        // Kiosk: show only available items
        // Admin: pass ?all=1 to see all items
        if (!$request->boolean('all')) {
            $query->where('available', true);
        }

        $items = $query->orderBy('category')->orderBy('name')->get();

        return response()->json([
            'success' => true,
            'data'    => $items,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price'    => 'required|numeric|min:0',
        ]);

        $item = MenuItem::create([
            'name'        => $request->name,
            'category'    => $request->category,
            'price'       => $request->price,
            'description' => $request->description,
            'image_url'   => $request->image_url,
            'available'   => $request->boolean('available', true),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Menu item created successfully.',
            'data'    => $item,
        ], 201);
    }

    public function show($id)
    {
        $item = MenuItem::find($id);

        if (!$item) {
            return response()->json([
                'success' => false,
                'message' => 'Menu item not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $item,
        ]);
    }

    public function update(Request $request, $id)
    {
        $item = MenuItem::findOrFail($id);

        $item->update([
            'name'        => $request->name        ?? $item->name,
            'category'    => $request->category    ?? $item->category,
            'price'       => $request->price       ?? $item->price,
            'description' => $request->description ?? $item->description,
            'image_url'   => $request->image_url   ?? $item->image_url,
            'available'   => $request->has('available')
                                ? $request->boolean('available')
                                : $item->available,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Menu item updated successfully.',
            'data'    => $item,
        ]);
    }

    public function destroy($id)
    {
        $item = MenuItem::findOrFail($id);
        $item->delete();

        return response()->json([
            'success' => true,
            'message' => 'Menu item deleted successfully.',
        ]);
    }
}