@extends('front.master')

@section('content')
    <section class="page-title o-hidden text-center parallaxie" data-overlay="7"
             data-bg-img="{{ \App\Helpers\Helper::Setting('page_header_pic')->val }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 m{{ $mpLeft }}-auto m{{ $mpRight }}-auto">
                    <h1 class="title mb-0">{{ $gallery->title }}</h1>
                </div>
            </div>
            <nav aria-label="breadcrumb" class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('galleries.index') }}">
                            {{ trans('title_pages.gallery') }}
                        </a>
                    </li>
                    <li class="breadcrumb-item active">{{ $gallery->title }}</li>
                </ol>
            </nav>
        </div>
    </section>
    <div class="page-content">
        <section class="pb-17 sm-pb-8">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="grid row columns-3 popup-gallery">
                            @foreach ($gallery->pictures ?? [] as $picture)
                                <div class="grid-item">
                                    <div class="portfolio-item">
                                        <img src="{{ $picture }}" alt="">
                                        <div class="portfolio-hover">
                                            <div class="portfolio-icon">
                                                <a class="popup popup-img" href="{{ $picture }}">
                                                    <i class="flaticon-magnifier"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
