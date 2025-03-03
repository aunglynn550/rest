<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserDataTable $dataTable)
    {
        Artisan::call('route:clear');
        return $dataTable->render('admin.user-management.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function approveStatusUpdate(Request $request)
    {
        $user = User::findOrFail($request->id);
        
        if($user->approve_status == 1){
            $user->approve_status = 0;
        }else{
            $user->approve_status = 1;
        }
        
        $user->save();
 
        if($request->ajax()){
         return response(['status' => 'success', 'message' => 'Approveal Updated SUccessfully!']);
         
        }
        else{
             toastr('Status Updated Succesfullly!','success');
             return redirect()->back();
        }
    }

}
