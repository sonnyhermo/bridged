<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
    	'offer_id', 'user_id', 'status', 'borrower_type'
    ];

    protected $hidden = [
    	'created_at', 'updated_at'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function offer(){
    	return $this->belongsTo('App\Offer');
    }

}
