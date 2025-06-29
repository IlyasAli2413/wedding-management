<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Client;
use App\Models\Wedding;
use App\Models\Venue;
use App\Models\WeddingMenuItem;

class OrderController extends Controller
{
    // 🟢 List all orders (Admin)
    public function index()
    {
        $orders = Order::with(['client', 'wedding.venue', 'menuItems'])->get();
        return view('orders.index', compact('orders'));
    }

    // 🟢 List user's orders only (User)
    public function userIndex()
    {
        $orders = Order::with(['client', 'wedding.venue', 'menuItems'])
            ->where('User_ID', Auth::id())
            ->get();
        return view('orders.index', compact('orders'));
    }

    // 🟢 Show create form
    public function create()
    {
        $venues = Venue::all();
        $menuItems = WeddingMenuItem::all();
        return view('orders.create', compact('venues', 'menuItems'));
    }

    // 🟢 Store new order
    public function store(Request $request)
    {
        // Determine venue type and validate accordingly
        $venueType = $request->input('venue_type', 'existing');
        
        if ($venueType === 'existing') {
            $validated = $request->validate([
                'client_name' => 'required|string|max:255',
                'Client_Contact' => 'required|string|max:255',
                'Venue_ID' => 'required|exists:venue,Venue_ID',
                'Event_Type' => 'required|string|max:100',
                'Wedding_Date' => 'required|date',
                'Order_Date' => 'required|date',
                'Status' => 'required|string|max:50',
                'menu_items' => 'array',
                'menu_items.*.selected' => 'sometimes|boolean',
                'menu_items.*.MenuItem_ID' => 'required_with:menu_items.*.selected|exists:wedding_menu_item,MenuItem_ID',
                'menu_items.*.Quantity' => 'required_with:menu_items.*.selected|integer|min:1',
                'menu_items.*.Special_Notes' => 'nullable|string|max:500',
            ]);
            
            $venueId = $validated['Venue_ID'];
        } else {
            $validated = $request->validate([
                'client_name' => 'required|string|max:255',
                'Client_Contact' => 'required|string|max:255',
                'manual_venue_name' => 'required|string|max:255',
                'manual_venue_location' => 'required|string|max:255',
                'manual_venue_capacity' => 'required|integer|min:1',
                'Event_Type' => 'required|string|max:100',
                'Wedding_Date' => 'required|date',
                'Order_Date' => 'required|date',
                'Status' => 'required|string|max:50',
                'menu_items' => 'array',
                'menu_items.*.selected' => 'sometimes|boolean',
                'menu_items.*.MenuItem_ID' => 'required_with:menu_items.*.selected|exists:wedding_menu_item,MenuItem_ID',
                'menu_items.*.Quantity' => 'required_with:menu_items.*.selected|integer|min:1',
                'menu_items.*.Special_Notes' => 'nullable|string|max:500',
            ]);
            
            // Create new venue for manual entry
            $venue = Venue::create([
                'Name' => $validated['manual_venue_name'],
                'Location' => $validated['manual_venue_location'],
                'Capacity' => $validated['manual_venue_capacity'],
            ]);
            
            $venueId = $venue->Venue_ID;
        }

        // Create or find client
        $client = Client::where('Name', $validated['client_name'])
                       ->where('Contact', $validated['Client_Contact'])
                       ->first();
        
        if (!$client) {
            $client = Client::create([
                'Name' => $validated['client_name'],
                'Contact' => $validated['Client_Contact'],
                'Address' => 'Address to be updated', // Default address
            ]);
        }

        // Create wedding first
        $wedding = Wedding::create([
            'Venue_ID' => $venueId,
            'Event_Type' => $validated['Event_Type'],
            'Date' => $validated['Wedding_Date'],
            'Client_Contact' => $validated['Client_Contact'],
        ]);

        // Create order
        $order = Order::create([
            'Client_ID' => $client->Client_ID,
            'Wedding_ID' => $wedding->Wedding_ID,
            'Order_Date' => $validated['Order_Date'],
            'Status' => $validated['Status'],
            'User_ID' => Auth::id(),
        ]);

        // Attach menu items if provided
        if (isset($validated['menu_items'])) {
            foreach ($validated['menu_items'] as $menuItemId => $menuItemData) {
                if (isset($menuItemData['selected']) && $menuItemData['selected']) {
                    $order->menuItems()->attach($menuItemData['MenuItem_ID'], [
                        'Quantity' => $menuItemData['Quantity'],
                        'Special_Notes' => $menuItemData['Special_Notes'] ?? null,
                    ]);
                }
            }
        }

        // Redirect based on user role
        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin.orders.index')->with('success', 'Order created successfully.');
        } else {
            return redirect()->route('user.orders.index')->with('success', 'Order created successfully.');
        }
    }

    // 🟢 Show one order
    public function show($id)
    {
        $order = Order::with(['client', 'wedding.venue', 'menuItems'])->findOrFail($id);
        
        // Check if user can view this order
        if (!Auth::user()->isAdmin() && $order->User_ID !== Auth::id()) {
            abort(403, 'Access denied.');
        }
        
        return view('orders.show', compact('order'));
    }

    // 🟢 Edit form
    public function edit($id)
    {
        $order = Order::with(['wedding', 'menuItems', 'client'])->findOrFail($id);
        
        // Check if user can edit this order
        if (!Auth::user()->isAdmin() && $order->User_ID !== Auth::id()) {
            abort(403, 'Access denied.');
        }
        
        $venues = Venue::all();
        $menuItems = WeddingMenuItem::all();
        return view('orders.edit', compact('order', 'venues', 'menuItems'));
    }

    // 🟢 Update order
    public function update(Request $request, $id)
    {
        // Determine venue type and validate accordingly
        $venueType = $request->input('venue_type', 'existing');
        
        if ($venueType === 'existing') {
            $validated = $request->validate([
                'client_name' => 'required|string|max:255',
                'Client_Contact' => 'required|string|max:255',
                'Venue_ID' => 'required|exists:venue,Venue_ID',
                'Event_Type' => 'required|string|max:100',
                'Wedding_Date' => 'required|date',
                'Order_Date' => 'required|date',
                'Status' => 'required|string|max:50',
                'menu_items' => 'array',
                'menu_items.*.selected' => 'sometimes|boolean',
                'menu_items.*.MenuItem_ID' => 'required_with:menu_items.*.selected|exists:wedding_menu_item,MenuItem_ID',
                'menu_items.*.Quantity' => 'required_with:menu_items.*.selected|integer|min:1',
                'menu_items.*.Special_Notes' => 'nullable|string|max:500',
            ]);
            
            $venueId = $validated['Venue_ID'];
        } else {
            $validated = $request->validate([
                'client_name' => 'required|string|max:255',
                'Client_Contact' => 'required|string|max:255',
                'manual_venue_name' => 'required|string|max:255',
                'manual_venue_location' => 'required|string|max:255',
                'manual_venue_capacity' => 'required|integer|min:1',
                'Event_Type' => 'required|string|max:100',
                'Wedding_Date' => 'required|date',
                'Order_Date' => 'required|date',
                'Status' => 'required|string|max:50',
                'menu_items' => 'array',
                'menu_items.*.selected' => 'sometimes|boolean',
                'menu_items.*.MenuItem_ID' => 'required_with:menu_items.*.selected|exists:wedding_menu_item,MenuItem_ID',
                'menu_items.*.Quantity' => 'required_with:menu_items.*.selected|integer|min:1',
                'menu_items.*.Special_Notes' => 'nullable|string|max:500',
            ]);
            
            // Create new venue for manual entry
            $venue = Venue::create([
                'Name' => $validated['manual_venue_name'],
                'Location' => $validated['manual_venue_location'],
                'Capacity' => $validated['manual_venue_capacity'],
            ]);
            
            $venueId = $venue->Venue_ID;
        }

        $order = Order::with('wedding')->findOrFail($id);
        
        // Check if user can update this order
        if (!Auth::user()->isAdmin() && $order->User_ID !== Auth::id()) {
            abort(403, 'Access denied.');
        }

        // Create or find client
        $client = Client::where('Name', $validated['client_name'])
                       ->where('Contact', $validated['Client_Contact'])
                       ->first();
        
        if (!$client) {
            $client = Client::create([
                'Name' => $validated['client_name'],
                'Contact' => $validated['Client_Contact'],
                'Address' => 'Address to be updated', // Default address
            ]);
        }

        // Update wedding
        $order->wedding->update([
            'Venue_ID' => $venueId,
            'Event_Type' => $validated['Event_Type'],
            'Date' => $validated['Wedding_Date'],
            'Client_Contact' => $validated['Client_Contact'],
        ]);
        
        // Update order
        $order->update([
            'Client_ID' => $client->Client_ID,
            'Order_Date' => $validated['Order_Date'],
            'Status' => $validated['Status'],
        ]);

        // Update menu items
        $order->menuItems()->detach();
        if (isset($validated['menu_items'])) {
            foreach ($validated['menu_items'] as $menuItemId => $menuItemData) {
                if (isset($menuItemData['selected']) && $menuItemData['selected']) {
                    $order->menuItems()->attach($menuItemData['MenuItem_ID'], [
                        'Quantity' => $menuItemData['Quantity'],
                        'Special_Notes' => $menuItemData['Special_Notes'] ?? null,
                    ]);
                }
            }
        }

        // Redirect based on user role
        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully.');
        } else {
            return redirect()->route('user.orders.index')->with('success', 'Order updated successfully.');
        }
    }

    // 🟢 Delete order
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        
        // Check if user can delete this order
        if (!Auth::user()->isAdmin() && $order->User_ID !== Auth::id()) {
            abort(403, 'Access denied.');
        }
        
        $order->delete();
        
        // Redirect based on user role
        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully.');
        } else {
            return redirect()->route('user.orders.index')->with('success', 'Order deleted successfully.');
        }
    }
}
