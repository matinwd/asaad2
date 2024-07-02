@extends('front.master')

@section('content')
    <section class="page-title o-hidden text-center parallaxie" data-overlay="7"
             data-bg-img="{{ \App\Helpers\Helper::Setting('page_header_pic')->val }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 m{{ $mpLeft }}-auto m{{ $mpRight }}-auto">
                    <h1 class="title mb-0">{{ trans('title_pages.gallery') }}</h1>
                </div>
            </div>
            <nav aria-label="breadcrumb" class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item active">{{ trans('title_pages.gallery') }}</li>
                </ol>
            </nav>
        </div>
    </section>
    <div class="page-content">
        <section class="pb-17 sm-pb-8">
            <div class="container">
                <div class="row">
                        @foreach ($galleries ?? [] as $index => $gallery)
                        <div class="col-lg-4 col-md-6 col-sm-12 mt-5">
                            <a href="{{ route('galleries.show',$gallery) }}">
                                <div class="media">
                                    <img class="mx-3 img-fluid rounded" src="{{ $gallery->pictures[0] }}" alt="thumb"
                                         style="width: 150px;">
                                    <div class="media-body">
                                        <h5 class="mt-2">{{ $gallery->title }}</h5>
                                        <span class="mt-2 text-black-50">{{ $gallery->getDisplayDate() }}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
