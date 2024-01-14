<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    function index(){
        $privacyPolicy = PrivacyPolicy::first();
        return view('admin.privacy-policy.index',compact('privacyPolicy'));
    }//end method

    function update(Request $request){
        $request->validate([
            'content' => ['required']
        ]);

        PrivacyPolicy::updateOrCreate(
            ['id' => 1],
            [
                'content' => $request->content
            ]
        );

        toastr('Updated Successfully!');
        return redirect()->back();
    }
}
