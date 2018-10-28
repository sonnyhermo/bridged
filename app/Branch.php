<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{

	use SoftDeletes;

    protected $fillable = [
        'bank_id', 'branch', 'address', 'telephone', 'region', 'slug'
    ];

    protected $dates = ['deleted_at'];

    public function bank(){
    	return $this->belongsTo('App\Bank');
    }
}
