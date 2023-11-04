<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SectionTitle;
use App\Models\Slider;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class FrontendController extends Controller
{
    public function index(){
        $sliders = Slider::where('status',1)->get();
        $sectionTitles = $this->getSectionTitles();
        $whyChooseUs = WhyChooseUs::where('status',1)->get();
        return view('frontend.home.index',compact('sliders','sectionTitles','whyChooseUs'));        
    }//end method

    public function getSectionTitles():Collection{
        $keys = [
            'why_choose_top_title',
            'why_choose_main_title',
            'why_choose_sub_title'
        ];
        return SectionTitle::whereIn('key',$keys)->pluck('value','key');
       
    }//end method

    public function showProduct(string $slug):View{

            $product = Product::with(['productImages','productSizes','productOptions'])->where(['slug'=> $slug,'status'=>1])->firstOrFail();
            $relatedProducts = Product::where('category_id',$product->category_id)
            ->where('id','!=',$product->id)->take(8)->latest()->get();
            return view('frontend.pages.product-view',compact('product','relatedProducts'));
    }//end method

    public function loadProductModel($productId){
       $product = Product::with(['productSizes','productOptions'])->findOrFail($productId);
       return view('frontend.layout.ajax-files.product-popup-model',compact('product'))->render();
    }
}
