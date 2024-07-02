<section class="grey-bg">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-8 col-md-10 m{{ $mpLeft }}-auto m{{ $mpRight }}-auto">
                <div class="section-title">
                    <h2 class="title">فعالیت ها</h2>
                    <p class="mb-0">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</p>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-12">
                <div class="portfolio-filter">
                    <button data-filter=".cat1">تولیدی</button>
                    <button data-filter=".cat2">بازرگانی</button>
                    <button data-filter=".cat3">اکتشافی</button>
                    <button data-filter=".cat4">تحقیق و توسعه</button>
                    <button data-filter="" class="is-checked">کلی</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="masonry row columns-4 no-gutters popup-gallery">
                    <div class="grid-sizer"></div>
                    @for ($i = 1; $i <= 10; $i++)
                        <div class="masonry-brick cat{{ rand(1,4) }}">
                            <div class="portfolio-item">
                                <img src="{{ asset('front/static/images/portfolio/masonry/'. $i .'.jpeg') }}" alt="">
                                <div class="portfolio-hover">
                                    <div class="portfolio-title">
                                        <h4>لورم ایپسوم</h4>
                                    </div>
                                    <div class="portfolio-icon">
                                        <a title="لورم ایپسوم" details="لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است" class="popup popup-img" href="{{ asset('front/static/images/portfolio/large/'. $i .'.jpeg') }}"> <i
                                                class="flaticon-magnifier"></i>
                                        </a>
                                        <a class="popup portfolio-link" target="_blank"
                                           href="javascript:;"> <i class="flaticon-broken-link-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</section>
