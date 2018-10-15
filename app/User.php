<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
<<<<<<< HEAD
        'first_name', 'middle_name', 'last_name', 'email', 'password', 'referral_code'
=======
        'first_name', 'middle_name', 'last_name', 'email', 'password',
>>>>>>> 44c831806d786b4b11d86e756c5cda1b9019dbe7
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function individual(){
        return $this->hasOne('App\Individual');
    }

    public function entity(){
        return $this->hasMany('App\Entity');
    }
}
