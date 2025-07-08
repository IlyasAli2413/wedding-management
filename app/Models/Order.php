<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders'; // Use the plural table name to match migration

    protected $primaryKey = 'Order_ID';

    public $incrementing = true; // Ensure Laravel treats Order_ID as auto-increment
    protected $keyType = 'int';  // Define the type of primary key

    protected $fillable = [
        'Client_ID',
        'Wedding_ID',
        'Order_Date',
        'Status',
        'User_ID',
    ];

    public $timestamps = true; // Enable timestamps

    // Relationships
    public function client()
    {
        return $this->belongsTo(Client::class, 'Client_ID');
    }

    public function wedding()
    {
        return $this->belongsTo(Wedding::class, 'Wedding_ID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'User_ID');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'Order_ID');
    }

    public function menuItems()
    {
        return $this->belongsToMany(WeddingMenuItem::class, 'wedding_event', 'Order_ID', 'MenuItem_ID')
                    ->withPivot('Quantity', 'Special_Notes')
                    ->withTimestamps();
    }
}
