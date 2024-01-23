<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AdminManagementDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AdminManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AdminManagementDataTable $dataTable)
    {
        return $dataTable->render('admin.admin-management.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admin-management.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','max:255'],
            'email' => ['required','email','unique:users,email'],         
            'role' => ['required','in:admin'],         
            'password' => ['required','confirmed','min:5'],         
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = bcrypt( $request->role);
        $user->save();

        toastr('Created Successfully','success');

        return to_route('admin.admin-management.index');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.admin-management.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        if($id ==1){
            throw ValidationException::withMessages(['Super Admin Can Not Be Updated']);
        }
        $request->validate([
            'name' => ['required','max:255'],
            'email' => ['required','email','unique:users,email'],         
            'role' => ['required','in:admin'],         
            'password' => ['required','confirmed','min:5'],         
        ]);
        if($request->has('password') && $request->filled('password')){
            $request->validate([
                'password' => ['confirmed', 'min:5']
            ]);
            $user->password = bcrypt($request->password);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = bcrypt( $request->role);
        $user->save();
        
        toastr('Created Successfully','success');

        return to_route('admin.admin-management.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if($id ==1){
            throw ValidationException::withMessages(['Super Admin Can Not Be Deleted']);
        }
        try{
            $user = User::findOrFail($id);        
            $user->delete();            
            return response(['status'=> 'success', 'message'=> 'Deleted Successfully !']);
        }catch( \Exception $e){
            return response(['status'=> 'error', 'message'=> 'Something Went Wrong!']);
        }
    }
}
