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

    public static $_STATUS_PENDING = 1;
    public static $_STATUS_REJECTED = 2;
    public static $_STATUS_APPROVED = 3;
}
