@extends('pages.master')

@section('content')


<div class="inner-banner">
    <div class="container">
        <h2 class="inner-banner-title  wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".4s">{{ $product->name }}</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ trans('breadcrumb_pages.home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>
    </div>
</div>


<div class="auction-details-section pt-120">
    <div class="container">
        <div class="row g-4 mb-50">
            <div class="col-xl-6 col-lg-7 d-flex flex-row align-items-start justify-content-lg-start justify-content-center flex-md-nowrap flex-wrap gap-4">
                <ul class="nav small-image-list d-flex flex-md-column flex-row justify-content-center gap-4  wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".4s">
                    @foreach($product->pictures ?? [] as $i => $picture)
                        <li class="nav-item">
                            <div id="details-img{{$i}}" data-bs-toggle="pill" data-bs-target="#gallery-img{{$i}}" aria-controls="gallery-img{{$i}}">
                                <img alt="image" src="{{ asset($picture) }}" class="img-fluid">
                            </div>
                        </li>

                    @endforeach

                </ul>
                <div class="tab-content product-details-images mb-4 d-flex justify-content-lg-start justify-content-center  wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".4s">
                 @foreach($product->pictures ?? [] as $i => $picture)
                        <div class="tab-pane big-image fade {{ $i == 0 ? 'show active' : '' }}" id="gallery-img{{$i}}">
                            <img alt="image" src="{{ asset($picture) }}" class="img-fluid">
                        </div>

                    @endforeach
                </div>
            </div>
            <div class="col-xl-6 col-lg-5">
                <div class="product-details-right  wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".2s">
                    <h3>{{ $product->name }}</h3>
                    <h4>
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="25px" height="25px">
                            <path d="M12 21.8999C17.5228 21.8999 22 17.4228 22 11.8999C22 6.37705 17.5228 1.8999 12 1.8999C6.47715 1.8999 2 6.37705 2 11.8999C2 17.4228 6.47715 21.8999 12 21.8999Z" fill="#32c36c" opacity="0.8"></path>
                            <path d="M14.2602 12L12.7502 11.47V8.08H13.1102C13.9202 8.08 14.5802 8.79 14.5802 9.66C14.5802 10.07 14.9202 10.41 15.3302 10.41C15.7402 10.41 16.0802 10.07 16.0802 9.66C16.0802 7.96 14.7502 6.58 13.1102 6.58H12.7502V6C12.7502 5.59 12.4102 5.25 12.0002 5.25C11.5902 5.25 11.2502 5.59 11.2502 6V6.58H10.6002C9.12016 6.58 7.91016 7.83 7.91016 9.36C7.91016 11.15 8.95016 11.72 9.74016 12L11.2502 12.53V15.91H10.8902C10.0802 15.91 9.42016 15.2 9.42016 14.33C9.42016 13.92 9.08016 13.58 8.67016 13.58C8.26016 13.58 7.92016 13.92 7.92016 14.33C7.92016 16.03 9.25016 17.41 10.8902 17.41H11.2502V18C11.2502 18.41 11.5902 18.75 12.0002 18.75C12.4102 18.75 12.7502 18.41 12.7502 18V17.42H13.4002C14.8802 17.42 16.0902 16.17 16.0902 14.64C16.0802 12.84 15.0402 12.27 14.2602 12ZM10.2402 10.59C9.73016 10.41 9.42016 10.24 9.42016 9.37C9.42016 8.66 9.95016 8.09 10.6102 8.09H11.2602V10.95L10.2402 10.59ZM13.4002 15.92H12.7502V13.06L13.7602 13.41C14.2702 13.59 14.5802 13.76 14.5802 14.63C14.5802 15.34 14.0502 15.92 13.4002 15.92Z" fill="#eee"></path>
                        </svg>
                        Price: <span>{{ $product->price ?? $product->price_status_text}}</span>
                    </h4>
                    <div class="bid-form">
                        <div class="form-title">
                            <h5>{{ trans('order_modal.order_now') }}</h5>
                            <p>{{ trans('order_modal.order_now_subtext') }}</p>
                        </div>
                        <form action="{{ route('orders.store',['product_id' => $product->id]) }}" method="post">
                            <div class="form-inner gap-2">
                                <div class="row d-flex justify-content-center g-2">
                                    <input type="hidden" name="product_id" >
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ old('name') }}" name="name" placeholder="{{ trans('order_modal.field_label_name')}}">
                                        @error('name')
                                            <span style="color: #ff0000b0" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    @csrf
                                    <div class="col-lg-6">
                                        <input type="email" value="{{ old('email') }}" name="email" placeholder="{{ trans('order_modal.field_label_email') }}">
                                        @error('email')
                                            <span style="color: #ff0000b0">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12">
  <textarea name="description">{{ old('description', trans('order_modal.field_label_message')) }}</textarea>
                                        @error('description')
                                            <span style="color: #ff0000b0">{{ $message }}</span>
                                        @enderror

                                    </div>
                                    <div class="col-lg-12">
                                        <button class="eg-btn btn--primary btn--sm" type="submit">{{ trans('order_modal.btn_send') }}
                                            <svg viewBox="0 0 24 24" fill="#fff" xmlns="http://www.w3.org/2000/svg" style="" height="20px" width="20px">
                                                <path d="M9.50929 4.23013L18.0693 8.51013C21.9093 10.4301 21.9093 13.5701 18.0693 15.4901L9.50929 19.7701C3.74929 22.6501 1.39929 20.2901 4.27929 14.5401L5.14929 12.8101C5.36929 12.3701 5.36929 11.6401 5.14929 11.2001L4.27929 9.46013C1.39929 3.71013 3.75929 1.35013 9.50929 4.23013Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path stroke="#e3e" opacity="0.34" d="M5.43945 12H10.8395" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center g-4">
            <div class="col-lg-12">
                <p class="eg-btn btn--primary btn--lg">{{ trans('order_modal.description') }}</p>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".2s">
                        <div class="describe-content">
                            {!! $product->long_description !!}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-bid" role="tabpanel" aria-labelledby="pills-bid-tab">
                        <div class="bid-list-area">
                            <ul class="bid-list">
                                <li>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-7">
                                            <div class="bidder-area">
                                                <div class="bidder-img">
                                                    <img alt="image" src="{{ asset('assets/images/bg/bidder1.png') }}">
                                                </div>
                                                <div class="bidder-content">
                                                    <a href="#"><h6>Robart FOX</h6></a>
                                                    <p>24.50 ETH</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5 text-end">
                                            <div class="bid-time">
                                                <p>4 Hours Ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-7">
                                            <div class="bidder-area">
                                                <div class="bidder-img">
                                                    <img alt="image" src="{{ asset('assets/images/bg/bidder2.png') }}">
                                                </div>
                                                <div class="bidder-content">
                                                    <a href="#"><h6>Jane Cooper</h6></a>
                                                    <p>224.5 ETH</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5 text-end">
                                            <div class="bid-time">
                                                <p>5 Hours Ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-7">
                                            <div class="bidder-area">
                                                <div class="bidder-img">
                                                    <img alt="image" src="{{ asset('assets/images/bg/bidder3.png') }}">
                                                </div>
                                                <div class="bidder-content">
                                                    <a href="#"><h6>Guy Hawkins</h6></a>
                                                    <p>34.5 ETH</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5 text-end">
                                            <div class="bid-time">
                                                <p>6 Hours 45 minutes Ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-7">
                                            <div class="bidder-area">
                                                <div class="bidder-img">
                                                    <img alt="image" src="{{ asset('assets/images/bg/bidder1.png') }}">
                                                </div>
                                                <div class="bidder-content">
                                                    <a href="#"><h6>Robart FOX</h6></a>
                                                    <p>24.50 ETH</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5 text-end">
                                            <div class="bid-time">
                                                <p>4 Hours Ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-7">
                                            <div class="bidder-area">
                                                <div class="bidder-img">
                                                    <img alt="image" src="{{ asset('assets/images/bg/bidder2.png') }}">
                                                </div>
                                                <div class="bidder-content">
                                                    <a href="#"><h6>Robart FOX</h6></a>
                                                    <p>24.50 ETH</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5 text-end">
                                            <div class="bid-time">
                                                <p>4 Hours Ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="row d-flex justify-content-center g-4">
                            <div class="col-lg-6 col-md-4 col-sm-10">
                                <div class="eg-card auction-card1">
                                    <div class="auction-img">
                                        <img alt="image" src="{{ asset('assets/images/bg/live-auc1.png') }}">
                                        <div class="auction-timer">
                                            <div class="countdown" id="timer1">
                                                <h4><span id="hours1">05</span>H : <span id="minutes1">52</span>M : <span id="seconds1">32</span>S</h4>
                                            </div>
                                        </div>
                                        <div class="author-area">
                                            <div class="author-emo">
                                                <img alt="image" src="{{ asset('assets/images/icons/smile-emo.svg') }}">
                                            </div>
                                            <div class="author-name">
                                                <span>by @robatfox</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="auction-content">
                                        <h4><a href="auction-details.html">Brand New royal Enfield 250 CC For Sale</a></h4>
                                        <p>Bidding Price : <span>$85.9</span> </p>
                                        <div class="auction-card-bttm">
                                            <a href="auction-details.html" class="eg-btn btn--primary btn--sm">Request Product</a>
                                            <div class="share-area">
                                                <ul class="social-icons d-flex">
                                                    <li><a target="_blank" href="https://www.facebook.com/"><i class="bx bxl-facebook"></i></a></li>
                                                    <li><a href="https://www.twitter.com/"><i class="bx bxl-twitter"></i></a></li>
                                                    <li><a target="_blank" href="https://api.whatsapp.com/send?text={{ urlencode($product->name . ' ' . route('products.show',$product->slug) ) }}"><i class="bx bxl-instagram"></i></a></li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-4 col-sm-10">
                                <div class="eg-card auction-card1 wow fadeInDown">
                                    <div class="auction-img">
                                        <img alt="image" src="{{ asset('assets/images/bg/live-auc2.png') }}">
                                        <div class="auction-timer">
                                            <div class="countdown" id="timer2">
                                                <h4><span id="hours2">05</span>H : <span id="minutes2">52</span>M : <span id="seconds2">32</span>S</h4>
                                            </div>
                                        </div>
                                        <div class="author-area">
                                            <div class="author-emo">
                                                <img alt="image" src="{{ asset('assets/images/icons/smile-emo.svg') }}">
                                            </div>
                                            <div class="author-name">
                                                <span>by @robatfox</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="auction-content">
                                        <h4><a href="auction-details.html">Wedding Special Exclusive Cupple Ring (S2022)</a></h4>
                                        <p>Bidding Price : <span>$85.9</span> </p>
                                        <div class="auction-card-bttm">
                                            <a href="auction-details.html" class="eg-btn btn--primary btn--sm">Request Product</a>
                                            <div class="share-area">
                                                <ul class="social-icons d-flex">
                                                    <li><a target="_blank" href="https://www.facebook.com/"><i class="bx bxl-facebook"></i></a></li>
                                                    <li><a href="https://www.twitter.com/"><i class="bx bxl-twitter"></i></a></li>
                                                    <li><a target="_blank" href="https://api.whatsapp.com/send?text=textToshare"><i class="bx bxl-instagram"></i></a></li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="upcoming-seciton pb-120 pt-120">

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="section-title4">
                    <h2>{{ trans('actions.related_products') }}</h2>
                    <p class="mb-0">{{ trans('actions.related_products_subtext') }}</p>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="swiper upcoming-slider">
                <div class="swiper-wrapper">
                    @foreach($relatedProducts ?? [] as $relatedProduct)
                        <div class="swiper-slide">
                            <div class="eg-card c-feature-card1 wow animate fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.6s">
                                <div class="auction-img">
                                    <img alt="image" src="{{ asset($relatedProduct->banner) }}">

                                </div>
                                <div class="c-feature-content">
                                    <div class="c-feature-category">{{ $relatedProduct->category->name ?? '' }}</div>
                                    <a href="{{ route('products.show',$relatedProduct->slug) }}">
                                        <h4>{{ $relatedProduct->name }}</h4>
                                    </a>
                                    <p>{{ trans('order_modal.price') }} : <span>{{ $relatedProduct->price ? '$' . $relatedProduct->price : $relatedProduct->price_status_text  }}</span></p>
                                    <div class="auction-card-bttm">
                                        <a href="{{ route('products.show',$relatedProduct->slug) }}" class="eg-btn btn--primary btn--sm">{{ trans('actions.view_details') }}</a>
                                        <div class="share-area">
                                            <ul class="social-icons d-flex">
                                                <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('products.show',$relatedProduct->slug) ) }}&t={{urlencode($relatedProduct->name)}}"><i class="bx bxl-facebook"></i></a></li>
                                                <li><a target="_blank" href="https://twitter.com/intent/tweet?url={{ urlencode(route('products.show',$relatedProduct->slug)) }}&text={{ urlencode($relatedProduct->name) }}"><i class="bx bxl-twitter"></i></a></li>
                                                <li><a target="_blank" href="https://telegram.me/share/url?url={{ urlencode(route('products.show',$relatedProduct->slug)) }}&text={{ urlencode($relatedProduct->name) }}"><i class="bx bxl-telegram"></i></a></li>
                                                <li><a target="_blank" href="https://api.whatsapp.com/send?text={{ urlencode($relatedProduct->name . ' ' . route('products.show',$relatedProduct->slug) ) }}"><i class="bx bxl-whatsapp"></i></a></li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
            <div class="slider-bottom d-flex justify-content-between align-items-center">
               {{-- <a href="live-auction.html" class="eg-btn btn--primary btn--md">View ALL</a>--}}
                <div class="swiper-pagination style-3 d-lg-block d-none swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal"><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 4"></span></div>
                <div class="slider-arrows coming-arrow d-flex gap-3">
                    <div class="coming-prev1 swiper-prev-arrow" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-82f4d23e0eb6d64b"><i class="bi bi-arrow-left"></i></div>
                    <div class="coming-next1 swiper-next-arrow" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-82f4d23e0eb6d64b"><i class="bi bi-arrow-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection


@section('styles')
    <style>
        .inner-banner::before{
            content: url({{ \App\Helpers\Helper::Setting('page_header_pic')->value }}) !important;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: -1;
        }
    </style>
@endsection