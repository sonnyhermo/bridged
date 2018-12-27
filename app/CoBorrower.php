<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoBorrower extends Model
{
    protected $fillable = [
        'user_id',
        'firstname',
        'middlename',
        'lastname',
        'gender',
        'nationality',
        'birth_date',
        'residence_address',
        'employer',
        'industry',
        'employer_address',
        'position',
        'tenure'
    ];

    protected $hidden = ['created_at','updated_at'];

    public function getFullName(){
        return "{$this->firstname} {$this->middlename} {$this->lastname}";
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
