<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBankRequest;
use Illuminate\Support\Facades\Log;
use App\Bank;
use Storage;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Bank::all();
        $regions = ["NCR","Region 1","CAR","Region 2","Region 3","Region 4-A","Region 4-B","Region 5","Region 6","Region 7","Region 8","Region 9","Region 10","Region 11","Region 12","Region 13"];
        return view('admin.banks', ['module' => 'Banks', 'banks' => $banks, 'regions' => $regions]);
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
    public function store(StoreBankRequest $request, Bank $bank)
    {
        $data = $request->validated();

        $newBank = $bank->create($data);

        if($newBank){
            return redirect()->route('banks.index')->with('success','New Bank has been added!');
        }else{
            return redirect()->route('banks.index')->with('error','Failed to add Bank!');
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
