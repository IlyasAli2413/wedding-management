<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    protected $table = 'inventory_item';
    protected $primaryKey = 'Inventory_ID';
    public $timestamps = false;

    protected $fillable = ['Name', 'Description', 'Quantity', 'Unit_Price'];

    public function menuItems()
    {
        return $this->belongsToMany(WeddingMenuItem::class, 'menu_inventorymapping', 'Inventory_ID', 'MenuItem_ID')
                    ->withPivot('Quantity_Required');
    }
}
