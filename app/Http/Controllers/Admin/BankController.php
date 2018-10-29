<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBankRequest;
use App\Bank;
use Storage;
use Exception;
use App\Branch;
use Rap2hpoutre\FastExcel\FastExcel;
use Carbon\Carbon;

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
        $regions = ["NCR","Region 1","CAR","Region 2","Region 3","Region 4A","Region 4B","Region 5","Region 6","Region 7","Region 8","Region 9","Region 10","Region 11","Region 12","Region 13"];
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
        $data['coverage'] = implode(', ',$data['coverage']);
        $data['slug'] = str_slug($data['name']);

        $path = $request->file('logo')->store('banks_logo','public');
        $data['logo'] = $path;

        $newBank = $bank->create($data);

        if($newBank){
            (new FastExcel)->import($request->file('branches'), function ($line) use ($newBank) {
                Branch::create([
                    'bank_id' => $newBank->id,
                    'branch' => $line['branch'],
                    'address' => $line['address'],
                    'telephone' => $line['telephone'],
                    'region' => $line['region'],
                    'slug' => str_slug($line['branch'])
                ]);
            });

            return ['status' => 1, 'title' => 'Success','message' => 'New Bank Partners has been added!'];
        }else{
            return ['status' => 0, 'title' => 'Error', 'message' => 'Failed to add Bank!'];
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        return $bank->toJson();
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
