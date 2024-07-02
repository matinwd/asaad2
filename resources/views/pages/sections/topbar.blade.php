<div class="topbar">
    <div class="topbar-left d-flex flex-row align-items-center">
        <h6>{{ trans('actions.follow_us') }}</h6>
        <ul class="topbar-social-list gap-2">
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
    <div class="email-area">
        <h6>{{ trans('actions.email') }}: <a href="mailto:{{\App\Helpers\Helper::Setting('footer_email')->translate('en')->value}}"><span>{{\App\Helpers\Helper::Setting('footer_email')->translate('en')->value}}</span></a></h6>
    </div>
    <div class="topbar-right">
        <ul class="topbar-right-list">
            @php($code = \App\Helpers\Helper::currentLocale()->code == 'en' ? 'eng' : 'germeny')
            @php($format = \App\Helpers\Helper::currentLocale()->code == 'en' ? '.png' : '.svg')
            <li><span>{{ trans('actions.languages') }}</span><img src="{{ asset("assets/images/icons/flag-$code$format") }}" alt="image">
                <ul class="topbar-sublist">
                    @foreach(\App\Helpers\Helper::activeLanguages() as $lang)
                        @php($code = $lang->code == 'en' ? 'eng' : 'germeny')
                        @php($format = $lang->code == 'en' ? '.png' : '.svg')
                        <li>
                            <a href="{{ route('lang.switch',[$lang->code]) }}">
                                <img style="margin: 0" src="{{ asset("assets/images/icons/flag-$code$format") }}" alt="image">
                                <span>{{ $lang->name }}</span>
                            </a>
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>
</div>
