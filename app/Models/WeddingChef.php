<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeddingChef extends Model
{
    protected $table = 'weddingchef';
    protected $primaryKey = 'Staffmember_ID';
    public $timestamps = false;

    public function staff()
    {
        return $this->belongsTo(StaffMember::class, 'Staffmember_ID', 'Staffmember_ID');
    }
}
