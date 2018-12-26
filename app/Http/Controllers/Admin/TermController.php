<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Term;
use App\Http\Requests\StoreTermRequest;

class TermController extends Controller
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTermRequest $request, Term $term)
    {
        $data = $request->validated();

        $is_created = $term->create($data);

        if(!$is_created){
            return response()->json(['status' => 0, 'message' => 'Failed to add new Term']);
        }

        return response()->json(['status' => 1, 'message' => 'Successfully to add term']);
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
    public function edit(Term $term)
    {
        return $term->toJson();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTermRequest $request, Term $term)
    {
        $data = $request->validated();

        $is_updated = $term->update($data);

        if(!$is_updated){
            return response()->json(['status' => 0, 'message' => 'Failed to update term']);
        }

        return response()->json(['status' => 1, 'message' => 'Successfully to update term']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Term $term)
    {
        $is_deleted = $term->delete();

        if(!$is_deleted){
            return response()->json(['status' => 0, 'message' => 'Term failed to remove']);
        }

        return response()->json(['status' => 1, 'message' => 'Term removed successfully']);
    }
}
