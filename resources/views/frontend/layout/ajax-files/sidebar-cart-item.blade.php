<input type="hidden" value="{{ cartTotal() }}" id="cartTotal">
@foreach(Cart::content() as $cartProduct)
                <li>
                    <div class="menu_cart_img">
                        <img src="{{ $cartProduct->options->product_info['image'] }}" alt="menu" class="img-fluid w-100">
                    </div>
                    <div class="menu_cart_text">
                        <a class="title" href="{{ route('product.show',$cartProduct->options->product_info['slug']) }}">{!! $cartProduct->name !!}</a>
                        <p class="size">Qty: {{ $cartProduct->qty }}</p>
                        <p class="size">{{ @$cartProduct->options->product_size['name'] }}
                            {{ @$cartProduct->options->product_size['price'] ?  '('.currencyPosition(@$cartProduct->options->product_size['price']).')': '' }}</p>

                        @foreach($cartProduct->options->product_options as $cartProductOption)
                        <span class="extra">{{ $cartProductOption['name'] }}
                        ({{ currencyPosition($cartProductOption['price']) }})
                        </span>
                        @endforeach
                    
                        <p class="price">{{ currencyPosition($cartProduct->price) }} <del>{{ currencyPosition($cartProduct->offer_price) }}</del></p>
                    </div>
                    <span class="del_icon"><i class="fal fa-times"></i></span>
                </li>
              
                @endforeach 