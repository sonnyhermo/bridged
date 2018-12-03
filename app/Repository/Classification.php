<?php

namespace App\Repository;
use App\Classification as AppClassification;

class Classification{
    public function getApplication($classification_id, $bank_id, $status){
        $classification = AppClassification::select('id')
                        ->with([
                            'offers'=>function($q) use($bank_id){
                                        $q->select('id','classification_id', 'product')
                                        ->where('bank_id', $bank_id);},
                            'offers.applications', function($q) use ($status){
                                $q->where('status', $status);
                            }])
                        ->where('id', $classification_id)
                        ->get();

        return $classification;
    }
}