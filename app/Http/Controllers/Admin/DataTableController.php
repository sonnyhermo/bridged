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
use App\Branch;

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
        $model = Bank::all();
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

    public function fetchBranches(Request $request){
       $bank = Bank::select('id')->where('slug', $request->query('bank'))->first();
       $model = Branch::where('bank_id',$bank->id);
       return Datatables::of($model)->make();
    }
}
