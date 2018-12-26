<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{

    protected $fillable = [
        'document_type', 'user_id', 'borrower_type', 'path', 'filename'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
