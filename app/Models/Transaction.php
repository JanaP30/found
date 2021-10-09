<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'amount',
        'from_balance_id',
        'to_balance_id',
        'type',
        'transactionable_id',
        'transactionable_type'
    ];
    
    public static $_TYPE_DEPOSIT=1;
    public static $_TYPE_LOAN=2;
    public static $_TYPE_RESERVATION=3;
    public static $_TYPE_REFUND=4;
}
