<?php
if (!isset($data['background']))
    $data['background'] = null;
?>
<?php
if (!isset($data['background']))
    $data['background'] = null;
?>
<div class="pt-120">

    <div class="col-lg-{{ $data['col_lg'] ?? '12' }} col-md-{{ $data['col_md'] ?? '12' }} col-sm-{{ $data['col_sm'] ?? '12' }}">
        <div class="blog-details-single">
            <div class="blog-img">
                @if(trim($data['title']))
                    <div class="col-lg-8 col-md-10 m{{ $mpLeft }}-auto m{{ $mpRight }}-auto wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".2s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.2s; animation-name: fadeInDown;">
                        <div class="section-title">
                            <h2 class="title"><span>{{ $data['title'] ?? null }}</span></h2>
                            <p class="mb-0">{{ $data['details'] ?? null }}</p>
                        </div>
                    </div>
                @endif
                <div class="col-12 text-center">
                    <audio class="d-block w-100 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".2s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.2s; animation-name: fadeInDown;" controls>
                        <source src="{{ $data['file']['url'] ?? "https://google.ir/null" }}"
                                type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </div>
            </div>
        </div>
    </div>
</div>
