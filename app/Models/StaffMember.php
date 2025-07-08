<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffMember extends Model
{
    protected $table = 'staffmember';
    protected $primaryKey = 'Staffmember_ID';

    public $incrementing = true;
    public $timestamps = false;

    // ✅ Allow mass assignment for these fields
    protected $fillable = ['Name', 'Address', 'Salary'];

    // ✅ Relationships
    public function weddingChef()
    {
        return $this->hasOne(WeddingChef::class, 'Staffmember_ID', 'Staffmember_ID');
    }

    public function weddingServer()
    {
        return $this->hasOne(WeddingServer::class, 'Staffmember_ID', 'Staffmember_ID');
    }

    public function weddingPlanner()
    {
        return $this->hasOne(WeddingPlanner::class, 'Staffmember_ID', 'Staffmember_ID');
    }
}
