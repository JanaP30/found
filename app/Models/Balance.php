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

    public static $_TYPE_AVAILABLE = 1;
    public static $_TYPE_RESERVED = 2;
}
