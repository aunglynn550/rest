<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ProfilePasswordUpdateRequest;
use App\Http\Requests\Frontend\ProfileUpdateRequest;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function updateProfile(ProfileUpdateRequest $request):RedirectResponse{
        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        toastr('Profile Updated Successfully !','success');

        return redirect()->back();
    }//end method

    public function updatePassword(ProfilePasswordUpdateRequest $request):RedirectResponse{
        $user = Auth::user();

        $user->password = bcrypt($request->password);        
        $user->save();

        toastr('Password Updated Successfully!','success');
        
        return redirect()->back();
    }//end method
}
