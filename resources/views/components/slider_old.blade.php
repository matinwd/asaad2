<style>
    @media (max-width:576px) {
        .owl-item .item{
            background-size: contain !important;
        }
        .owl-item .item h1{
            font-size: .75rem !important;
        }
        .owl-item .item .lead{
            font-size: .5rem !important;
        }
    }
</style>
<section class="banner p-0 position-relative fullscreen-banner text-center">
    <div class="banner-slider owl-carousel no-pb" data-dots="true" data-nav="true">
        @foreach ($slides as $s => $slide)
            <a href="{{ $slide->url ?? $slide->link }}">
                <div class="item" data-bg-img="{{ $slide->image }}" data-overlay="{{ $slide->title || $slide->details ? 6 : 0 }}">
                    @if($slide->title || $slide->details)
                        <div class="align-center">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-10 col-md-12 mx-auto">
                                        <div class="p-sm-5 p-2 position-relative">
                                            <h1 class="text-white mb-3 animated8"> {{ $slide->title }} </h1>
                                            <p class="lead text-white animated5 mb-3">{{ $slide->details }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </a>
        @endforeach
    </div>
</section>


