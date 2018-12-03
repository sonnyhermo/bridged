<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{

	use SoftDeletes;

    protected $fillable = ['name', 'email','description','coverage','slug','logo'];
    protected $dates = ['deleted_at'];
    protected $hidden = ['created_at', 'deleted_at', 'updated_at'];

    public function branches(){
    	return $this->hasMany('App\Branch');
    }

    public function offers(){
    	return $this->hasMany('App\Offers');
    }
}
