<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\About;
use App\Models\AppDownload;
use App\Models\BannerSlider;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\Category;
use App\Models\Chef;
use App\Models\Contact;
use App\Models\Counter;
use App\Models\Coupon;
use App\Models\DailyOffer;
use App\Models\PrivacyPolicy;
use App\Models\Product;
use App\Models\ProductRating;
use App\Models\Reservation;
use App\Models\SectionTitle;
use App\Models\Slider;
use App\Models\Subscriber;
use App\Models\TermsAndCondition;
use App\Models\Testimonial;
use App\Models\WhyChooseUs;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;
use Mail;
use Illuminate\View\View;

class FrontendController extends Controller
{
    public function index(){
       // session()->forget('coupon');
        $sliders = Slider::where('status',1)->get();
        $sectionTitles = $this->getSectionTitles();
        $whyChooseUs = WhyChooseUs::where('status',1)->get();
        $dailyOffers = DailyOffer::with('product')->where('status', 1)->take(15)->get();
        $bannerSlider = BannerSlider::where('status',1)->latest()->take(10)->get();
        $chefs = Chef::where(['show_at_home' => 1, 'status' => 1])->get();
        $appDownload = AppDownload::first();
        $testimonials = Testimonial::where(['show_at_home'=> 1,'status'=>1])->get();
        $counter = Counter::first();
        $latestBlogs = Blog::withCount(['comments' => function($query){
            $query->where('status',1);
        }])->with(['category','user'])->where('status',1)->latest()->take(3)->get();
      
        return view('frontend.home.index',
        compact(
            'sliders',
            'sectionTitles',
            'whyChooseUs',
            'dailyOffers',
            'bannerSlider',
            'chefs',
            'appDownload',
            'testimonials',
            'counter',
            'latestBlogs'
        ));        
    }//end method

    public function getSectionTitles():Collection{
        $keys = [
            'why_choose_top_title',
            'why_choose_main_title',
            'why_choose_sub_title',
            'daily_offer_top_title',
            'daily_offer_main_title',
            'daily_offer_sub_title',
            'chef_top_title',
            'chef_main_title',
            'chef_sub_title',
            'testimonial_top_title',
            'testimonial_main_title',
            'testimonial_sub_title'
        ];
        return SectionTitle::whereIn('key',$keys)->pluck('value','key');
       
    }//end method


    //<!--=============================//
    //               Pages             //
    //==============================-->//

    public function chef(){
        $chefs = Chef::where(['status'=>1])->paginate(4);
        return view('frontend.pages.chefs',compact('chefs'));
    }//end methods

    public function testimonial(){
        $testimonials = Testimonial::where(['status'=>1])->paginate(1);
        return view('frontend.pages.testimonial',compact('testimonials'));
    }//end method

    public function privacyPolicy(){
        $privacyPolicy = PrivacyPolicy::first();
        return view('frontend.pages.privacy-policy',compact('privacyPolicy'));
    }//end method

    public function termsAndConditions(){
        $termsAndConditions = TermsAndCondition::first();
        return view('frontend.pages.terms-and-conditions',compact('termsAndConditions'));
    }//end method

    function contact(){
        $contact = Contact::first();
        return view('frontend.pages.contact', compact('contact'));
    }//end method

    function contactSendMessage(Request $request) {
       $request->validate([
        'name' => ['required' , 'max:255'],
        'email' => ['required' , 'max:255'],
        'subject' => ['required' , 'max:255'],
        'message' => ['required' , 'max:255'],
       ]);
    //   dd(config('mail'));
       Mail::send(new ContactMail($request->name, $request->email, $request->subject, $request->message));

       return response(['status' => 'success' , 'message' => 'Message Sent Successfully']);
    }//end method

