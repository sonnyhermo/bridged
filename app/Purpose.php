<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purpose extends Model
{
	use SoftDeletes;

	protected $fillable = [
        'loan_id', 'purpose'
    ];
    protected $dates = ['deleted_at'];

    public function loan(){
    	return $this->belongsTo('App\Loan');
    }
}
