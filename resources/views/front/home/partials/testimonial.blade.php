<section class="dark-bg parallaxie" data-bg-img="{{ asset('front/static/lc/img/bg.jpeg') }}" data-overlay="7">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-8 m{{ $mpLeft }}-auto m{{ $mpRight }}-auto">
                <div class="section-title">
                    <h2 class="title">تجربه مشتریان</h2>
                    <p class="mb-0">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="owl-carousel owl-theme" data-items="1" data-autoplay="true">
                    @for ($i = 0; $i < 4; $i++)
                        <div class="item">
                            <div class="testimonial">
                                <div class="row">
                                    <div class="col-lg-10 col-md-12 m{{ $mpLeft }}-auto m{{ $mpRight }}-auto">
                                        <div class="testimonial-avatar">
                                            <div class="testimonial-img">
{{--                                                <img class="img-center" src="{{ asset('front/static/images/thumbnail/01.png') }}" alt="">--}}
                                                <img class="img-center" src="https://www.gravatar.com/avatar/b2437b6f7f7a17a9e02f3b87673235c1?s=200&d=mp&r=pg" alt="">
                                            </div>
                                        </div>
                                        <div class="testimonial-content">
                                            <span><i class="fas fa-quote-{{ $cLeft }}"></i></span>
                                            <p>
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد،
{{--                                                تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>--}}
                                            <div class="testimonial-caption">
                                                <label>{{ $i == 0 ? "سید احمد شریفی" : "محمدرضا مختاری" }}</label>
                                            </div>
                                        </div>
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
