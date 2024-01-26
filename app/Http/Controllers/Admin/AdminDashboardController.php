<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TodaysOrderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Order;
use App\Models\OrderPlacedNotification;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    function index(TodaysOrderDataTable $dataTable) : View | JsonResponse{
        $todaysOrders = Order::whereDate('created_at',now()->format('Y-m-d'))->count();
        $todaysEarnings = Order::whereDate('created_at',now()->format('Y-m-d'))->where('order_status','delivered')->sum('grand_total');

        $thisMonthsOrders = Order::whereMonth('created_at',now()->month)->count();
        $thisMonthsEarnings = Order::whereMonth('created_at',now()->month)->where('order_status','delivered')->sum('grand_total');

        $thisYearsOrders = Order::whereYear('created_at',now()->year)->count();
        $thisYearsEarnings = Order::whereYear('created_at',now()->year)->where('order_status','delivered')->sum('grand_total');

        $totalOrders = Order::count();
        $totalEarnings = Order::where('order_status','delivered')->sum('grand_total');

        $totalUsers = User::where('role','user')->count();
        $totalAdmins = User::where('role','admin')->count();

        $totalProducts = Product::count();
        $totalBlogs = Blog::count();

        return $dataTable->render('admin.dashboard.index', 
                compact('todaysOrders',
                        'todaysEarnings',
                        'thisMonthsOrders',
                        'thisMonthsEarnings',
                        'thisYearsOrders',
                        'thisYearsEarnings',   
                        'totalOrders',
                        'totalEarnings', 
                        'totalUsers',
                        'totalAdmins', 
                        'totalProducts',
                        'totalBlogs',                        
                    ));
    }//end method

    function clearNotification(){
        $notification = OrderPlacedNotification::query()->update(['seen' => 1]);

        toastr('Notification Cleared Successfully !','success');

        return redirect()->back();
    }
}
