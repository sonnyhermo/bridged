<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    protected $fillable = [
    	 'user_id','gender','nationality','civil_status','birth_date','birth_place','mother_maiden','present_street','present_city','present_province','present_stay_length','present_ownership','permanent_street','permanent_city','permanent_province','permanent_stay_length','permanent_ownership',   
    ];

    protected $hidden = [
    	'created_at', 'updated_at'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function incomes(){
        return $this->hasMany('App\Income');
    }
}
