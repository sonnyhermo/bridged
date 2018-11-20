<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;
use App\Term;
use App\Loan;
use App\Classification;

class OfferController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $loans = Loan::all();
        $classifications = Classification::all();
        return view('offers',['loans' => $loans, 'classifications' => $classifications]);
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

        $offer_details = $offer->with([
            'classification:id,loan_id,description,classification,collateral',
            'terms:offer_id,term,interest_rate',
            'classification.loan:id,type',
            'classification.loan.purposes:loan_id,purpose'
        ])->get();

        return view('chosen_offer', ['offer' => $offer_details]);
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

        $loans = Loan::all();
        $classifications = Classification::all();

        $offers = Offer::with([
            'bank:id,name,logo',
            'classification:id,loan_id,description,collateral,slug', 
            'classification.loan:id,type,slug',
            'terms' => function($query) use ($request){
                $query->where('term', '=', $request->query('term'));
            }
        ])
        ->whereHas('terms', function($query) use ($request){
            $query->where('term', '=', $request->query('term'));
        })
        ->whereHas('classification', function($query) use ($request){
            $query->where('slug','=', $request->query('classification'));
        })
        ->whereHas('classification.loan', function($query) use ($request){
            $query->where('slug','=', $request->query('loan'));
        })
        ->paginate(1)
        ->appends(request()->query());;

        //return $offers;
        return view('offers',['offers' => $offers, 'amount' => '500000', 'loans' => $loans, 'classifications' => $classifications]);
    }
}
