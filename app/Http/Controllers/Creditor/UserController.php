<?php

namespace App\Http\Controllers\Creditor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    
    public function getUserInfo($id){
    	$user = User::with([
    		'borrower'=> function($q){
    			return $q->where('user_id',1);
    		}])
    	->where('id', 1)
    	->first();

    	return view('creditor.user', ['user' => $user]);
    }
}
