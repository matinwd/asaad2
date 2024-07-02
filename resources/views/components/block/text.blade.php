<?php
if (!isset($data['background']))
    $data['background'] = null;
?>

        <div class="how-work-section pt-120 blog-details-single">
            @isset($data['background'])
                <img alt="image" src="{{ asset('assets/images/bg/section-bg.png') }}" class="section-bg-top">
            @endisset
            <div class="{{ $data['col_lg'] ?? '12' }} col-md-{{ $data['col_md'] ?? '12' }} col-sm-{{ $data['col_sm'] ?? '12' }}">
                {!! $data['text'] !!}
            </div>
        </div>
