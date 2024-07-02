<?php
if (!isset($data['background']))
    $data['background'] = null;
?><div class="category-section pt-120">
    <div class="container position-relative">
        <div class="row d-flex justify-content-center">
            <div class="swiper category1-slider">
                <div class="swiper-wrapper" >
                 @foreach($data['items'] as $i => $item)
                        <div class="swiper-slide">
                            <div class="eg-card category-card1 style2 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.2s">
                                <div class="cat-icon">
                                    {!! $item['icon'] !!}
                                </div>
                                <a href="{{ $item['url'] }}">
                                    <h5>{{ $item['title'] }}</h5>
                                </a>
                            </div>
                        </div>
                 @endforeach

                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
        </div>
        <div class="slider-arrows text-center d-lg-flex d-none  justify-content-end">
            <div class="category-prev1 style2 swiper-prev-arrow" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-a97afa7ca7128e77"> <i class="bx bx-chevron-left"></i> </div>
            <div class="category-next1 style2 swiper-next-arrow" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-a97afa7ca7128e77"> <i class="bx bx-chevron-right"></i></div>
        </div>
    </div>
</div>