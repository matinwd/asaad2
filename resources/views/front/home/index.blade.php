@extends('front.master')

@section('content')
    <div class="page-content">
{{--        @includeWhen(request('history',1) == 1,'front.home.partials.history')--}}

        @includeWhen(request('testimonial',1) == 1,'front.home.partials.testimonial')
{{--        @includeWhen(request('team',1) == 1,'front.home.partials.team')--}}
    </div>
@endsection
