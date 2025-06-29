<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeddingPlanner extends Model
{
    protected $table = 'weddingplanner';
    protected $primaryKey = 'Staffmember_ID';
    public $timestamps = false;

    public function staffMember()
    {
        return $this->belongsTo(StaffMember::class, 'Staffmember_ID', 'Staffmember_ID');
    }
}
