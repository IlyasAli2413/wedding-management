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

        return redirect()->route('admin.menu-items.index')->with('success', 'Menu item created successfully.');
    }

    public function show(WeddingMenuItem $menuItem)
    {
        return view('wedding_menu_items.show', compact('menuItem'));
    }

    // Show menu item for users (read-only)
    public function userShow(WeddingMenuItem $menuItem)
    {
        return view('wedding_menu_items.show', compact('menuItem'));
    }

    public function edit(WeddingMenuItem $menuItem)
    {
        return view('wedding_menu_items.edit', compact('menuItem'));
    }

    public function update(Request $request, WeddingMenuItem $menuItem)
    {
        $validated = $request->validate([
            'Name' => 'required|string|max:100',
            'Details' => 'required|string',
            'Price' => 'required|numeric|min:0',
        ]);

        $menuItem->update($validated);

        return redirect()->route('admin.menu-items.index')->with('success', 'Menu item updated.');
    }

    public function destroy(WeddingMenuItem $menuItem)
    {
        $menuItem->delete();

        return redirect()->route('admin.menu-items.index')->with('success', 'Menu item deleted.');
    }
}
