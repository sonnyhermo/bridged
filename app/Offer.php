<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = ['name', 'email','description','coverage','slug','logo'];

    public function bank(){
    	return $this->belongsTo('App\Bank');
    }

    public function specification(){
    	return $this->belongsTo('App\Specification');
    }
}
