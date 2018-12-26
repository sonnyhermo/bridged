<?php

namespace App\Http\Controllers\Creditor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Loan;

class LoanController extends Controller
{

	public function __construct(){
		$this->loans = Loan::select('type','slug')->get();
	}

    public function unassigned(){
    	return view('creditor.loans',['module' => 'unassigned', 'loans' => $this->loans]);
    }
}
