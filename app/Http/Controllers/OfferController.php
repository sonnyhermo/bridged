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
    public function show($id)
    {
        return view('chosen_offer');
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
            'specification:id,loan_id',
            'specification.loan:id,type',
            'terms' => function($query){
                $query->where('term', '=', '4');
            }
        ])
        ->where('bank_id','=', '4')
        ->whereHas('specification',function($query){
            $query->where('loan_id', '=', '1');
        })
        ->whereHas('terms',function($query){
            $query->where('term', '=', '4');
        })
        ->where('min','<=', 50000)
        ->where('max','>=', 50000)
        ->paginate(2);
        

        return view('offers', ['offers' => $offers, 'amount'=>$request->query('amount')]);
    }
}
