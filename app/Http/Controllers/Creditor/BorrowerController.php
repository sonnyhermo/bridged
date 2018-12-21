<?php

namespace App\Http\Controllers\Creditor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class BorrowerController extends Controller
{
    public function getBorrower(User $borrower, $type){
    	$details = $borrower->with([
    		'borrower',
            'applications' => function($q) use($borrower,$type, ){
                return $q->where('user_id', $borrower->id)
                         ->where('borrower_type', $type);
            }
    	])
    	->where('id', $borrower->id)
    	->first();

        return view('creditor.details.borrower_details', ['details' => $details]);
    }

    public function getEntity(User $entity){
    	return $entity;
    }
}
