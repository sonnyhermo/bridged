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

    	return $this->fetchApplications($request->query('loan'),null, $request->query('sort'));
    
    }

    public function fetchBorrowerLoans($borrower){
        $model = $this->loan->getBorrowerApplications($borrower, Auth::guard('creditor')->user()->bank_id);
        return Datatables::of($model)->make(true);
    }

    private function fetchApplications($loan, $status, $order){
    	$bank = Auth::guard('creditor')->user()->bank_id;

        switch ($order) {
            case 'id-asc':
                $sort = ['key'=>'applications.id', 'value'=>'ASC'];
                break;
                
            case 'id-desc':
                $sort = ['key'=>'applications.id', 'value'=>'DESC'];
                break;

            case 'name-desc':
                $sort = ['key'=>'fullname', 'value'=>'DESC'];
                break;

            case 'name-desc':
                $sort = ['key'=>'fullname', 'value'=>'DESC'];
                break;
            
            default:
                $sort = ['key'=>'status', 'value'=>'ASC'];
                break;
        }

        $model = $this->loans->getApplications($loan,$bank,$status, $sort);
        return Datatables::of($model)->make(true);
    }

}
