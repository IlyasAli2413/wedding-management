<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = 'guest';
    protected $primaryKey = 'Guest_ID';
    public $timestamps = false;

    protected $fillable = ['Name', 'Email', 'Wedding_ID'];

    public function wedding()
    {
        return $this->belongsTo(Wedding::class, 'Wedding_ID', 'Wedding_ID');
    }
}

