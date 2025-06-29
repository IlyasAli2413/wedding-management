<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeddingServer extends Model
{
    protected $table = 'weddingserver';
    protected $primaryKey = 'Staffmember_ID';
    public $timestamps = false;

    public function staffMember()
    {
        return $this->belongsTo(StaffMember::class, 'Staffmember_ID', 'Staffmember_ID');
    }
}
