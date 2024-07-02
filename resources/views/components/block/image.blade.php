<?php
if (!isset($data['background']))
    $data['background'] = null;
?>
    <div class="pt-120 col-lg-{{ $data['col_lg'] ?? '12' }} col-md-{{ $data['col_md'] ?? '12' }} col-sm-{{ $data['col_sm'] ?? '12' }}">
        <div class="blog-details-single">
            <div class="blog-img">
                <img alt="={{ $data['title'] ?? '' }}" title="{{ $data['title'] ?? '' }}" src="{{ $data['file']['url'] }}" class="rounded img-fluid wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".2s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.2s; animation-name: fadeInDown;">
                @isset($data['text'])
                    <p class="para font-medium-2 text-muted text-center wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".2s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.2s; animation-name: fadeInDown;">{{ $data['text'] }}</p>
                @endisset
            </div>
        </div>
    </div>
