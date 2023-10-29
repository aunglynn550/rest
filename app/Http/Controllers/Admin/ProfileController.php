<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfilePasswordUpdateRequest;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function index(){
        return view('admin.profile.index');
    }//end method

    public function updateProfile(ProfileUpdateRequest $request){
        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        toastr('Updated Successfully!','success');
        return redirect()->back();
    }//end method

    public function updatePassword(ProfilePasswordUpdateRequest $request){
        $user = Auth::user();

        $user->password = bcrypt($request->password);        
        $user->save();

        toastr('Password Updated Successfully!','success');
        return redirect()->back();
    }//end method
}
