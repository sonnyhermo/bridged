<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{

	protected $fillable = [
		'offer_id','term','interest_rate'
	];

	protected $hidden = [
        'offer_id', 'created_at', 'updated_at',
    ];

    public function offer(){
    	return $this->belongsTo('App\Offer');
    }
}
