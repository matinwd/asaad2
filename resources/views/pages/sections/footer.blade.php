
<footer>
    <div class="footer-top mt-120">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <a href="{{ url('/') }}"><img src="{{ asset('assets/images/bg/footer-logo.png') }}" alt="{{ trans('actions.logo') }}" title="{{ trans('actions.logo') }}"></a>
                            <ul class="address-list pl-0" style="padding-left: 0">
                                <li class="text-white-50">{{ App\Helpers\Helper::Setting('footer_office_address')->value }}.</li>
                                <li class="text-white-50"><a href="tel:{{  App\Helpers\Helper::Setting('footer_phone')->value }}">{{ trans('actions.phone') }} {{  App\Helpers\Helper::Setting('footer_phone')->value }}</a></li>
                                <li class="text-white-50"><a href="mailto:{{  App\Helpers\Helper::Setting('footer_email')->value }}">{{ trans('actions.email') }} {{  App\Helpers\Helper::Setting('footer_email')->value }}</a></li>
                            </ul>
                            <hr>
                            <p>{{ \App\Helpers\Helper::Setting('footer_about_compacy')->value }}</p>

                        </div>

                </div>
                <div class="col-lg-6 col-md-6 d-flex justify-content-lg-center">
                    <div class="footer-item">
                        <h5>{{ trans('actions.navigation') }}</h5>
                        <ul class="footer-list">
                            @php($menu = App\Models\Menu::where('name','footer')->firstOrFail())

                           @foreach($menu->items ?? [] as $item)
                                <li>
                                    <a href="{{ $item['url'] }}">{{ $item['name'] ?? $item['title'] }}</a>
                                </li>
                            @endforeach

                        </ul>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h5>{{ trans('actions.latest_posts') }}</h5>
                        <ul class="recent-feed-list">
                            @php($posts = \App\Models\Post::take(3)->get())
                            @foreach($posts ?? [] as $post)
                                <li class="single-feed">
                                    <div class="feed-img">
                                        <a href="{{ route('posts.show',[$post->slug]) }}"><img alt="image" src="{{ asset($post->banner) }}"></a>
                                    </div>
                                    <div class="feed-content">
                                        <span>{{ $post->created_at->diffForHumans() }}</span>
                                        <h6><a href="{{ route('posts.show',[$post->slug]) }}">{{ $post->title }}</a></h6>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row d-flex align-items-center g-4">
                <div class="col-lg-6 d-flex justify-content-lg-start justify-content-center">
                    <p>{{ \App\Helpers\Helper::Setting('footer_copyright')->val }}</a></p>
                </div>
                <div class="col-lg-6 d-flex justify-content-lg-end justify-content-center align-items-center flex-sm-nowrap flex-wrap">
                    <p class="d-sm-flex d-none">{{ trans('actions.follow_us') }}</p>
                    <ul class="footer-logo-list">
                        @if(App\Helpers\Helper::Setting('social_facebook')->value)
                            <li><a href="{{ App\Helpers\Helper::Setting('social_facebook')->value }}"><i class='bx bxl-facebook'></i></a></li>
                        @endif
                        @if(App\Helpers\Helper::Setting('social_twitter')->value)
                            <li><a href="{{ App\Helpers\Helper::Setting('social_twitter')->value }}"><i class='bx bxl-twitter'></i></a></li>
                        @endif
                        @if(App\Helpers\Helper::Setting('social_insta')->value)
                            <li><a href="{{ App\Helpers\Helper::Setting('social_insta')->value }}"><i class='bx bxl-instagram'></i></a></li>
                        @endif
                        @if(App\Helpers\Helper::Setting('social_telegram')->value)

                            <li><a href="{{ App\Helpers\Helper::Setting('social_telegram')->value }}"><i class='bx bxl-telegram'></i></a></li>
                        @endif

                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
