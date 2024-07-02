@extends('pages.master')

@section('content')


    <div class="inner-banner">
        <div class="container">
            <h2 class="inner-banner-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">{{ trans('search_modal.results_for') .' '. request('q') }}</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">{{ trans('breadcrunb_pages.home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ trans('breadcrumb_pages.search') }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="blog-section pt-120">
        <img alt="image" src="{{ asset('assets/images/bg/section-bg.png') }}" class="img-fluid section-bg-top">
        <img alt="image" src="{{ asset('assets/images/bg/section-bg.png') }}" class="img-fluid section-bg-bottom">
        <div class="container">
            <h2 class="text-center pb-2 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".2s">{{ trans('actions.posts_found_for_you') }}</h2>
            <div class="row d-flex justify-content-center g-4 mb-60">
              @forelse($posts ?? [] as $post)
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-10">
                        <div class="single-blog-style1 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".2s">
                            <div class="blog-img">
                                <a href="#" class="blog-date"><i class="bi bi-calendar-check"></i>{{ $post->created_at->diffForHumans() }}</a>
                                <img alt="image" src="{{ asset($post->banner) }}">
                            </div>
                            <div class="blog-content">
                                <h5><a href="{{ route('posts.show',$post->slug) }}">{{ $post->title }}</a></h5>
                                <p class="para text-muted">{{ Str::limit(strip_tags($post->text),100) }}</p>

                                <div class="blog-meta">
                                    <div class="author">
                                        <img alt="image" src="{{ asset('assets/images/blog/author1.png') }}">
                                        <a href="{{ route('posts.show',$post->slug) }}" class="author-name">{{ trans('blog_side_bar.posted_by')  . ' ' . trans('actions.admin') }}</a>
                                    </div>
                                    <div class="comment">
                                        <img alt="image" src="{{ asset('assets/images/icons/comment-icon.svg') }}">
                                        <a href="#" class="comment">{{ $post->comments()->count() }} {{ trans('blog_side_bar.comments') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  @empty
                    <div class="how-work-img wow fadeInDown text-center" data-wow-duration="1.5s" data-wow-delay=".2s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.2s; animation-name: fadeInDown;">
                        <img alt="image" src="assets/images/bg/how-work2.png" class="work-img">
                        <p class="text-muted">{{ trans('actions.we_couldnt_find') }}</p>
                    </div>
                @endforelse
            </div>
            <div class="pagination-wrap">
                {{ $posts->links() }}
            </div>
        </div>
    </div>

    <hr>

    <div class="live-auction pb-120 pt-120">
        <img alt="image" src="assets/images/bg/section-bg.png" class="img-fluid section-bg">
        <div class="container position-relative">
            <h2 class="text-center pb-2 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".2s">{{ trans('actions.products_found_for_you') }}</h2>
            <div class="row mb-60 gy-4 d-flex justify-content-center">
                @forelse($products ?? [] as $product)
                    <div class="col-lg-4 col-md-6 col-sm-10 ">
                        <div class="eg-card auction-card3 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.2s; animation-name: fadeInDown;">
                            <div class="auction-img">
                                <img alt="image" src="{{ $product->banner ?? 'assets/images/bg/plants-gardening-tools-close-up_23-2148905235.avif' }}">

                            </div>
                            <div class="auction-content">
                                <h4><a href="{{ route('products.show',$product->slug) }}">{{$product->name}}</a></h4>
                                <p>

                                    Price : <span>{{ $product->price ? '$' .  $product->price : $product->price_status_text}}</span></p>
                                <div class="auction-card-bttm">
                                    <a href="{{ route('products.show',$product->slug) }}" class="eg-btn btn--primary3 btn--sm">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" class="svgicon">
                                            <path d="M4.78571 5H18.2251C19.5903 5 20.5542 6.33739 20.1225 7.63246L18.4558 12.6325C18.1836 13.4491 17.4193 14 16.5585 14H6.07142M4.78571 5L4.74531 4.71716C4.60455 3.73186 3.76071 3 2.76541 3H2M4.78571 5L6.07142 14M6.07142 14L6.25469 15.2828C6.39545 16.2681 7.23929 17 8.23459 17H17M17 17C15.8954 17 15 17.8954 15 19C15 20.1046 15.8954 21 17 21C18.1046 21 19 20.1046 19 19C19 17.8954 18.1046 17 17 17ZM11 19C11 20.1046 10.1046 21 9 21C7.89543 21 7 20.1046 7 19C7 17.8954 7.89543 17 9 17C10.1046 17 11 17.8954 11 19Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" stroke="#fff"></path>
                                        </svg>
                                        {{ trans('actions.view_details') }}</a>
                                    <div class="share-area">
                                        <ul class="social-icons d-flex">
                                            <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('products.show',$product->slug)) }}"><i class="bx bxl-facebook"></i></a></li>
                                            <li><a target="_blank" href="https://twitter.com/intent/tweet?url={{ urlencode(route('products.show',$product->slug)) }}&text={{ urlencode($product->name) }}"><i class="bx bxl-twitter"></i></a></li>
                                            <li><a target="_blank" href="https://telegram.me/share/url?url={{ urlencode(route('products.show',$product->slug)) }}&text={{ urlencode($product->name) }}"><i class="bx bxl-telegram"></i></a></li>
                                            <li><a target="_blank" href="https://api.whatsapp.com/send?text={{ urlencode($product->name . ' ' . route('products.show',$product->slug) ) }}"><i class="bx bxl-whatsapp"></i></a></li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="how-work-img wow fadeInDown text-center" data-wow-duration="1.5s" data-wow-delay=".2s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.2s; animation-name: fadeInDown;">
                            <img alt="image" src="assets/images/bg/how-work2.png" class="work-img">
                            <p class="text-muted">{{ trans('actions.we_couldnt_find') }}</p>
                        </div>
                    @endforelse
            </div>
            <div class="pagination-wrap">
                {{ $products->links() }}
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