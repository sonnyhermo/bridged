<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('offers');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        $offer->with([
            'bank:id,logo,name',
            'classification:id,loan_id,description,collateral',
            'classification.loan:id,type',
            'classification.loan.purposes'
        ])->get();

        return view('chosen_offer', ['offer' => $offer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function search(Request $request){

        $offers = Offer::with([
            'bank:id,name,logo',
            'classification:id,loan_id,description,collateral', 
            'classification.loan:id,type',
            'terms'=>function($query){
                $query->where('term', '=', '3');
            }
        ])
        ->whereHas('terms', function($query){
            $query->where('term', '=', '3');
        })
        ->whereHas('classification', function($query){
            $query->where('loan_id', '=', '1');
        })
        ->where('classification_id', '=', '1')
        ->paginate(2);

        return view('offers',['offers' => $offers, 'amount' => '500000']);
    }
}
