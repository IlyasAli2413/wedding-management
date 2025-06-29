<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';
    protected $primaryKey = 'Payment_ID';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'Order_ID',
        'Payment_Date',
        'Amount',
        'Method',
        'Status',
        'User_ID'
    ];

    public $timestamps = true;

    public function order()
    {
        return $this->belongsTo(Order::class, 'Order_ID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'User_ID');
    }
}
