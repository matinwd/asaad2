<!DOCTYPE html>
<html lang="{{ $currentLocale->code }}" dir="{{ $currentLocale->direction }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {!! SEOMeta::generate() !!}
{{--    <title>{{ trans('titles.app') }}</title>--}}
    <link rel="shortcut icon" href="{{ \App\Helpers\Helper::Setting('favicon')->val }}"/>
    @stack('styles')
    <link href="{{ asset('front/static/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('front/static/css/animate.css') }}" rel="stylesheet"/>
    <link href="{{ asset('front/static/css/fontawesome-all.css') }}" rel="stylesheet"/>
    <link href="{{ asset('front/static/css/themify-icons.css') }}" rel="stylesheet"/>
    <link href="{{ asset('front/static/css/magnific-popup/magnific-popup.css') }}" rel="stylesheet"/>
    <link href="{{ asset('front/static/css/owl-carousel/owl.carousel.css') }}" rel="stylesheet"/>
    <link href="{{ asset('front/static/css/base.' . $currentLocale->direction .'.css') }}" rel="stylesheet"/>
    <link href="{{ asset('front/static/css/shortcodes.' . $currentLocale->direction .'.css') }}" rel="stylesheet"/>
    <link href="{{ asset('front/static/css/style.' . $currentLocale->direction .'.css') }}" rel="stylesheet"/>
    <link href="{{ asset('front/static/css/responsive.' . $currentLocale->direction .'.css') }}" rel="stylesheet"/>
    <link href="{{ asset('front/static/css/theme-brand.css') }}" data-style="styles" rel="stylesheet">
    <link href="{{ asset('front/static/css/custom.css') }}" rel="stylesheet">
    @if(\App\Helpers\Helper::localeIsPersian())
        <link href="{{ asset('fonts/iransans/iran-sans.css') }}" rel="stylesheet"/>
    @endif
    <link href="{{ asset('fonts/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet"/>
    @stack('end_styles')
    {!! \Lunaweb\RecaptchaV3\Facades\RecaptchaV3::initJs() !!}
    <style>
        .grecaptcha-badge { visibility: hidden !important; }
    </style>
</head>

<body class="{{ $currentLocale->direction }} {{ \App\Helpers\Helper::localeIsPersian() ? 'iransans' : null }}">
<div class="page-wrapper">
    <div id="ht-preloader">
        <div class="loader clear-loader"><img src="{{ asset('front/static/images/loader.gif') }}" alt=""></div>
    </div>
    <x-header/>
    @yield('content')
    <x-footer/>
</div>
{{--@includeWhen(Route::currentRouteName() != 'contact_us','front.panels.contact_modal')--}}
<div class="scroll-top"><a class="smoothscroll" href="#top"><i class="fas fa-chevron-up"></i></a></div>

@stack('scripts')
<script src="{{ asset('front/static/js/theme.js') }}"></script>
<script src="{{ asset('front/static/js/audioplayer/plyr.min.js') }}"></script>
<script src="{{ asset('front/static/js/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('front/static/js/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('front/static/js/parallax/parallaxie.min.js') }}"></script>
<script src="{{ asset('front/static/js/counter/counter.js') }}"></script>
<script src="{{ asset('front/static/js/particle/jquery.particleground.min.js') }}"></script>
<script src="{{ asset('front/static/js/countdown/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('front/static/js/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('front/static/js/contact-form/contact-form.js') }}"></script>
<script src="{{ asset('front/static/js/theme-script.' . $currentLocale->direction .'.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('sweet::alert')

@stack('end_scripts')
<script>
    function fnGetCities(province_id, city_element_id = '#js-city') {
        const $cityEl = $(city_element_id);
        $cityEl.find('option').remove();

        let $optionDefault = new Option('در حال بارگیری ...');
        $optionDefault.setAttribute('selected', 'selected');
        $optionDefault.setAttribute('disabled', 'disabled');
        $cityEl.append($optionDefault);

        $.ajax({
            type: 'GET',
            url: `/get-cities?province_id=${province_id}`,
            success: function (response) {
                $cityEl.find('option').remove();
                $.each(response, function (index, item) {
                    let $option = new Option(item.name, item.name);
                    $cityEl.append($option);
                });
            }
        });
    }

    $(document).ready(function () {
        $('.province-el').change(function () {
            let provinceId = $('option:selected', this).attr('data-id');
            fnGetCities(provinceId,'#' + this.dataset.cityId);
        });
    });
        if (document.querySelector('.custom-file-input'))
        document.querySelector('.custom-file-input').addEventListener('change', function (e) {
            var fileName = this.files[0].name;
            var nextSibling = e.target.nextElementSibling
            nextSibling.innerText = fileName
        });

</script>
</body>
</html>
