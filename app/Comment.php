<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
    	'application_id', 'user_type', 'comment'
    ];


    public function application(){
    	return $this->belongsTo('App\Application');
    }
}
