<?php

namespace App\Http\Controllers;

use App\Models\WeddingEvent;
use App\Models\Order;
use App\Models\WeddingMenuItem;
use Illuminate\Http\Request;

class WeddingEventController extends Controller
{
    public function index()
    {
        $weddingEvents = WeddingEvent::with(['order', 'menuItem'])->get();
        return view('wedding_events.index', compact('weddingEvents'));
    }

    public function create()
    {
        $orders = Order::all();
        $menuItems = WeddingMenuItem::all();
        return view('wedding_events.create', compact('orders', 'menuItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Order_ID' => 'required|exists:order,Order_ID',
            'MenuItem_ID' => 'required|exists:wedding_menu_item,MenuItem_ID',
            'Quantity' => 'required|integer|min:1',
            'Special_Notes' => 'nullable|string'
        ]);

        WeddingEvent::create($request->all());

        return redirect()->route('wedding_events.index')->with('success', 'Menu item assigned to wedding.');
    }

    public function show($orderId, $menuItemId)
    {
        $event = WeddingEvent::where('Order_ID', $orderId)
                             ->where('MenuItem_ID', $menuItemId)
                             ->with(['order', 'menuItem'])
                             ->firstOrFail();

        return view('wedding_events.show', compact('event'));
    }

    public function edit($orderId, $menuItemId)
    {
        $event = WeddingEvent::where('Order_ID', $orderId)
                             ->where('MenuItem_ID', $menuItemId)
                             ->firstOrFail();

        $orders = Order::all();
        $menuItems = WeddingMenuItem::all();

        return view('wedding_events.edit', compact('event', 'orders', 'menuItems'));
    }

    public function update(Request $request, $orderId, $menuItemId)
    {
        $request->validate([
            'Quantity' => 'required|integer|min:1',
            'Special_Notes' => 'nullable|string'
        ]);

        $event = WeddingEvent::where('Order_ID', $orderId)
                             ->where('MenuItem_ID', $menuItemId)
                             ->firstOrFail();

        $event->update($request->only(['Quantity', 'Special_Notes']));

        return redirect()->route('wedding_events.index')->with('success', 'Wedding event menu updated.');
    }

    public function destroy($orderId, $menuItemId)
    {
        $event = WeddingEvent::where('Order_ID', $orderId)
                             ->where('MenuItem_ID', $menuItemId)
                             ->firstOrFail();

        $event->delete();

        return redirect()->route('wedding_events.index')->with('success', 'Wedding event menu deleted.');
    }
}
