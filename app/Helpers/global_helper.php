<?php 


// Create unique slug

use App\Models\Coupon;

if(!function_exists('generateUniqueSlug')){
    function generateUniqueSlug($model,$name){
        $modelClass = "App\\Models\\$model";
        if(!class_exists($modelClass)){
            throw new \InvalidArgumentException("Model $model not found");
        }

        $slug = \Str::slug($name);
        $count = 2;
        while($modelClass::where('slug',$slug)->exists()){
            $slug = Str::slug($name).'-'.$count++;
        }

        return $slug;
    }
}


if(!function_exists('currencyPosition')){
    function currencyPosition($price){
        if(config('settings.site_currency_icon_position') === 'left'){

            return config('settings.site_currency_icon').$price;
        }
    else{
        return $price.config('settings.site_currency_icon');
    }
}
}


// Calculate Cart Total Price


if(!function_exists('cartTotal')){
    function cartTotal(){
    $total = 0;
    foreach( Cart::content() as $item){
        $productPrice = $item->price;
        $sizePrice = $item->options?->product_size['price'] ??  0;
        $optionsPrice = 0;
        foreach($item->options->product_options as $option){
            $optionsPrice += $option['price'];
        }
        $total+= ($productPrice + $sizePrice + $optionsPrice) * $item->qty;
    
    }
    return $total;
}
}



// Calculate Product Total Price


if(!function_exists('productTotal')){
    function productTotal($rowId){
    $total = 0;

        $product = Cart::get($rowId);

        $productPrice = $product->price;
        $sizePrice = $product->options?->product_size['price'] ??  0;
        $optionsPrice = 0;
        
        foreach($product->options->product_options as $option){
            $optionsPrice += $option['price'];
        }
        $total+= ($productPrice + $sizePrice + $optionsPrice) * $product->qty;
    
  
    return $total;
}
}

// grand cart total//

if(!function_exists('grandCartTotal')){
    $total = 0;
    function grandCartTotal($deliveryFee= 0){
        $cartTotal = cartTotal();
      
        if(session()->has('coupon')){
            $coupon = Coupon::where('code', session()->get('coupon')['code'])->first();
            $discount = number_format($cartTotal * ($coupon->discount / 100),2);
            $total = ($cartTotal + $deliveryFee)- $discount;

          
            session()->put('coupon',['code'=>$coupon->code,'discount'=>$discount]);
            return $total;
        }else{
            $total = $cartTotal + $deliveryFee;
            return $total;
        }
    }
}

// Generate Invoice Id//

if(!function_exists('generateInvoiceId')){
    $total = 0;
    function generateInvoiceId($deliveryFee= 0){
      $randomNumber = rand(1,999999);
      $currendDateTime = now();

      $invoiceId = $randomNumber.$currendDateTime->format('ymd').$currendDateTime->format('s');

      return $invoiceId;
    }
}

// get product discount in percent//

if(!function_exists('discountInPercent')){
    function discountInPercent($originalPrice, $discountPrice){
     
      $result = (($originalPrice - $discountPrice) / $originalPrice) * 100;

      return round($result, 2);
    }
}
//==============================//
// Minimize Multiple Text lines // 
//==============================//

if(!function_exists('truncate')){
    function truncate(string $string, int $limit=100){
     
        return \Str::limit($string, $limit,'...');
    }
}


//==============================//
// Get Thumbnail From Youtube video Link // 
//==============================//

if(!function_exists('getYTThumbnail')){
    function getYTThumbnail($link, $size = 'medium'){
     
      $videoId = explode("?v=", $link);
      $videoId = $videoId[1];

      $finalSize = match($size){
        'low' => 'ssddefault',
        'medium' => 'mqdefault',
        'high' => 'hqdefault',
        'max' => 'maxresdefault'
      };
      return "https://img.youtube.com/vi/$videoId/$finalSize.jpg";
    }
}

//==============================//
// Set Sidebar Active // 
//==============================//

if(!function_exists('setSidebarActive')){
    function setSidebarActive(array $routes){
     
        foreach($routes as $route){
            if(request()->routeIs($route)){
                return 'active';
            }            
        }
        return '';
    }
}
