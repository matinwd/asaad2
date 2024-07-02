<?php
if (!isset($data['background']))
    $data['background'] = null;
?>

@php($key = uniqid())

<div class="live-auction pt-120">
    <div class="container position-relative">
        <div class="row mb-60 gy-4 d-flex justify-content-center">
<div class="col-lg-{{ $data['col_lg'] ?? '12' }} col-md-{{ $data['col_md'] ?? '12' }} col-sm-{{ $data['col_sm'] ?? '12' }} text-center order-lg-2 order-1">
    <h2 class="section-title3">{{ $data['title'] }}</h2>
    <div class="faq-wrap wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".2s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.2s; animation-name: fadeInUp;">
        <div class="accordion" id="accordion-{{$key}}">

           @foreach($data['items'] as $i => $item)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{$i + 1}}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$i + 1}}" aria-expanded="false" aria-controls="collapse{{$i + 1}}">
                            {{ $item['title'] }}
                        </button>
                    </h2>
                    <div id="collapse{{$i + 1}}" class="accordion-collapse collapse" aria-labelledby="heading{{$i + 1}}" data-bs-parent="#accordion-{{$key}}" style="">
                        <div class="accordion-body">
                            {!! $item['text'] !!}
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
        </div>
    </div>
</div>
