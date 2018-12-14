<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bank;
use App\Admin;
use App\Http\Requests\StoreAdminRequest;
use Hash;

class AdminController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Bank::select('id','name')->get();
        return view('admin.users', ['module' => 'Users', 'banks' => $banks]);
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
    public function store(StoreAdminRequest $request, Admin $user)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        $new_admin = $admin->create($data);

        if($admin){
            return response()->json(['status' => 1, 'title' => 'Success','message' => 'New Admin has been added!']);
        }else{
            return response()->json(['status' => 0, 'title' => 'Error', 'message' => 'Failed to add Admin!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $user)
    {
        return $user->toJson();
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
    public function update(StoreAdminRequest $request, Admin $user)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        $is_updated = $user->update($data);

        if($is_updated){
            return response()->json(['status' => 1, 'message' => 'Admin updated successfully']);
        }

        return response()->json(['status' => 0, 'message' => 'Failed to update admin']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $user)
    {
        $is_deleted = $user->delete();

        if(!$is_deleted){
            return response()->json(['status' => 0, 'message' => 'Failed to remove Admin Account']);
        }

        return response()->json(['status' => 1, 'message' => 'Admin account removed successfully']);
    }

}
