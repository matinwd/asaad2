@extends('pages.master')

@section('content')


    <div class="inner-banner">
        <div class="container">
            <h2 class="inner-banner-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">{{ trans('breadcrumb_pages.posts') }}</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">{{ trans('breadcrumb_pages.home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ trans('breadcrumb_pages.posts') }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="blog-section pt-120 pb-120">
        <img alt="image" src="{{ asset('assets/images/bg/section-bg.png') }}" class="img-fluid section-bg-top">
        <img alt="image" src="{{ asset('assets/images/bg/section-bg.png') }}" class="img-fluid section-bg-bottom">
        <div class="container">
            <div class="row d-flex justify-content-center g-4 mb-60">
              @foreach($posts ?? [] as $post)
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-10">
                        <div class="single-blog-style1 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".2s">
                            <div class="blog-img">
                                <span href="#" class="blog-date"><i class="bi bi-calendar-check"></i>{{ $post->created_at->diffForHumans() }}</span>
                                <img alt="image" src="{{ asset($post->banner) }}">
                            </div>
                            <div class="blog-content">
                                <h5><a href="{{ route('posts.show',$post->slug) }}">{{ $post->title }}</a></h5>
                                <div>
                                    {{ \Str::limit(strip_tags($post->text), $limit = 100, $end = '...') }}
                                </div>
                                <div class="blog-meta">
                                    <div class="author">
                                        <img alt="image" src="{{ asset('assets/images/blog/author1.png') }}">
                                        <a href="{{ route('posts.show',$post->slug) }}" class="author-name">{{ trans('blog_side_bar.posted_by') . ' ' . trans('actions.admin') }}</a>
                                    </div>
                                    <div class="comment">
                                        <img alt="image" src="{{ asset('assets/images/icons/comment-icon.svg') }}">
                                        <a href="{{ route('posts.show' , [$post->slug,'#comments']) }}" class="comment">{{ $post->comments()->count() }} {{ trans('blog_side_bar.comments') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="pagination-wrap">
                {{ $posts->links() }}
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