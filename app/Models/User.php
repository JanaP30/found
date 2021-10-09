<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'type'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public function balance(){
        return $this->hasOne(Balance::class);
    }

    public function deposits(){
        return $this->hasMany(Deposit::class);
    }

    public function loans(){
        return $this->hasMany(Loan::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    public function isAdmin(){
        return $this->type == User::$_GROUP_ADMIN;
    }

    public static $_GROUP_ADMIN=1;
    public static $_GROUP_USER=2;
}

