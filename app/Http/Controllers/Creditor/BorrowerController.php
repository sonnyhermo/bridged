<?php

namespace App\Http\Controllers\Creditor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;

class BorrowerController extends Controller
{
    public function getBorrower($borrower, $type){
        $details = DB::table('users')
                    ->join('borrowers', 'users.id', '=', 'borrowers.user_id')
                    ->join('applications', 'users.id', '=', 'applications.user_id')
                    ->join('offers', 'applications.offer_id', '=', 'offers.id')
                    ->select(
                        'users.*' 
                       /*  'applications.*', 
                        'borrowers.*', 
                        'offers.*' */)
                    ->whereRaw('users.id = ?', [$borrower])
                    ->whereRaw('applications.borrower_type = ?', [$type])
                    ->get();
                
        return response()->json($details);
        return view('creditor.details.borrower_details', ['details' => $details]);
    }

    public function getEntity(User $entity){
    	return $entity;
    }

}
