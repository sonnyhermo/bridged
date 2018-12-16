<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePurpose;
use App\Purpose;

class PurposeController extends Controller
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
    public function store(StorePurpose $request, Purpose $purpose)
    {
        $data = $request->validated();
        $data['slug'] = str_slug($data['purpose'].' '.$data['loan_id'], '-');

        $newPurpose = $purpose->create($data);

        if( $newPurpose ){
            return redirect()->route('loans.index')->with('success','New loan purpose has been added!');
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
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Purpose $purpose)
    {
        return $purpose;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePurpose $request, Purpose $purpose)
    {
        $data = $request->validated();
        $data['slug'] = str_slug($data['purpose'].' '.$data['loan_id'], '-');

        $purpose->loan_id = $data['loan_id'];
        $purpose->purpose = $data['purpose'];
        $purpose->slug = str_slug($data['purpose'].' '.$data['loan_id'], '-');

        $is_updated = $purpose->save();
        
        if(!$is_updated){
            return redirect()->route('loans.index')->with('error','Purpose failed to update');
        }
        
        return redirect()->route('loans.index')->with('success','Purpose Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purpose $purpose)
    {
        $is_deleted = $purpose->delete();
        
        if(!$is_deleted){
            return response()->json(['code' => 0, 'message' => 'Deleting purpose Failed']);
        }

        return response()->json(['code' => 1, 'message' => 'Purpose Deleted']);
    }
}
