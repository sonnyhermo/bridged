<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = ['bank_id', 'specification_id','product','min','max', 'min_income'];

    public function bank(){
    	return $this->belongsTo('App\Bank');
    }

    public function specification(){
    	return $this->belongsTo('App\Specification');
    }

    public function terms(){
    	return $this->hasMany('App\Term');
    }
}
