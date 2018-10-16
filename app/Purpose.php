<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purpose extends Model
{

	protected $fillable = [
        'loan_id', 'purpose'
    ];

    public function loan(){
    	return $this->belongsTo('App\Loan');
    }
}
