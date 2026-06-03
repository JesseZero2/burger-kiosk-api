<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\MenuItem;

class MenuItemController extends Controller
{
    public function index(Request $request)
    {
        $query = MenuItem::query();

        if (!$request->boolean('all')) {
            $query->where('available', true);
        }

        $items = $query->orderBy('category')->orderBy('name')->get();

        return response()->json([
            'success' => true,
            'data' => $items,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'available' => 'nullable',
            'is_available' => 'nullable',
            'image_url' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $imageUrl = $request->image_url;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('menu-items', 'public');
            $imageUrl = url(Storage::url($path));
        }

        $available = $request->has('available')
            ? $request->boolean('available')
            : $request->boolean('is_available', true);

        $item = MenuItem::create([
            'name' => $validated['name'],
            'category' => $validated['category'],
            'price' => $validated['price'],
            'description' => $request->description,
            'image_url' => $imageUrl,
            'available' => $available,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Menu item created successfully.',
            'data' => $item,
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
            'data' => $item,
        ]);
    }

    public function update(Request $request, $id)
    {
        $item = MenuItem::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'category' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required|numeric|min:0',
            'description' => 'nullable|string',
            'available' => 'nullable',
            'is_available' => 'nullable',
            'image_url' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $data = $request->only([
            'name',
            'category',
            'price',
            'description',
            'image_url',
        ]);

        if ($request->has('available')) {
            $data['available'] = $request->boolean('available');
        } elseif ($request->has('is_available')) {
            $data['available'] = $request->boolean('is_available');
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('menu-items', 'public');
            $data['image_url'] = url(Storage::url($path));
        }

        $item->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Menu item updated successfully.',
            'data' => $item,
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
