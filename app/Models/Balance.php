<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Balance extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'total',
        'is_platform',
        'type'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function inTransactions(){
        return $this->belongsTo(Transaction::class, 'to_balance_id');
    }

    public function outTransactions(){
        return $this->belongsTo(Transaction::class, 'from_balance_id');
    }

    public static $_TYPE_AVAILABLE = 1;
    public static $_TYPE_RESERVED = 2;

    public static function getTypes(){
        return [
            Balance::$_TYPE_AVAILABLE => 'Available',
            Balance::$_TYPE_RESERVED => 'Reserved'
        ];
    }

    public function getType(){
        return Balance::getTypes()[$this->type];
    }
}
