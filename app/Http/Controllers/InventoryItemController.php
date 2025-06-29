<?php

namespace App\Http\Controllers;

use App\Models\InventoryItem;
use Illuminate\Http\Request;

class InventoryItemController extends Controller
{
    public function index()
    {
        $inventoryItems = InventoryItem::all();
        return view('inventory_items.index', compact('inventoryItems'));
    }

    public function create()
    {
        return view('inventory_items.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Name' => 'required|string|max:100',
            'Unit' => 'required|string|max:50',
            'Availability' => 'required|boolean',
        ]);

        InventoryItem::create($validated);

        return redirect()->route('inventory_items.index')->with('success', 'Inventory item added.');
    }

    public function show(InventoryItem $inventory_item)
    {
        return view('inventory_items.show', ['inventoryItem' => $inventory_item]);
    }

    public function edit(InventoryItem $inventory_item)
    {
        return view('inventory_items.edit', ['inventoryItem' => $inventory_item]);
    }

    public function update(Request $request, InventoryItem $inventory_item)
    {
        $validated = $request->validate([
            'Name' => 'required|string|max:100',
            'Unit' => 'required|string|max:50',
            'Availability' => 'required|boolean',
        ]);

        $inventory_item->update($validated);

        return redirect()->route('inventory_items.index')->with('success', 'Inventory item updated.');
    }

    public function destroy(InventoryItem $inventory_item)
    {
        $inventory_item->delete();

        return redirect()->route('inventory_items.index')->with('success', 'Inventory item deleted.');
    }
}
