<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $table = 'venue'; // Table name

    protected $primaryKey = 'Venue_ID'; // Custom primary key

    public $incrementing = true; // Auto-increment

    protected $keyType = 'int';

    public $timestamps = true; // Enable created_at and updated_at

    protected $fillable = ['Name', 'Location', 'Capacity']; // Mass-assignable fields

    // ✅ Fix route model binding to use Venue_ID instead of 'id'
    public function getRouteKeyName()
    {
        return 'Venue_ID';
    }

    public function weddings()
    {
        return $this->hasMany(Wedding::class, 'Venue_ID');
    }

    public function orders()
    {
        return $this->hasManyThrough(Order::class, Wedding::class, 'Venue_ID', 'Wedding_ID');
    }
}
