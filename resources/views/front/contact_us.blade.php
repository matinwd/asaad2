@extends('front.master')

@section('content')
    <section class="page-title o-hidden text-center parallaxie" data-overlay="7"
             data-bg-img="{{ \App\Helpers\Helper::Setting('page_header_pic')->val }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 m{{ $mpLeft }}-auto m{{ $mpRight }}-auto">
                    <h1 class="title mb-0">{{ trans('title_pages.contact_us') }}</h1>
                </div>
            </div>
            <nav aria-label="breadcrumb" class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('title_pages.contact_us') }}</li>
                </ol>
            </nav>
        </div>
    </section>
    <div class="page-content">
        <section class="o-hidden p-0">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="map iframe-h">
                            <iframe src="{{ \App\Helpers\Helper::Setting('google_map')->value }}"
                                    width="600" height="450" style="border:0;"
                                    allowfullscreen="" loading="lazy">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact-2">
            <div class="container">
                <div class="row pos-r" style="margin-bottom: 14rem;">
                    <div class="col-lg-8 m{{ $mpRight }}-auto">
                        <div class="contact-main">
                            <h2 class="title mb-4">{{ trans('contact_modal.title') }}</h2>
                            <form id="contact-form" method="post" action="{{ route('contact_us') }}">
                                @csrf
                                {!! RecaptchaV3::field('contact_us') !!}
                                @error('g-recaptcha-response')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="messages"></div>
                                <div class="form-group">
                                    <input id="form_name" type="text" name="name" class="form-control"
                                           placeholder="{{ trans('contact_modal.field_label_name') }}" required="required"
                                           data-error="{{ trans('contact_modal.field_validate_name') }}">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <input id="form_email" type="email" name="email" class="form-control"
                                           placeholder="{{ trans('contact_modal.field_label_email') }}" required="required"
                                           data-error="{{ trans('contact_modal.field_validate_email') }}">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <input id="form_subject" type="text" name="subject" class="form-control"
                                           placeholder="{{ trans('contact_modal.field_label_subject') }}" required="required"
                                           data-error="{{ trans('contact_modal.field_validate_subject') }}">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <textarea id="form_message" name="message" class="form-control"
                                              placeholder="{{ trans('contact_modal.field_label_message') }}" rows="4" required="required"
                                              data-error="{{ trans('contact_modal.field_validate_message') }}"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <button class="btn btn-border btn-radius"><span>{{ trans('contact_modal.btn_send') }}</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="form-info theme-bg text-white">
                        <h2 class="title"><span>{{ trans('titles.contact_us') }}</span></h2>
                        <ul class="contact-info list-unstyled mt-4">
                            @foreach (\App\Helpers\Helper::Setting('contact_info')->val ?? [] as $item)
                                <li class="mb-4">
                                    <i class="{{ $item['icon'] }}"></i>
                                    <span>{{ $item['title'] }}</span>
                                    @if(is_array($item['value']))
                                        @if(($item['type'] ?? 'text') == 'tel')
                                            @foreach ($item['value'] ?? [] as $tel)
                                                @php($tel = str_replace('-',null,$tel))
                                                <a href="tel:{{ ($tel[0] ?? 'z') == "0" ? substr_replace($tel,'+98',0,1) : $tel }}">{{ $tel }}</a>
                                                <br>
                                            @endforeach
                                        @endif
                                    @else
                                        @if(($item['type'] ?? 'text') == 'tel')
                                            @php($item['value'] = str_replace('-',null,$item['value']))
                                            <a href="tel:{{ ($item['value'][0] ?? 'z') == "0" ? substr_replace($item['value'],'+98',0,1) : $item['value'] }}">{{ $item['value'] }}</a>
                                        @elseif (($item['type'] ?? 'text') == 'email')
                                            <a href="mailto:{{ $item['value'] }}">{{ $item['value'] }}</a>
                                        @else
                                            <p>{{ $item['value'] }}</p>
                                        @endif
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
