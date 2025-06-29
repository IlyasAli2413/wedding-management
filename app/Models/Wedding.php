<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wedding extends Model
{
    protected $table = 'wedding';
    protected $primaryKey = 'Wedding_ID';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'Venue_ID',
        'Event_Type',
        'Date',
        'Client_Contact'
    ];

    protected $casts = [
        'Date' => 'date'
    ];

    public $timestamps = true;

    public function venue()
    {
        return $this->belongsTo(Venue::class, 'Venue_ID');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'Wedding_ID');
    }

    public function guests()
    {
        return $this->hasMany(Guest::class, 'Wedding_ID');
    }

    public function staffAssignments()
    {
        return $this->hasMany(WeddingStaffAssignment::class, 'Wedding_ID');
    }
}
