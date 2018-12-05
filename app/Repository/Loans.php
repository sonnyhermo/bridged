<?php

namespace App\Repository;
use App\Loan;

class Loans{
    public function getApplication($loan_id, $bank_id, $status){
        $loans = Loan::select('id')
                        ->with([
                            'classifications:id,loan_id,classification',
                            'classifications.offers' => function($q) use($bank_id){
                                $q->select('id', 'classification_id', 'product')
                                ->where('bank_id', $bank_id);
                            },
                            'classifications.offers.applications' => function($q) use($status){
                                $q->where('status', $status);
                            },
                            'classifications.offers.applications.user'
                        ])
                        ->where('id', '=', $loan_id);
        return $loans;
    }
}