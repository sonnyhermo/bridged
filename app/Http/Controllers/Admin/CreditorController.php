<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCreditorRequest;
use App\Creditor;
use Hash;

class CreditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
    public function store(StoreCreditorRequest $request, Creditor $creditor)
    {

        $data = $request->validated();
        $data['password'] = bcrypt($request->password);

        $newCreditor = $creditor->create($data);

        if($newCreditor){
            return response()->json(['status' => 1, 'title' => 'Success','message' => 'New Creditor has been added!']);
        }else{
            return response()->json(['status' => 0, 'title' => 'Error', 'message' => 'Failed to add Creditor!']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Creditor $creditor)
    {
        return $creditor;
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
    public function update(StoreCreditorRequest $request, Creditor $creditor)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        $is_updated = $creditor->update($data);

        if($is_updated){
            return response()->json(['status' => 1, 'message' => 'Creditor updated successfully']);
        }

        return response()->json(['status' => 0, 'message' => 'Failed to update creditor']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Creditor $creditor)
    {

        $is_deleted = $creditor->delete();

        if(!$is_deleted){
            return response()->json(['status' => 0, 'message' => 'Failed to removed creditor']);
        }

        return response()->json(['status' => 1, 'message' => 'Creditor Successfully removed']);
    }
}
