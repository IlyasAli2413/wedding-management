<?php

namespace App\Http\Controllers;

use App\Models\MenuInventoryMapping;
use App\Models\WeddingMenuItem;
use App\Models\InventoryItem;
use Illuminate\Http\Request;

class MenuInventoryMappingController extends Controller
{
    public function index()
    {
        $mappings = MenuInventoryMapping::with(['menuItem', 'inventoryItem'])->get();
        return view('menu_inventorymappings.index', compact('mappings'));
    }

    public function create()
    {
        $menuItems = WeddingMenuItem::all();
        $inventoryItems = InventoryItem::all();
        return view('menu_inventorymappings.create', compact('menuItems', 'inventoryItems'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'MenuItem_ID' => 'required|exists:wedding_menu_item,MenuItem_ID',
            'Inventory_ID' => 'required|exists:inventory_item,Inventory_ID',
            'Quantity_Required' => 'required|integer|min:1',
        ]);

        MenuInventoryMapping::create($validated);
        return redirect()->route('menu_inventorymappings.index')->with('success', 'Mapping added.');
    }

    public function show($id)
    {
        $mapping = MenuInventoryMapping::with(['menuItem', 'inventoryItem'])->findOrFail($id);
        return view('menu_inventorymappings.show', compact('mapping'));
    }

    public function edit($id)
    {
        $mapping = MenuInventoryMapping::findOrFail($id);
        $menuItems = WeddingMenuItem::all();
        $inventoryItems = InventoryItem::all();
        return view('menu_inventorymappings.edit', compact('mapping', 'menuItems', 'inventoryItems'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'MenuItem_ID' => 'required|exists:wedding_menu_item,MenuItem_ID',
            'Inventory_ID' => 'required|exists:inventory_item,Inventory_ID',
            'Quantity_Required' => 'required|integer|min:1',
        ]);

        $mapping = MenuInventoryMapping::findOrFail($id);
        $mapping->update($validated);

        return redirect()->route('menu_inventorymappings.index')->with('success', 'Mapping updated.');
    }

    public function destroy($id)
    {
        $mapping = MenuInventoryMapping::findOrFail($id);
        $mapping->delete();

        return redirect()->route('menu_inventorymappings.index')->with('success', 'Mapping deleted.');
    }
}
