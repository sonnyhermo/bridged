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

    public function getUnassigned(){
        $bank = Auth::guard('creditor')->user()->bank_id;
        $model = $this->loans->getApplication(1,$bank,null);
        return Datatables::of($model)->make(true);
    }
}
