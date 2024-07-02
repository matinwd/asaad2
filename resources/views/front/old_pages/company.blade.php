@extends('front.master')

@section('content')
    <section class="page-title o-hidden text-center parallaxie" data-overlay="7"
             data-bg-img="{{ \App\Helpers\Helper::Setting('page_header_pic')->val }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 m{{ $mpLeft }}-auto m{{ $mpRight }}-auto">
                    <h1 class="title mb-0">{{ $item['name'] }}</h1>
                </div>
            </div>
            <nav aria-label="breadcrumb" class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">شرکت های وابسته</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">{{ $item['type'] }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ $item['name'] }}</li>
                </ol>
            </nav>
        </div>
    </section>
    <div class="page-content">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="media">
                            <img class="mx-3" src="{{ $item['logo'] }}" alt="LOGO"
                                 style="width: 120px;">
                            <div class="media-body">
                                @foreach ($item['list_a'] as $info)
                                    <h5 class="mt-2">{{ $info['label'] }} : <span
                                            class="text-dark">{{ $info['text'] }}</span></h5>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-3 mb-5">
                        <div class="team-desc">
                            <ul class="media-icon list-unstyled">
                                @foreach ($item['list_b'] as $info)
                                    @switch($info['type'] ?? "text")
                                        @case("text-ltr")
                                        <li class="mb-2">
                                            <span class="text-theme">{{ $info['label'] }} : </span>
                                            <span class="d-inline-block" dir="ltr">{{ $info['text'] }}</span>
                                        </li>
                                        @break
                                        @case("link")
                                        <li class="mb-2">
                                            <span class="text-theme">{{ $info['label'] }} : </span>
                                            <a href="{{ $info['url'] }}">{{ $info['text'] }}</a>
                                        </li>
                                        @break
                                        @default
                                        <li class="mb-2">
                                            <span class="text-theme">{{ $info['label'] }} : </span>
                                            <span>{{ $info['text'] ?? '_' }}</span>
                                        </li>
                                    @endswitch
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-12">
                        @foreach ($item['titles'] as $title)
                            <h3 class="title">{{ $title['h'] }}</h3>
                            <p class="lead text-justify">
                                {!! $title['p'] !!}
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
