@extends('front.master')

@section('content')
    <section class="page-title o-hidden text-center parallaxie" data-overlay="7"
             data-bg-img="{{ \App\Helpers\Helper::Setting('page_header_pic')->val }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 m{{ $mpLeft }}-auto m{{ $mpRight }}-auto">
                    <h1 class="title mb-0">{{ $article->title }}</h1>
                </div>
            </div>
            <nav aria-label="breadcrumb" class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('articles.index') }}">{{ trans('breadcrumb_pages.articles') }}</a></li>
                    <li class="breadcrumb-item active">{{ $article->title }}</li>
                </ol>
            </nav>
        </div>
    </section>
    <div class="page-content">
        <section class="pb-17 sm-pb-8">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="left-side">
                            @if($article->banner)
                                <div class="post-image">
                                    <img class="img-fluid" src="{{ $article->banner }}" alt="">
                                </div>
                            @endif
                            <div class="blog-details">
                                <div class="post-desc">
                                    <div class="post-title text-justify">
                                        <h4>{{ $article->title }}</h4>
                                    </div>
                                    <p class="mb-0 line-h-3 text-justify">
                                        {!! $article->text !!}
                                    </p>
                                    @if (count($article->pictures) > 0)
                                        <div class="owl-carousel no-pb" data-dots="false" data-nav="true" data-items="1">
                                            @foreach ($article->pictures as $p => $picture)
                                                @continue($p == 0)
                                                <div class="item">
                                                    <img class="img-fluid" src="{{ $picture }}" alt="تصویر">
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
