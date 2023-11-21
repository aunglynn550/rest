<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderPlacedNotification;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    function index(){
        return view('admin.dashboard.index');
    }//end method

    function clearNotification(){
        $notification = OrderPlacedNotification::query()->update(['seen' => 1]);

        toastr('Notification Cleared Successfully !','success');

        return redirect()->back();
    }
}
