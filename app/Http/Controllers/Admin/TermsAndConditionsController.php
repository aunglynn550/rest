<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TermsAndCondition;
use Illuminate\Http\Request;

class TermsAndConditionsController extends Controller
{
    function index(){
        $termsAndConditions = TermsAndCondition::first();
        return view('admin.terms-and-conditions.index',compact('termsAndConditions'));
    }//end method

    function update(Request $request){
        $request->validate([
            'content' => ['required']
        ]);

        TermsAndCondition::updateOrCreate(
            ['id' => 1],
            [
                'content' => $request->content
            ]
        );

        toastr('Updated Successfully!');
        return redirect()->back();
    }
}
