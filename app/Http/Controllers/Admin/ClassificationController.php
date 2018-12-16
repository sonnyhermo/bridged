<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSpec;
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
    public function store(StoreSpec $request, Classification $classification)
    {
    
        $data = $request->validated();
        $data = array_merge($data, ['slug' => str_slug($data['classification'], '-')]);

        $countUndelete = count($classification->where('slug','=',$data['slug'])->get());
        if($countUndelete != 0){
            return redirect()->route('loans.index')->with('error','Classification already exist'); 
        }

        $countDeleted = count($classification->onlyTrashed()->where('slug','=',$data['slug'])->get());

        if($countDeleted != 0){
            return redirect()->route('loans.index')->with('error','Classification already exist in archived');
        }

        $newSpec = $classification->create($data);

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
    public function edit(Classification $classification)
    {
        return $classification;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSpec $request, Classification $classification)
    {
        $data = $request->validated();

        $classification->loan_id = $data['loan_id'];
        $classification->classification = $data['classification'];
        $classification->collateral = $data['collateral'];
        $classification->description = $data['description'];
        $classification->slug = str_slug($data['classification'], '-');

        $is_updated = $classification->save();
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
        $is_deleted = $classification->delete();
        
        if(!$is_deleted){
            return response()->json(['status' => 0, 'message' => 'Deleting Classification Failed']);
        }

        return response()->json(['status' => 1, 'message' => 'Classification Deleted']);
    }
}
