<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\Offer;
use Auth;
use App\Http\Requests\StoreApplicationRequest;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(StoreApplicationRequest $request, Application $application)
    {
        $data = $request->validated();

        $offer = Offer::select('id')->where('slug','=',$data['offer'])->first();
        $userId = Auth::user()->id;

        $is_applied = $application->create([
                        'offer_id' => $offer->id,
                        'user_id' => $userId,
                        'borrower_type' => $data['borrower_type'],
                        'amount' => $data['amount'],
                        'term' => $data['term']
                    ]);

        if(!$is_applied){
            return ['status' => 0, 'title' => 'Error', 'message' => 'Application Failed!'];
        }
        
        return ['status' => 1, 'title' => 'Success', 'message' => 'Application Sent'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
