<style>
    .tp-caption-title1 {
        font-size: 2.5rem !important;
    }

    .tp-caption-desc1 {
        font-size: 1.5rem !important;
    }
</style>
<section class="c-layout-revo-slider c-layout-revo-slider-1 pt-0">
    <div class="tp-banner-container tp-fullscreen tp-fullscreen-mobile" data-bullets-pos="center">
        <div class="tp-banner rev_slider" data-version="5.0">
            <ul>
                @foreach ($slides as $s => $slide)
                    @if($slide->type != "img")
                        <li data-transition="fade" class="main-visual-01">
                            <div class="rs-background-video-layer fulllscreenvideo tp-videolayer"
                                 data-forcerewind="on"
                                 data-volume="mute"
                                 data-videowidth="100%"
                                 data-videoheight="100%"
                                 data-videomp4="{{ $slide->image }}"
                                 data-thumb=""
                                 data-videopreload="preload"
                                 data-videoattributes="loop=loop"
                                 data-videoloop="loop"
                                 data-forceCover="1"
                                 data-aspectratio="16:9"
                                 data-autoplay="true"
                                 data-autoplayonlyfirsttime="false"
                                 data-nextslideatend="true"></div>
                        </li>
                    @else
                        <li data-index="rs-{{ $s }}" class="main-visual-02" data-transition="fade"
                            data-slotamount="default"
                            data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="1500"
                            data-thumb="{{ $slide->image }}" data-rotate="0"
                            data-saveperformance="off" data-title="Parallax" data-description="xcxc">
                            <img src="{{ $slide->image }}" alt=""
                                 data-bgposition="center center" data-kenburns="on" data-duration="10000"
                                 data-ease="Linear.easeNone" data-scalestart="140" data-scaleend="100"
                                 data-rotatestart="0"
                                 data-rotateend="0" data-offsetstart="0 -500" data-offsetend="0 500"
                                 data-bgparallax="10"
                                 class="rev-slidebg" data-no-retina>
                            @if ($slide->title ?? false || $slide->details ?? false)
                                <div class="tp-caption customin customout"
                                     {{--                                     data-x="center"--}}
                                     {{--                                     data-y="center"--}}
                                     {{--                                     data-hoffset=""--}}
                                     {{--                                     data-voffset="-30"--}}

                                     {{--                                     data-transform_in="x:0;y:0;z:0;rX:0.5;rY:0;rZ:0;sX:0.75;sY:0.75;skX:0;skY:0;opacity:0;s:600;e:Power2.easeInOut;"--}}
                                     {{--                                     data-transform_out="x:0;y:0;z:0;rX:0.5;rY:0;rZ:0;sX:0.75;sY:0.75;skX:0;skY:0;opacity:0;s:600;e:Back.easeOut;"--}}
                                     {{--                                     data-splitin="none"--}}
                                     {{--                                     data-splitout="none"--}}
                                     {{--                                     data-elementdelay="0.1"--}}
                                     {{--                                     data-endelementdelay="0.1"--}}
                                     data-start="1500"
                                     data-endspeed="600">
                                    <p class="tp-caption-title1 text-center">{{ $slide->title }}</p>
                                    <h3 class="tp-caption-title2">
                                        <span>‌</span>
                                        <span>‌</span>
                                    </h3>
                                    <p class="tp-caption-desc1 text-center">{{ $slide->details }}</p>
                                </div>
                            @endif
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
        <span class="mouse"></span>
    </div>
</section>
