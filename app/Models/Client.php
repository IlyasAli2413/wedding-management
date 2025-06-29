<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'client';
    protected $primaryKey = 'Client_ID';
    public $timestamps = false;

    protected $fillable = ['Name', 'Address', 'Contact'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'Client_ID', 'Client_ID');
    }
}
