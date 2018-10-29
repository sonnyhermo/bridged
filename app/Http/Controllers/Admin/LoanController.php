<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewLoan;
use App\Loan;
use App\Specification;
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
        $specs = Specification::all();
        $purposes = Purpose::all();
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

        $this->loan->type = $request->loan;
        $this->loan->slug = str_slug($request->loan, '-');

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
        return $loan->with('specifications')->get()->toJson();

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
    public function destroy(Loan $loan)
    {
        //
    }

}
