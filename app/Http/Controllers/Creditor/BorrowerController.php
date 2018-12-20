<?php

namespace App\Http\Controllers\Creditor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class BorrowerController extends Controller
{
    public function getBorrower(User $borrower){
    	return $borrower->with([
    		'borrower'=> function($q) use($borrower){
    			return $q->where('user_id',$borrower->id);
    		}
    	])
    	->where('id', $borrower->id)
    	->first();
    }

    public function getEntity(User $entity){
    	return $entity;
    }
}
