<?php
if (!isset($data['background']))
    $data['background'] = null;
?>
<div class="testimonial-section pt-120 pb-120 mt-120">
    <img alt="image" src="assets/images/bg/client-right.png" class="client-right-vector">
    <img alt="image" src="assets/images/bg/client-left.png" class="client-left-vector">
    <img alt="image" src="assets/images/bg/clent-circle1.png" class="client-circle1">
    <img alt="image" src="assets/images/bg/clent-circle2.png" class="client-circle2">
    <img alt="image" src="assets/images/bg/clent-circle3.png" class="client-circle3">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="section-title4">
                    @isset($data['title'])
                    <h2>{{ $data['title'] }}</h2>
                    @endisset
                    @isset($data['description'])
                        <p class="mb-0">{{ $data['description'] }}</p>
                    @endisset
                </div>
            </div>
        </div>
        <div class="row justify-content-center position-relative">
            <div class="swiper testimonial-slider">
                <div class="swiper-wrapper">
                    @foreach($data['items'] as $item)
                    <div class="swiper-slide">
                        <div class="testimonial-single hover-border3 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".2s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.2s; animation-name: fadeInDown;">
                            <img alt="image" src="{{ asset('assets/images/icons/quote-green2.svg') }}" class="quote-icon">
                            <div class="testi-img">
                                <img alt="image" src="{{ $item['icon']['url'] ?? '' }}">
                            </div>
                            <div class="testi-content">
                                <p class="para">{{$item['description']}}</p>
                                <div class="testi-designation">
                                    <h5><a href="#">{{ $item['user_name'] }}</a></h5>
                                    <p>{{ $item['user_job'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
            <div class="slider-arrows testimonial2-arrow d-flex justify-content-between gap-3">
                <div class="testi-prev1 style-3 swiper-prev-arrow" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-3d031c8aa25a4d19"><i class="bi bi-arrow-left"></i></div>
                <div class="testi-next1 style-3 swiper-next-arrow" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-3d031c8aa25a4d19">
                    <i class="bi bi-arrow-right"></i></div>
            </div>
        </div>
    </div>
</div>