    function reservation(Request $request){
      $request->validate([
        'name' => ['required', 'max:255'],
        'phone' => ['required', 'max:50'],
        'date' => ['required', 'date'],
        'time' => ['required'],
        'person' => ['required','numeric'],
      ]);

      if(!Auth::check()){
        throw ValidationException::withMessages(['Please Login to Request Reservation']);
      }

      $reservation = new Reservation();
      $reservation->reservation_id = rand(0, 500000);
      $reservation->user_id = auth()->user()->id;
      $reservation->name = $request->name;
      $reservation->phone = $request->phone;
      $reservation->date = $request->date;
      $reservation->time = $request->time;
      $reservation->person = $request->person;
      $reservation->status = 'pending';
      $reservation->save();

      return response(['status' => 'success', 'message' => 'Request Sent successfully']);
    }//end method

    function subscribeNewsletter(Request $request){
        $request->validate([
            'email' => ['required','email','max:255','unique:subscribers,email']
        ],['email.unique' => 'Email is already Subscribed']);

        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();

        return response(['status' => 'success', 'message' => 'Subscribed Successfully']);
    }

    function about() : View{
        $keys = [
            'why_choose_top_title',
            'why_choose_main_title',
            'why_choose_sub_title',            
            'chef_top_title',
            'chef_main_title',
            'chef_sub_title',
            'testimonial_top_title',
            'testimonial_main_title',
            'testimonial_sub_title'
        ];
        $about = About::first();  
        $whyChooseUs = WhyChooseUs::where('status',1)->get();
        $sectionTitles = SectionTitle::whereIn('key',$keys)->pluck('value','key');
        $chefs = Chef::where(['show_at_home' => 1, 'status' => 1])->get();
        $counter = Counter::first();
        $testimonials = Testimonial::where(['show_at_home'=> 1,'status'=>1])->get();
        return view('frontend.pages.about',compact('about','whyChooseUs','sectionTitles','chefs','counter','testimonials'));
    }

    public function blog(Request $request){
        // $blogs = Blog::with(['category','user'])->where('status',1)->latest()->paginate(9);
        $blogs = Blog::withCount(['comments'=> function($query){
            $query->where('status',1);
        }])->with(['category','user'])->where('status',1);

        if($request->has('search') && $request->filled('search')){
            $blogs->where(function ($query) use ($request){
                $query->where('title','like','%'.$request->search.'%')
                ->orWhere('description','like'.'%'.$request->search.'%');
            });
        }

        if($request->has('category') && $request->filled('category')){
            $blogs->whereHas('category',function ($query) use ($request){
                $query->where('slug',$request->category);                
            });
        }
        $carbon = Carbon::now();

        $blogs = $blogs->latest()->paginate(2);

        $categories = BlogCategory::where('status',1)->get();
        return view('frontend.pages.blog',compact('blogs','categories','carbon'));
    }//end method

    public function blogDetails($slug){
        $blog = Blog::with('user')->where('slug',$slug)->where('status',1)->firstOrFail();
        $comments = $blog->comments()->where('status',1)->orderBy('id','DESC')->paginate(15);
        $latestBlogs = Blog::select('id','title','slug','created_at','image')
                        ->where('status',1)
                        ->where('id','=',$blog->id)
                        ->latest()->take(5)->get();
        $categories = BlogCategory::withCount(['blogs' => function($query){
            $query->where('status',1);
        }])->where('status',1)->get();

        $nextBlog = Blog::select('id','title','slug','image')->where('id', '>', $blog->id)->orderBy('id','ASC')->first();
        $previousBlog = Blog::select('id','title','slug','image')->where('id', '<', $blog->id)->orderBy('id','DESC')->first();
        return view('frontend.pages.blog-details',compact('blog','latestBlogs','categories','nextBlog','previousBlog','comments'));
    }//end method

    function blogCommentStore(Request $request, string $blog_id){
        $request->validate([
            'comment' => ['required','max:255']
        ]);
        Blog::findOrFail($blog_id);
        $comment = new BlogComment();
        $comment->blog_id = $blog_id;
        $comment->user_id = auth()->user()->id;
        $comment->comment = $request->comment;
        $comment->created_at = Carbon::now('UTC');
        $comment->save();

        toastr('Comment submitted successfully and waiting to approve.');
        return redirect()->back();
    }

