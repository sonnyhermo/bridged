<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Purpose;
use App\Loan;
use App\Classification;
use App\Bank;
use App\Offer;

class DataTableController extends Controller
{
   /* public function fetchLoans(){
    	return Datatables::of(Loan::all())->make();
    }*/

 	public function fetchPurposes(){
        $model = Purpose::with(['loan:id,type']);
        return Datatables::of($model)->make(true);
    }

    public function fetchClassifications(){
        return Datatables::of(Classification::with('loan:id,type'))->make();
    }

    public function fetchBanks(){
        $model = Bank::with(['branches'])->get();
        return Datatables::of($model)->make();
    }

    public function fetchOffers(){
        return Datatables::of(Offer::with([
            'bank:id,name',
            'classification:id,loan_id,classification', 
            'classification.loan:id,type',
            'terms'
        ]))
        ->make();
    }
}
