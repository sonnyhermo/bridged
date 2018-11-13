<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewLoan;
use App\Loan;
use App\Classification;
use App\Purpose;


class LoanController extends Controller
{

    protected $loan;

    public function __construct(Loan $loan)
    {
        $this->middleware('auth:admin');
        $this->loan = $loan;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = $this->loan->all();
    
        return view('admin.loans', ['loans' => $loans, 'module' => 'Loans']);
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
    public function store(StoreNewLoan $request)
    {

        $data = $request->validated();

        $this->loan->type = $data['loan'];
        $this->loan->slug = str_slug($data['loan'], '-');

        if($this->loan->save()){
            return redirect()->route('loans.index')->with('success','New Loan type has been added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {

        //route model binding
        return $loan->with('classifications')->get()->toJson();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        return $loan;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreNewLoan $request, Loan $loan)
    {
        $data = $request->validated();

        $loan->type = $data['loan'];
        $loan->slug = str_slug($data['loan'], '-');

        $is_updated = $loan->save();

        if(!$is_updated){
            return redirect()->route('loans.index')->with('error','Loan Type failed to update');
        }
        
        return redirect()->route('loans.index')->with('success','Loan Type Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        $is_deleted = $loan->delete();
        
        if(!$is_deleted){
            return json_encode(['code' => 0, 'message' => 'Deleting Loan Failed']);
        }

        return json_encode(['code' => 1, 'message' => 'Loan Deleted']);
    }

}
