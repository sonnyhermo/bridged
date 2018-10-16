<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
	protected $fillable = ['type'];

    public function specifications(){
    	return $this->hasMany('App\Specification');
    }

    public function purposes(){
    	return $this->hasMany('App\Purpose');
    }

}
