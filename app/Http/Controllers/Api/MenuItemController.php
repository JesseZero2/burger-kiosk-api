<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuItem;

class MenuItemController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => MenuItem::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required'
        ]);

        $item = MenuItem::create([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'description' => $request->description,
            'image_url' => $request->image_url,
            'available' => $request->available ?? true
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Menu item created successfully',
            'data' => $item
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $item = MenuItem::findOrFail($id);

        $item->update($request->all());

        return response()->json([
            'success' => true,
            'data' => $item
        ]);
    }

    public function destroy($id)
    {
        $item = MenuItem::findOrFail($id);

        $item->delete();

        return response()->json([
            'success' => true,
            'message' => 'Deleted successfully'
        ]);
    }
}