<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreNewLoan;
use App\Http\Requests\StoreNewSpec;
use App\Http\Requests\StoreNewPurpose;
use App\Loan;
use App\Specification;
use App\Purpose;

class LoanController extends Controller
{

    protected $loan;
    protected $spec;

    public function __construct(Loan $loan, Specification $spec, Purpose $purpose)
    {
        $this->middleware('auth:admin');
        $this->loan = $loan;
        $this->spec = $spec;
        $this->purpose = $purpose;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = $this->loan->all();
        return view('admin.loans', ['loans' => $loans]);
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

        if($this->loan->save()){
            return redirect()->route('loans.index')->with('success','New Loan type has been added!');
        }
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


    /**
     * Functions that are not in resource
     *
     *
     */

    public function storeSpecs(StoreNewSpec $request){
        $data = $request->validated();

        $newSpec = $this->spec->create($data);

        if( $newSpec ){
            return redirect()->route('loans.index')->with('success','New loan specification has been added!');
        }
    }

    public function storePurpose(StoreNewPurpose $request){
        $data = $request->validated();

        $newPurpose = $this->purpose->create($data);

        if( $newPurpose ){
            return redirect()->route('loans.index')->with('success','New loan purpose has been added!');
        }
    }
}