    function product(Request $request) : View{
    
        $products = Product::where(['status'=>1])->orderBy('id','DESC');                  
       
        if($request->has('search') && $request->filled('search')){
                  
            $products->where(function ($query) use ($request){
                $query->where('name','like','%'.$request->search.'%')
                ->orwhere('search_slug','like','%'.$request->search.'%')
                ->orWhere('long_description','like'.'%'.$request->search.'%');
            });
        }

        if($request->has('category') && $request->filled('category')){
            $products->whereHas('category',function ($query) use ($request){
                $query->where('slug',$request->category);                
            });


        }

        
        $products = $products->withAvg('reviews','rating')->withCount('reviews')->paginate(5);
        $categories = Category::where('status',1)->get();
        return view('frontend.pages.product', compact('products','categories'));
    }

    //<!--=============================//
    //           End Pages             //
    //==============================-->//

    public function showProduct(string $slug):View{

            $product = Product::with(['productImages','productSizes','productOptions'])
                        ->where(['slug'=> $slug,'status'=>1])
                        ->withAvg('reviews','rating')
                        ->withCount('reviews')
                        ->firstOrFail();
            $relatedProducts = Product::where('category_id',$product->category_id)
            ->where('id','!=',$product->id)->take(8)->latest()->get();
            $reviews = ProductRating::where(['product_id'=>$product->id,'status' => 1])->paginate(10);
            return view('frontend.pages.product-view',compact('product','relatedProducts','reviews'));
    }//end method

    public function loadProductModel($productId){
       $product = Product::with(['productSizes','productOptions'])->findOrFail($productId);
       return view('frontend.layout.ajax-files.product-popup-model',compact('product'))->render();
    }//end method

    function productReviewStore(Request $request){
        $request->validate([
            'rating' => ['required','min:1','max:5','integer'],
            'review' => ['required','max:500'],
            'product_id' => ['required','integer']
        ]);
        $user = Auth::user();

        // Check if user has Purchased the product
        $hasPurchased = $user->orders()->whereHas('orderItems' , function($query) use ($request){
            $query->where('product_id', $request->product_id);
        })
        ->where('order_status','delivered')
        ->get();  

        if(count($hasPurchased) == 0){
            throw ValidationException::withMessages(['Please Buy The Product Before Submit a Review']);
        }


        // Check if user has already reviewed the product
        $alreadyReviewed = ProductRating::where(['user_id'=> $user->id,'product_id' => $request->product_id])->exists();
        
        if($alreadyReviewed){
            throw ValidationException::withMessages(['You have already reviewed this product']);
        }

        $review = new ProductRating();
        $review->user_id = $user->id;
        $review->product_id = $request->product_id;
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->status = 0;
        $review->save();

        toastr('Review Added successfully and Waiting to be approved');
        return redirect()->back();
    }

    public function applyCoupon(Request $request){
        $subtotal = $request->subtotal;
        $code = $request->code;

       $coupon = Coupon::where('code', $request->code)->first();
       

       if(!$coupon){
            return response(['message' => 'Invalid Coupon Code.'],422);
        }
        if($coupon->quantity <= 0){
           return response(['message' => 'Coupon has been fully redeemed.'],422);
       }
       if($coupon->expire_date <= now()){
        return response(['message' => 'Coupon has Expired.'],422);
        }

        if($coupon->discount_type == 'percent'){
            $discount = number_format($subtotal * ($coupon->discount / 100),2);
        }else if($coupon->discount_type == 'amount'){
            $discount = number_format($coupon->discount,2);
        }

        $finalTotal = $subtotal - $discount;
        session()->put('coupon',['code'=>$code,'discount'=>$discount]);

        return response(['message' => 'Coupon Apply Successfully !','discount' => $discount,
                        'finalTotal'=>$finalTotal,'coupon_code'=>$code]);
    }//end method

    function destroyCoupon(){

        try{
            session()->forget('coupon');
            return response(['message'=>'Coupon Removed!','grand_cart_total'=>grandCartTotal()]);
        }catch(\Exception $e){
            logger($e);
            return response(['message'=>'something went wrong!']);

        }

       
    }//end method

    function waitApprove(){
        return response(['message'=>'Please Wait For Admin Approve']);
    }
}
