<?php


use App\Http\Controllers\Admin\ChatController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DeliveryAreaController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentGatewaySettingController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\ProductOptionController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\WhyChooseUsController;

Route::group(['prefix'=> 'admin','as' => 'admin.'], function(){
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // Profile All Routes
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

    // Slider All Routes//
    Route::resource('slider',SliderController::class);

    // Why Choose Us All Routes//
    Route::put('why-choose-title-update',[ WhyChooseUsController::class,'updateTitle'])->name('why-choose-title.update');
    Route::resource('why-choose-us',WhyChooseUsController::class);

    // Category All Routes//
    Route::resource('category',CategoryController::class);

    // Product All Routes//
    Route::resource('product',ProductController::class);

     // Product Gallery All Routes//
     Route::get('product-gallery/{product}',[ProductGalleryController::class,'index'])->name('product-gallery.show.index');
     Route::resource('product-gallery',ProductGalleryController::class);

    // Product Size All Routes//
    Route::get('product-size/{product}',[ProductSizeController::class,'index'])->name('product-size.show.index');
    Route::resource('product-size',ProductSizeController::class);

    // Product Size All Routes//   
    Route::resource('product-option',ProductOptionController::class);

     // Product Coupon All Routes//   
     Route::resource('coupon',CouponController::class);
     
     // Delivery Area All Routes //
     Route::resource('delivery-area',DeliveryAreaController::class);
     
     // Order Routes //
     Route::get('orders',[OrderController::class,'index'])->name('orders.index');
     Route::get('orders/{id}',[OrderController::class,'show'])->name('orders.show');
     Route::get('orders/status/{id}',[OrderController::class,'getOrderStatus'])->name('orders.status');
     Route::get('orders/status/{id}',[OrderController::class,'getOrderStatus'])->name('orders.status');
     Route::put('orders/status-update/{id}',[OrderController::class,'orderStatusUpdate'])->name('orders.status-update');
     Route::delete('orders/{id}',[OrderController::class,'destroy'])->name('orders.destroy');

     Route::get('pending-orders',[OrderController::class,'pendingOrderIndex'])->name('pending-orders');
     Route::get('inprocess-orders',[OrderController::class,'inprocessOrderIndex'])->name('inprocess-orders');
     Route::get('delivered-orders',[OrderController::class,'deliveredOrderIndex'])->name('delivered-orders');
     Route::get('declined-orders',[OrderController::class,'declinedOrderIndex'])->name('declined-orders');
     
     //  Order Notification Routes //
     Route::get('clear-notification',[AdminDashboardController::class,'ClearNotification'])->name('clear-notification');

     //  Chat  Routes //
     Route::get('chat',[ChatController::class,'index'])->name('chat.index');
     Route::get('get-conversation/{senderId}',[ChatController::class,'getConversation'])->name('chat.get-conversation');



     /// Payment Gateway Setting Routes//
     Route::get('/payment-gateway-setting',[PaymentGatewaySettingController::class,'index'])->name('payment-setting.index');
     Route::put('/paypal-setting',[PaymentGatewaySettingController::class,'paypalSettingUpdate'])->name('paypal-setting.update');



    // Setting Routes//
    Route::get('/setting',[SettingController::class,'index'])->name('setting.index');
    Route::put('/general-setting',[SettingController::class,'updateGeneralSetting'])->name('general-setting.update');

    Route::put('/pusher-setting',[SettingController::class,'updatePusherSetting'])->name('pusher-setting.update');

   

});
