<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mutual_aid_fund extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable=[

            'first_name',
            'last_name',
            'address',
            'phone_number',
            'email',
            'password',
            

    ];
}
