<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classification extends Model
{

	use SoftDeletes;

	protected $fillable = [
        'loan_id', 'classification', 'collateral', 'description', 'slug'
    ];

    protected $dates = ['deleted_at'];

    public function loan(){
    	return $this->belongsTo('App\Loan');
    }

    public function offers(){
    	return $this->hasMany('App\Offer');
    }
}
