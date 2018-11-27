<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = [
        'user_id','source','employer_name','industry','position','operation_length','monthly_income','employer_tel','employer_email'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
