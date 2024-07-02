@extends('layouts/contentLayoutMaster')

@section('title', 'ثبت سوال متداول جدید')
@php($useTiny = 1)
@section('content')
    <section id="vApp">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('cms.questions.store') }}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger p-2">
                                    <p>خطای سنجش اطلاعات :‌ لطفا پیغام های زیر را بررسی کنید</p>
                                </div>
                            @endif

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
                                        <div class="row">

                                                <input type="hidden" name="has_lang[{{ $lang->code }}]" value="on">
                                            <div class="col-12 form-group">
                                                <label class="d-block">عنوان (اختیاری)</label>
                                                <input class="form-control" name="{{ $lang->code }}[name]"
                                                       value="{{ old($lang->code . '.name') }}"/>
                                                @error($lang->code . '.name')
                                                <div class="v-error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-12 form-group">
                                                <label class="d-block">متن</label>
                                                <textarea id="e-{{  $lang->code  }}-tt" class="c_editor form-control"
                                                          name="{{ $lang->code }}[description]">{{ old($lang->code . '.description') }}</textarea>
                                                @error($lang->code . '.description')
                                                <div class="v-error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">ثبت</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
@endsection


@section('vendor-script')
    @includeIf('panels.rich_editor_assets')
@endsection


@section('page-script')
    <script>
        $(document).ready(function () {
        })
    </script>
@endsection
