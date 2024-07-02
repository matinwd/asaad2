@extends('layouts/contentLayoutMaster')

@section('title', 'پیکربندی صفحه')

@php($bodyId = 'vAppb')

@section('content')
    <section id="vApp">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('cms.templates.update',$template) }}" method="post">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="config_template" value="{{ uniqid() }}">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills">
                                @foreach (\App\Helpers\Helper::activeLanguages() as $i => $lang)
                                    <li class="nav-item">
                                        <a class="nav-link {{ $i == 0 ? "active" : "" }}"
                                           id="{{ $lang->code }}-lang-tab" data-toggle="pill"
                                           href="#{{ $lang->code }}_lang">
                                            <i class="flag-icon flag-icon-{{ $lang->flag }}"></i>
                                            {{ $lang->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="tab-content">
                                @foreach (\App\Helpers\Helper::activeLanguages() as $i => $lang)
                                    <div class="tab-pane {{ $i == 0 ? "active" : "" }}" id="{{ $lang->code }}_lang">
                                            <input type="hidden" name="has_lang[{{$lang->code }}]" value="on">
                                        <template-builder
                                                :current-template-blocks="{{ json_encode($template->translateOrNew($lang->code)->content)  }}"
                                                :current-blocks="{{ json_encode(config('custom.blocks'))  }}"
                                                modal-id="{{ $lang->code }}_confModal"
                                                input-name="{{ $lang->code }}[content]">
                                        </template-builder>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">بروزرسانی</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('page-style')
    <style>
        .tox-tinymce-aux {
            z-index: 100000 !important;
        }
    </style>
@endsection

@section('page-script')
@endsection
