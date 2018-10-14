<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
	protected $fillable = [
        'loan_id', 'description', 'collateral'
    ];

    public function loan(){
    	return $this->belongsTo('App\Loan');
    }
}
