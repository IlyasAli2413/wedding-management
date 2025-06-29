<?php

namespace App\Http\Controllers;

use App\Models\WeddingMenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeddingMenuItemController extends Controller
{
    // 🔧 Ensure route model binding uses 'MenuItem_ID' instead of 'id'
    public function getRouteKeyName()
    {
        return 'MenuItem_ID';
    }

    public function index()
    {
        $menuItems = WeddingMenuItem::all();
        return view('wedding_menu_items.index', compact('menuItems'));
    }

    // Show menu items for user selection
    public function userIndex()
    {
        $menuItems = WeddingMenuItem::all();
        return view('wedding_menu_items.index', compact('menuItems'));
    }

    public function create()
    {
        return view('wedding_menu_items.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Name' => 'required|string|max:100',
            'Details' => 'required|string',
            'Price' => 'required|numeric|min:0',
        ]);

        WeddingMenuItem::create($validated);

        return redirect()->route('admin.wedding_menu_items.index')->with('success', 'Menu item created successfully.');
    }

    public function show(WeddingMenuItem $wedding_menu_item)
    {
        return view('wedding_menu_items.show', ['menuItem' => $wedding_menu_item]);
    }

    // Show menu item for users (read-only)
    public function userShow(WeddingMenuItem $wedding_menu_item)
    {
        return view('wedding_menu_items.show', ['menuItem' => $wedding_menu_item]);
    }

    public function edit(WeddingMenuItem $wedding_menu_item)
    {
        return view('wedding_menu_items.edit', ['menuItem' => $wedding_menu_item]);
    }

    public function update(Request $request, WeddingMenuItem $wedding_menu_item)
    {
        $validated = $request->validate([
            'Name' => 'required|string|max:100',
            'Details' => 'required|string',
            'Price' => 'required|numeric|min:0',
        ]);

        $wedding_menu_item->update($validated);

        return redirect()->route('admin.wedding_menu_items.index')->with('success', 'Menu item updated.');
    }

    public function destroy(WeddingMenuItem $wedding_menu_item)
    {
        $wedding_menu_item->delete();

        return redirect()->route('admin.wedding_menu_items.index')->with('success', 'Menu item deleted.');
    }
}
