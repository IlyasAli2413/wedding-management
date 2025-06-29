<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeddingMenuItem extends Model
{
    protected $table = 'wedding_menu_item';
    protected $primaryKey = 'MenuItem_ID';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'Name',
        'Details',
        'Price'
    ];

    public $timestamps = true;

    // ✅ Wedding orders this menu item is used in
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'wedding_event', 'MenuItem_ID', 'Order_ID')
                    ->withPivot('Quantity', 'Special_Notes')
                    ->withTimestamps();
    }

    // ✅ Inventory items used in this menu item
    public function inventoryItems()
    {
        return $this->belongsToMany(InventoryItem::class, 'menu_inventorymapping', 'MenuItem_ID', 'Inventory_ID')
                    ->withPivot('Quantity_Required')
                    ->withTimestamps();
    }
}
