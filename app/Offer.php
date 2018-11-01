<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = ['bank_id', 'specification_id','product','min','max','terms', 'interest', 'min_income', 'slug'];

    public function bank(){
    	return $this->belongsTo('App\Bank');
    }

    public function specification(){
    	return $this->belongsTo('App\Specification');
    }
}
