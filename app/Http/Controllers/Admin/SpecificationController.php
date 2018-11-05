<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewSpec;
use App\Classification;

use Yajra\Datatables\Datatables;;


class ClassificationController extends Controller
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
    public function store(StoreNewSpec $request, Classification $spec)
    {
        $data = $request->validated();
        $data = array_merge($data, ['slug' => str_slug($request->description, '-')]);

        $newSpec = $spec->create($data);

        if( $newSpec ){
            return redirect()->route('loans.index')->with('success','New loan classification has been added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Classification $classification)
    {
        return $classification->toJson();
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
    public function update(StoreNewSpec $request, Classification $classification)
    {
        $data = $request->validated();
        $is_updated = $classification->update($data);
        if(!$is_updated){
            return redirect()->route('loans.index')->with('error','Classification failed to update');
        }
        
        return redirect()->route('loans.index')->with('success','Classification Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classification $classification)
    {
        $classification->delete();
        return json_encode(['a'=>'b']);
    }
}
