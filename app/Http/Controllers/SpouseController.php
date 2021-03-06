<?php

namespace App\Http\Controllers;

use App\Spouse;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSpouseCoBorrowerRequest;


class SpouseController extends Controller
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
    public function store(StoreSpouseCoBorrowerRequest $request, Spouse $spouse)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;

        $is_created_spouse = $spouse->updateOrCreate($data);
        
        if($request->duplicate == 1){
            $is_created_coborrower = $coborrower->updateOrCreate($data);
        }

        if(!$is_created){
            return response()->json(['status' => 0, 'message' => 'Saving spouse information failed']);
        }

        return response()->json(['status' => 1, 'message' => 'Spouse information has been saved']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Spouse  $spouse
     * @return \Illuminate\Http\Response
     */
    public function show(Spouse $spouse)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Spouse  $spouse
     * @return \Illuminate\Http\Response
     */
    public function edit(Spouse $spouse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Spouse  $spouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spouse $spouse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Spouse  $spouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spouse $spouse)
    {
        //
    }
}
