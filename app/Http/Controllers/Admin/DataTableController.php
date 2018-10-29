<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Purpose;
use App\Loan;
use App\Specification;
use App\Bank;

class DataTableController extends Controller
{
    public function fetchLoans(){
    	return Datatables::of(Loan::all())->make();
    }

 	public function fetchPurposes(){

        return Datatables::of(Purpose::with('loan'))->make();
    }

    public function fetchSpecifications(){
        return Datatables::of(Specification::with('loan'))->make();
    }

    public function fetchBanks(){
        return Datatables::of(Bank::all())->make();
    }
}
