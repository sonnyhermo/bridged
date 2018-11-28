<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\Offer;
use Auth;

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
    public function store(Request $request, Application $application)
    {
        $offer = Offer::select('id')->where('slug','=',$request->offer)->first();
        $userId = Auth::user()->id;
        $borrowerType = $request->borrower_type;

        $is_applied = $application->create([
                        'offer_id' => $offer->id,
                        'user_id' => $userId,
                        'borrower_type' => $borrowerType
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
