<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'bank_id', 'branch', 'address', 'telephone', 'region'
    ];

    public function bank(){
    	return $this->belongsTo('App\Bank');
    }
}
