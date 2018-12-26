<?php

namespace App\Http\Controllers;

use App\Borrower;
use Illuminate\Http\Request;
use App\Http\Requests\StorePersonalInfoRequest;
use Auth;
use App\User;
use Storage;

class BorrowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $industries = Storage::get('industries.json');
        $user = User::with(['borrower'])->find(Auth::user()->id);
        $incomes = $user->incomes()->get();
        $individualIncomes = [];
        $entityIncomes = [];

        foreach($incomes as $income){
            if($income->borrower_type == 0){
                array_push($individualIncomes, $income->toArray());
            }else{
                array_push($entityIncomes, $income->toArray());
            }
        }

        return view(
                    'profile.my_profile', 
                    [
                        'user' => $user, 
                        'individualIncomes' => $individualIncomes,
                        'entityIncomes' => $entityIncomes,
                        'industries' => json_decode($industries)
                    ]
                );
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
    public function store(StorePersonalInfoRequest $request, Borrower $borrower)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        $newBorrower = $borrower->updateOrCreate($data);
        
        if(!$newBorrower){
            return ['status' => 0, 'title' => 'Error', 'message' => 'Failed to add your profile!'];
        }
        
        return ['status' => 1, 'title' => 'Success', 'message' => ''];

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Borrower  $borrower
     * @return \Illuminate\Http\Response
     */
    public function show(Borrower $borrower)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Borrower  $borrower
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrower $borrower)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Borrower  $borrower
     * @return \Illuminate\Http\Response
     */
    public function update(StorePersonalInfoRequest $request, Borrower $borrower)
    {
        $data = $request->validated();
        $is_updated = $borrower->update($data);

        if(!$is_updated){
            return response()->json(['status' => 0, 'message' => 'Failed to update information']);
        }

        return response()->json(['status' => 0, 'message' => 'Information Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Borrower  $borrower
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrower $borrower)
    {
        //
    }
}
