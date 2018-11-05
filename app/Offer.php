<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

    protected $fillable = ['bank_id', 'classification_id','product','min','max','terms', 'interest', 'min_income', 'requirements', 'slug'];


    public function bank(){
    	return $this->belongsTo('App\Bank');
    }

    public function classification(){
    	return $this->belongsTo('App\Classification');
    }

    public function terms(){
    	return $this->hasMany('App\Term');
    }

}
