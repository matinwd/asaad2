<?php
if (!isset($data['background']))
    $data['background'] = null;
?>
<div class="pt-120">

    <div class="col-lg-{{ $data['col_lg'] ?? '12' }} col-md-{{ $data['col_md'] ?? '12' }} col-sm-{{ $data['col_sm'] ?? '12' }}">
        <div class="blog-details-single">
            <div class="blog-img">
                <video controls   title="{{ $data['title'] ?? '' }}" src="{{ $data['file']['url'] }}" class="rounded w-100 img-fluid wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".2s" style="background: #fff;
box-shadow: 3px 2px 35px rgba(0,27,85,.08);visibility: visible; animation-duration: 1.5s; animation-delay: 0.2s; animation-name: fadeInDown;"></video>
                @isset($data['text'])
                    <p class="lara text-center">{{ $data['text'] }}</p>
                @endisset
            </div>
        </div>
    </div>
</div>