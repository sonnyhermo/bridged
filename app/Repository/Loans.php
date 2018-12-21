<?php

namespace App\Repository;
use DB;

class Loans{
    public function getApplication($loan_id, $bank_id, $status, $sort){

        $loans = DB::table('applications')
                ->join('offers', 'applications.offer_id', '=', 'offers.id')
                ->join('banks', 'banks.id','=','offers.bank_id')
                ->join('classifications', 'classifications.id', '=', 'offers.classification_id')
                ->join('loans', 'classifications.loan_id', '=', 'loans.id')
                ->join('users', 'users.id', '=', 'applications.user_id')
                ->whereRaw('banks.id = ?',[$bank_id])
                ->whereRaw('loans.slug = ?',[$loan_id]);
                
                if($status == null){
                    $loans->where('applications.status');
                }else{
                    $loans->whereRaw('applications.status = ?',[$status]);
                }

                $loans->select('applications.created_at','users.id', DB::raw('CONCAT(users.firstname," ",users.middlename," ",users.lastname) as fullname'),'classifications.classification','applications.amount','applications.term','applications.borrower_type as type', DB::raw('IF (applications.status IS NULL, "Unassigned", applications.status) as status'))
                ->orderBy($sort['key'], $sort['value'])
                ->get();

        return $loans;
    }
}