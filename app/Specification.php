<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specification extends Model
{

	use SoftDeletes;

	protected $fillable = [
        'loan_id', 'description', 'collateral', 'slug'
    ];

    protected $dates = ['deleted_at'];

    public function loan(){
    	return $this->belongsTo('App\Loan');
    }

    public function offers(){
    	return $this->hasMany('App\Offer');
    }
}
