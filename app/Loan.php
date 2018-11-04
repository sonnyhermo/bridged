<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loan extends Model
{

	use SoftDeletes;

	protected $fillable = ['type'];
	protected $dates = ['deleted_at'];

    public function classifications(){
    	return $this->hasMany('App\Classification');
    }

    public function purposes(){
    	return $this->hasMany('App\Purpose');
    }

    public function offers(){
    	return $this->hasMany('App\Offers');
    }

}
