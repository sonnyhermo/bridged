<?php

namespace App\Http\Controllers\Creditor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Loans;
use Yajra\Datatables\Datatables;
use Auth;

class DataTableController extends Controller
{
    private $loans;

    public function __construct(Loans $loans){
        $this->loans = $loans;
    }

    public function getUnassigned(Request $request){

    	return $this->fetchApplications($request->query('loan'),null);
    
    }

    private function fetchApplications($loan, $status){
    	$bank = Auth::guard('creditor')->user()->bank_id;
        $model = $this->loans->getApplication($loan,$bank,$status);
        return Datatables::of($model)->make(true);
    }
}
