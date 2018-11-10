<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{

	protected $hidden = [
        'id','offer_id', 'created_at', 'updated_at',
    ];

    public function offer(){
    	return $this->belongsTo('App\Offer');
    }
}
