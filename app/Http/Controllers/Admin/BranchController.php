<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Bank;
use App\Branch;
use App\Http\Requests\UpdateBranchRequest;
use Rap2hpoutre\FastExcel\FastExcel;
use Storage;

class BranchController extends Controller
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
    public function store(Request $request, Branch $branch)
    {
        
        if($request->has('branches')){
            $validator = Validator::make($request->all(), [
                'bank' => 'required',
                'branches' => 'required|mimes:xls,xlsx',
            ]);
        }else{
            $validator = Validator::make($request->all(), [
                'bank' => 'required',
                'branch' => 'required',
                'address' => 'required',
                'telephone' => 'required',
                'region' => 'required',
            ]);
        }

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }

        $bank = Bank::select('id', 'name')->where('slug', $request->bank)->first();

        if(!$request->has('branches')){
            $data = [
                'bank_id' => $bank->id,
                'branch' => $request->branch,
                'address' => $request->address,
                'telephone' => $request->telephone,
                'region' => $request->region,
                'slug' => str_slug($bank->name.' '.$request->branch,'-')
            ];
        
            $newBranch = $branch->create($data);
            if(!$newBranch){
                return response()->json(['status' => 0, 'message' => 'Adding Branch Failed']);
            }
    
            return response()->json(['status' => 1, 'message' => 'Branch Added']);
        }

        $tempfile = $request->file('branches')->store('tmp');

        (new FastExcel)->import(storage_path('app/'.$tempfile), function ($line) use ($bank) {
            Branch::create([
                'bank_id' => $bank->id,
                'branch' => $line['Branch'],
                'address' => $line['Address'],
                'telephone' => $line['Telephone'],
                'region' => $line['Region'],
                'slug' => str_slug($bank->name.' '.$line['Branch'],'-')
            ]);
        });

        Storage::delete('app/'.$tempfile);

        return ['status' => 1, 'title' => 'Success','message' => 'New Bank Partners has been added!'];
        
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
    public function edit(Branch $branch)
    {
        return $branch->toJson();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBranchRequest $request, Branch $branch)
    {
        $data = $request->validated();

        $is_updated = $branch->update($data);

        if(!$is_updated){
            return response()->json(['status' => 0, 'message' => 'Failed to Update Branch']);
        }

        return response()->json(['status' => 1, 'message' => 'Branch updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        $is_deleted = $branch->delete();

        if(!$is_deleted){
            return response()->json(['status' => 0, 'message' => 'Failed to Remove Branch']);
        }

        return response()->json(['status' => 1, 'message' => 'Branch moved in archived']);
    }
}
