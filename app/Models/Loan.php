<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'amount',
        'status',
        'description',
        'admin_response'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function transactions(){
        return $this->morphMany(Transaction::class, 'transactionable');
    }

    public static $_STATUS_PENDING = 1;
    public static $_STATUS_REJECTED = 2;
    public static $_STATUS_APPROVED = 3;

    public static function getStatuses(){
        return [
            Loan::$_STATUS_PENDING => 'Pending',
            Loan::$_STATUS_REJECTED => 'Rejected',
            Loan::$_STATUS_APPROVED => 'Approved'
        ];
    }

    public function getStatus(){
        return Loan::getStatuses()[$this->status];
    }
}
