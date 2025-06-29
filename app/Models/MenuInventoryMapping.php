<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuInventoryMapping extends Model
{
    protected $table = 'menu_inventorymapping';
    protected $primaryKey = 'Menu_inventorymapping_ID';
    public $timestamps = false;

    protected $fillable = ['MenuItem_ID', 'Inventory_ID', 'Quantity_Required'];

    public function menuItem()
    {
        return $this->belongsTo(WeddingMenuItem::class, 'MenuItem_ID', 'MenuItem_ID');
    }

    public function inventoryItem()
    {
        return $this->belongsTo(InventoryItem::class, 'Inventory_ID', 'Inventory_ID');
    }
}
