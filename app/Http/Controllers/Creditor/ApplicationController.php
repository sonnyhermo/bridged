<?php

namespace App\Http\Controllers\Creditor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Application;

class ApplicationController extends Controller
{
    public function updateApplication(Application $application, Request $request){

    	return $request;
    	
    	$application->status = $request->id;
    }
}
