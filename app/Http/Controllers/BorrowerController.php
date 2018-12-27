<?php

namespace App\Http\Controllers;

use App\Borrower;
use Illuminate\Http\Request;
use App\Http\Requests\StorePersonalInfoRequest;
use App\User;
use Storage;
use App\Attachment;

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
        $user = User::with(['borrower'])->find(auth()->user()->id);
        $incomes = $user->incomes()->get();
        $individualIncomes = [];
        $entityIncomes = [];
        $attachments = $user->attachments()->get();
        $files = [];

        foreach($incomes as $income){
            if($income->borrower_type == 0){
                array_push($individualIncomes, $income->toArray());
            }else{
                array_push($entityIncomes, $income->toArray());
            }
        }

        foreach($attachments as $attachment){
            switch($attachment->document_type){
                case 'issued_id':
                    if($attachment->borrower_type == 0){
                        $files['individual']['issued_id'][] = $attachment->toArray();
                    }else{
                        $files['entity']['issued_id'][] = $attachment->toArray();
                    }
            }
        }

        //return $files;
        return view(
                    'profile.my_profile', 
                    [
                        'user' => $user, 
                        'individualIncomes' => $individualIncomes,
                        'entityIncomes' => $entityIncomes,
                        'industries' => json_decode($industries),
                        'files' => $files
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
        $data['user_id'] = auth()->user()->id;
        $newBorrower = $borrower->updateOrCreate($data);
        
        if(!$newBorrower){
            return ['status' => 0, 'message' => 'Failed to add your profile!'];
        }
        
        return ['status' => 1, 'message' => 'Your information is updated'];

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
