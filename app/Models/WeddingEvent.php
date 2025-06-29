<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeddingEvent extends Model
{
    protected $table = 'wedding_event';
    public $incrementing = false;
    public $timestamps = false;

    protected $primaryKey = null;

    protected $fillable = ['Order_ID', 'MenuItem_ID', 'Quantity', 'Special_Notes'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'Order_ID', 'Order_ID');
    }

    public function menuItem()
    {
        return $this->belongsTo(WeddingMenuItem::class, 'MenuItem_ID', 'MenuItem_ID');
    }
}
