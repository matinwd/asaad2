@extends('pages.master')

@section('content')
    <div class="inner-banner">
        <div class="container">
            <h2 class="inner-banner-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">{{ trans('breadcrumb_pages.contact_us') }}</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">{{ trans('breadcrumb_pages.home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ trans('breadcrumb_pages.contact_us') }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="contact-section pt-120 pb-120">
        <img alt="image" src="{{ asset('assets/images/bg/section-bg.png') }}" class="img-fluid section-bg-top">
        <img alt="image" src="{{ asset('assets/images/bg/section-bg.png') }}" class="img-fluid section-bg-bottom">
        <div class="container">
            <div class="row pb-120 mb-70 g-4 d-flex justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="contact-signle hover-border1 d-flex flex-row align-items-center wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".2s">
                        <div class="icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="text">
                            <h4>{{ trans('actions.location') }}</h4>
                            <p>{{ App\Helpers\Helper::Setting('footer_office_address')->value  }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="contact-signle hover-border1 d-flex flex-row align-items-center wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".4s">
                        <div class="icon">
                            <i class='bx bx-phone-call'></i>
                        </div>
                        <div class="text">
                            <h4>{{ trans('actions.phone') }}</h4>
                            <a href="tel:{{ App\Helpers\Helper::Setting('footer_phone')->translate('en')->value }}">{{ App\Helpers\Helper::Setting('footer_phone')->translate('en')->value  }}</a><br>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="contact-signle hover-border1 d-flex flex-row align-items-center wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".6s">
                        <div class="icon">
                            <i class='bx bx-envelope'></i>
                        </div>
                        <div class="text">
                            <h4>{{ trans('actions.email') }}</h4>
                            <a href="mailto:{{ App\Helpers\Helper::Setting('footer_email')->translate('en')->value  }}"><span>{{ App\Helpers\Helper::Setting('footer_email')->translate('en')->value  }}</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="form-wrapper wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".2s">
                        <div class="form-title2">
                            <h3>{{ trans('actions.contact_head') }}</h3>
                            <p class="para">{{ trans('actions.contact_subtext') }}</p>
                        </div>
                        <form method="post" action="{{ route('contact_us') }}">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6 col-lg-12 col-md-6">
                                    <div class="form-inner">
                                        <input name="name" type="text" placeholder="Your Name :">
                                        @error('name')
                                        <span class="error">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12 col-md-6">
                                    <div class="form-inner">
                                        <input name="email" type="email" placeholder="Your Email :">
                                        @error('email')
                                        <span class="error">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="form-inner">
                                        <input name="subject" type="text" placeholder="Subject :">
                                        @error('subject')
                                        <span class="error">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <textarea name="message" placeholder="Write Message :" rows="12"></textarea>
                                    @error('message')
                                    <span class="error">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="eg-btn btn--primary btn--md form--btn">{{ trans('actions.contact_btn') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="map-area wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".4s">
                        <iframe src="{{ \App\Helpers\Helper::Setting('google_map')->value }}"
                                width="600" height="450" style="border:0;"
                                allowfullscreen="" loading="lazy">
                        </iframe>
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