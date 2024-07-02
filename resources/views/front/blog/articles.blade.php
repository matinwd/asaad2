@extends('front.master')

@section('content')
    <section class="page-title o-hidden text-center parallaxie" data-overlay="7"
             data-bg-img="{{ \App\Helpers\Helper::Setting('page_header_pic')->val }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 m{{ $mpLeft }}-auto m{{ $mpRight }}-auto">
                    <h1 class="title mb-0">{{ trans('title_pages.articles') }}</h1>
                </div>
            </div>
            <nav aria-label="breadcrumb" class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">{{ trans('title_pages.articles') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('breadcrumb_pages.articles') }}</li>
                </ol>
            </nav>
        </div>
    </section>
    <div class="page-content">
        <section class="pb-17 sm-pb-8">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        @foreach ($articles as $article)
                            <div class="blog-classic">
                                <div class="post">
                                    <div class="post-desc">
                                        <div class="post-title text-justify">
                                            <h5>
                                                <a href="{{ route('articles.show',$article) }}">
                                                    {{ $article->title }}
                                                </a>
                                            </h5>
                                        </div>
                                        <p class="text-justify">
                                            {{ $article->details }}
                                        </p>
                                    </div>
                                    <div class="post-bottom">
                                        <a class="post-btn" href="{{ route('articles.show',$article) }}">{{ trans('actions.read_more') }}<i class="mx-2 fas fa-long-arrow-alt-{{ $cLeft }}"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <nav>
                            {!! $articles->render() !!}
                        </nav>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
