<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeddingStaffAssignment extends Model
{
    protected $table = 'wedding_staff_assignment';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = ['Wedding_ID', 'Staffmember_ID', 'Role', 'Assignment_Date'];

    public function wedding()
    {
        return $this->belongsTo(Wedding::class, 'Wedding_ID', 'Wedding_ID');
    }

    public function staffmember()
    {
        return $this->belongsTo(StaffMember::class, 'Staffmember_ID', 'Staffmember_ID');
    }
}
