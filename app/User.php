<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'middlename', 'lastname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email_verified_at', 'created_at', 'updated_at', 'deleted_at'
    ];

    protected $dates = ['deleted_at'];

    public function getFullName(){
        return "{$this->firstname} {$this->middlename} {$this->lastname}";
    }

    public function borrower(){
        return $this->hasOne('App\Borrower');
    }

    public function entities(){
        return $this->hasMany('App\Entity');
    }

    public function applications(){
        return $this->hasMany('App\Application');
    }

    public function incomes(){
        return $this->hasMany('App\Income');
    }

    public function attachments(){
        return $this->hasMany('App\Attachment');
    }
}
