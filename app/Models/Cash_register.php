<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cash_register extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable=[
            'user_id',
            'date_of_payment',
            'the_amount_of_the_deposit',
            'total_amount',

    ];



}
