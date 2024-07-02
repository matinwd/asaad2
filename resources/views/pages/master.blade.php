<!DOCTYPE html>
@php($currentLocale = \App\Helpers\Helper::currentLocale())

<html lang="{{ $currentLocale->code }}" dir="{{ $currentLocale->direction }}">
@include('pages.partials.header')

<body>

@include('pages.sections.mobile-search')

@include('pages.sections.topbar')

@include('pages.sections.header')


@yield('content')

@include('pages.sections.footer')

@include('pages.partials.footer')
</body>

</html>
