@extends('front.master')

@section('content')
    <section class="page-title o-hidden text-center parallaxie" data-overlay="7"
             data-bg-img="{{ \App\Helpers\Helper::Setting('page_header_pic')->val }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 m{{ $mpLeft }}-auto m{{ $mpRight }}-auto">
                    <h1 class="title mb-0">{{ trans('title_pages.news') }}</h1>
                </div>
            </div>
            <nav aria-label="breadcrumb" class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
                    @isset($category)
                        <li class="breadcrumb-item"><a
                                    href="{{ route('posts.index') }}">{{ trans('title_pages.news') }}</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">{{ $category->title }}</a></li>
                    @else
                        <li class="breadcrumb-item"><a href="#">{{ trans('title_pages.news') }}</a></li>
                    @endisset
                    <li class="breadcrumb-item active">{{ trans('breadcrumb_pages.news') }}</li>
                </ol>
            </nav>
        </div>
    </section>
    <div class="page-content">
        <section class="pb-17 sm-pb-8">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 order-lg-12">
                        @foreach ($posts as $p => $post)
                            <div class="blog-classic">
                                <div class="post">
                                    <div class="post-image">
                                        <img src="{{ $post->banner }}" alt="">
                                        <div class="post-date">{{ $post->getDisplayDate() }}</div>
                                    </div>
                                    <div class="post-desc">
                                        <div class="post-title text-justify">
                                            <h5><a href="{{ route('posts.show',$post) }}">{{ $post->title }}</a></h5>
                                        </div>
                                        <p class="text-justify">
                                            {{ $post->details }}
                                        </p>
                                    </div>
                                    <div class="post-bottom">
                                        <a class="post-btn" href="{{ route('posts.show',$post) }}">
                                            {{ trans('actions.read_more') }}
                                            <i class="mx-2 fas fa-long-arrow-alt-{{ $cLeft }}"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <nav>
                            {!! $posts->render() !!}
                        </nav>
                    </div>
                    <x-blog-side-bar></x-blog-side-bar>
                </div>
            </div>
        </section>
    </div>
@endsection
