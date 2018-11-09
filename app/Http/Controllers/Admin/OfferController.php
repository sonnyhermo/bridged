<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bank;
use App\Loan;
use App\Offer;
use App\Term;
use App\Http\Requests\StoreNewOfferRequest;
use Rap2hpoutre\FastExcel\FastExcel;

class OfferController extends Controller
{

    public function __construct()
    {   
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $banks = Bank::all();
        $loans = Loan::all();
        return view('admin.offers', ['module' => 'Offers', 'banks' => $banks, 'loans' => $loans]);
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
	public function store(StoreNewOfferRequest $request, Offer $offer)
    {

        $data = $request->validated();

        $data['slug'] = str_slug($data['product']).$data['bank_id'];
        $tempfile = $request->file('terms_rates')->store('tmp');

        $newOffer = $offer->create($data);

        if($newOffer){
            (new FastExcel)->import(storage_path('app/'.$tempfile), function ($line) use ($newOffer) {
                Term::create([
                    'offer_id' => $newOffer->id,
                    'term'=> $line['TERM'],
                    'interest_rate' => $line['INTEREST RATE'] 
                ]);
            });
            return ['status' => 1, 'title' => 'Success','message' => 'New Offer has been added!'];
        }else{
            return ['status' => 0, 'title' => 'Error', 'message' => 'Failed to add Offer!'];
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
}
