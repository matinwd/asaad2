<?php
if (!isset($data['background']))
    $data['background'] = null;
?>

<div class="choose-us-section pt-120" id="choose-us">
    <img src="{{ $data['data_bg_img']['url'] ?? (isset($data['data_bg_img']) && is_string($data['data_bg_img']) ? $data['data_bg_img'] : null) }}" class="section-bg-bottom" alt="">
    <div class="container position-relative">
        <img src="assets/images/bg/angle-vector.png" class="img-fluid angle-vector" alt="">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="section-title1">
                    @isset($data['title'])
                    <h2>{{ $data['title'] }}</h2>
                    @endisset
                    @isset($data['description'])
                    <div>
                        {{ $data['description'] }}
                    </div>
                    @endisset
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center g-4">
            @foreach($data['items'] as $i => $item)
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="single-feature hover-border1 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".2s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.2s; animation-name: fadeInDown;">
                        <span class="sn">{{ $i + 1 }}</span>
                        <div class="icon">
                            {!! $item['icon'] !!}
                        </div>
                        <div class="content">
                            <h5><a href="{{ $item['url'] ?? '#' }}">{{ $item['title'] }}</a></h5>
                            <p class="para">{{ $item['description'] }} </p>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</div>
