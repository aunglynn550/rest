<?php

use App\Http\Controllers\Admim\CounterController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\ReservationTimeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AppDownloadController;
use App\Http\Controllers\Admin\BannerSliderController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChefController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DailyOfferController;
use App\Http\Controllers\Admin\DeliveryAreaController;
use App\Http\Controllers\Admin\NewsLetterController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentGatewaySettingController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\ProductOptionController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TermsAndConditionsController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\WhyChooseUsController;

Route::group(['prefix'=> 'admin','as' => 'admin.'], function(){
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // Profile All Routes
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

    // Slider All Routes//    
    Route::resource('slider',SliderController::class);

    //Daily Offer All Routes
    Route::get('daily-offer/search-product',[DailyOfferController::class, 'productSearch'])->name('daily-offer.search-product');
    Route::put('daily-offer-title-update',[ DailyOfferController::class,'updateTitle'])->name('daily-offer-title.update');
    Route::resource('daily-offer',DailyOfferController::class);
    
    //Banner Slider All Routes//
    Route::resource('banner-slider',BannerSliderController::class);
    
    
    //Chef All Routes//
    Route::put('chef-title-update',[ ChefController::class,'updateTitle'])->name('chef-title.update');
    Route::resource('chef',ChefController::class);
    
    //App Download All Routes //
    Route::resource('app-download',AppDownloadController::class);
    
    // Testimonial All Routes //
    Route::put('testimonial-title-update',[ TestimonialController::class,'updateTitle'])->name('testimonial-title.update');
    Route::resource('testimonial',TestimonialController::class);

    // Counter All Routes //
    Route::get('counter',[CounterController::class, 'index'])->name('counter.index');
    Route::put('counter/update',[CounterController::class, 'update'])->name('counter.update');

    // Blog Category All Routes //
    Route::resource('blog-category',BlogCategoryController::class);
    
    // Blog All Routes ///
    Route::get('blogs/comments',[BlogController::class, 'blogComment'])->name('blogs.comments.index');
    Route::get('blogs/comments/{id}',[BlogController::class, 'commentStatusUpdate'])->name('blogs.comments.update');
    Route::delete('blogs/comments/{id}',[BlogController::class, 'commentDestroy'])->name('blogs.comments.destroy');

    Route::resource('blogs',BlogController::class);

    // About Routes //
    Route::get('about', [AboutController::class, 'index'])->name('about.index');
    Route::put('about', [AboutController::class, 'update'])->name('about.update');

     // Privacy Policy Routes //
    Route::get('privacy-policy', [PrivacyPolicyController::class, 'index'])->name('privacy-policy.index');
    Route::put('privacy-policy', [PrivacyPolicyController::class, 'update'])->name('privacy-policy.update');

      // Terms and Conditions Routes //
    Route::get('terms-and-conditions', [TermsAndConditionsController::class, 'index'])->name('terms-and-conditions.index');
    Route::put('terms-and-conditions', [TermsAndConditionsController::class, 'update'])->name('terms-and-conditions.update');
  
    // Contact Routes //
    Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
    Route::put('contact', [ContactController::class, 'update'])->name('contact.update');

    // Reservation Routes //
    Route::resource('/reservation-time', ReservationTimeController::class);
    Route::get('/reservation', [ReservationController::class,'index'])->name('reservation.index');
    Route::post('/reservation', [ReservationController::class,'update'])->name('reservation.update');
    Route::delete('/reservation/{id}', [ReservationController::class,'destroy'])->name('reservation.destroy');
    
    // News Letter Routes //
    Route::get('/news-letter', [NewsLetterController::class,'index'])->name('news-letter.index');
    Route::post('/news-letter', [NewsLetterController::class,'sendNewsLetter'])->name('news-letter.send');

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

     Route::post('chat/send-message', [ChatController::class,'sendMessage'])->name('chat.send-message');



     /// Payment Gateway Setting Routes//
     Route::get('/payment-gateway-setting',[PaymentGatewaySettingController::class,'index'])->name('payment-setting.index');
     Route::put('/paypal-setting',[PaymentGatewaySettingController::class,'paypalSettingUpdate'])->name('paypal-setting.update');



    // Setting Routes//
    Route::get('/setting',[SettingController::class,'index'])->name('setting.index');
    Route::put('/general-setting',[SettingController::class,'updateGeneralSetting'])->name('general-setting.update');
    Route::put('/pusher-setting',[SettingController::class,'updatePusherSetting'])->name('pusher-setting.update');
    Route::put('/mail-setting',[SettingController::class,'updateMailSetting'])->name('mail-setting.update');

   

});
