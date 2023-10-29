<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfilePasswordUpdateRequest;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    use FileUploadTrait;
    public function index(){
        return view('admin.profile.index');
    }//end method

    public function updateProfile(ProfileUpdateRequest $request){
        $user = Auth::user();

        $imagePath = $this->UpdateImage($request,'avatar');

        $user->name = $request->name;
        $user->email = $request->email;
        $user->avatar = isset($imagePath) ? $imagePath : $user->avatar;
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
