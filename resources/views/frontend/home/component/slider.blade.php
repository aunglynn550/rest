<section class="fp__banner" style="background: url(frontend/images/banner_bg.jpg);">
        <div class="fp__banner_overlay">
            <div class="row banner_slider">

            @foreach($sliders as $item)
                <div class="col-12">
                    <div class="fp__banner_slider">
                        <div class=" container">
                            <div class="row">
                                <div class="col-xl-5 col-md-5 col-lg-5">
                                    <div class="fp__banner_img wow fadeInLeft" data-wow-duration="1s">
                                        <div class="img">
                                            <img src="{{ asset($item->image) }}" alt="food item" class="img-fluid w-100">
                                            <span> {{$item->offer}} </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-7 col-lg-6">
                                    <div class="fp__banner_text wow fadeInRight" data-wow-duration="1s">
                                        <h1>{!! $item->title !!}</h1>
                                        <h3>{!! $item->sub_title !!}</h3>
                                        <p>{!! $item->short_description !!}</p>
                                        <ul class="d-flex flex-wrap">
                                            @if($item->button_link)
                                                <li><a class="common_btn" href="{{ $item->button_link }}">shop now</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              <!-- ./col-12 -->
            @endforeach
    </section>