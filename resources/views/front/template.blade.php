@extends('pages.master')
{{--
@if($template->slug == 'home')
    @push('end_styles')
    @endpush
@endif--}}
@section('content')
    @if($template->slug == 'home')
        <div class="hero-area hero-style-three" style="padding-top: 0">
            <div class="home3-banner">
                {!! App\Helpers\Helper::Setting('intro_movie')->translate('en')->value !!}
            </div>
            <div class="container-lg container-fluid" style="max-width: 1750px">
                <div class="row d-flex justify-content-start align-items-end">
                    <div class="col-xl-7 col-lg-7 px-0">
                        <div class="banner3-content">
                            <h1 class="wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="1s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 1s; animation-name: fadeInDown;">{{ App\Helpers\Helper::Setting('intro_text')->value }}</h1>
                            <p class="wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 1s; animation-name: fadeInUp;">{{ App\Helpers\Helper::Setting('intro_subtext')->value }}</p>
                            <a href="{{ App\Helpers\Helper::Setting('intro_button_url')->value }}" class="eg-btn btn--primary3 btn--lg wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.8s" style="visibility: visible; animation-duration: 2s; animation-delay: 0.8s; animation-name: fadeInUp;">{{ App\Helpers\Helper::Setting('intro_button')->value }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="inner-banner">
            <div class="container">
                <h2 class="inner-banner-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.2s; animation-name: fadeInLeft;">{{ $template->title }}</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{trans('breadcrumb_pages.home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $template->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>

    @endif

    @foreach ($template->content ?? [] as $i => $block)

{{--        @dump($block)--}}
        @if($block['component'] != 'reviews-block')

            <div class="container">
                <div class="row">
                      <x-block :data="$block"/>
                </div>
            </div>

        @else
            <x-block :data="$block"/>
        @endif
    @endforeach

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