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

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function fromBalance(){
        return $this->belongsTo(Balance::class, 'from_balance_id');
    }

    public function toBalance(){
        return $this->belongsTo(Balance::class, 'to_balance_id');
    }

    public function transactionable(){
        return $this->morphTo();
    }
    
    public static $_TYPE_DEPOSIT=1;
    public static $_TYPE_LOAN=2;
    public static $_TYPE_RESERVATION=3;
    public static $_TYPE_REFUND=4;

    public static function getTypes(){
        return [
            Transaction::$_TYPE_DEPOSIT => 'Deposit',
            Transaction::$_TYPE_LOAN => 'Loan',
            Transaction::$_TYPE_RESERVATION => 'Founds Reservation',
            Transaction::$_TYPE_REFUND => 'Refund',
        ];
    }

    public function getType(){
        return Transaction::getTypes()[$this->type];
    }
}
