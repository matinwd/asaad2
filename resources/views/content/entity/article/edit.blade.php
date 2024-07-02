@php($useTiny = true)
@extends('layouts/contentLayoutMaster')

@section('title', $article->title)

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/selectize/selectize.css')) }}">
@endsection
@section('page-style')

@endsection

@section('content')
    <section id="vApp">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('cms.articles.update',$article) }}" method="post">
                    <input type="hidden" name="id" value="{{ $article->id }}">
                    @csrf
                    @method('patch')
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger p-2">
                                    <p>خطای سنجش اطلاعات :‌ لطفا پیغام های زیر را بررسی کنید</p>
                                </div>
                            @endif
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="d-block">Slug</label>
                                    <input class="form-control" dir="ltr" name="slug" value="{{ old('slug',$article->slug) }}"/>
                                    @error('slug')
                                    <div class="v-error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <ul class="nav nav-pills">
                                @foreach (\App\Helpers\Helper::activeLanguages() ?? [] as $i => $lang)
                                    <li class="nav-item">
                                        <a class="nav-link {{ $i == 0 ? "active" : "" }}"
                                           id="{{ $lang->code }}-lang-tab" data-toggle="pill"
                                           href="#{{ $lang->code }}_lang">
                                            <i class="flag-icon flag-icon-{{ $lang->flag }}"></i>
                                            {{ $lang->name }}
                                        </a>
                                    </li>
                                @endforeach
                                <li class="nav-item">
                                    <a class="nav-link" id="pictures-tab" data-toggle="pill" href="#pictures_tab">
                                        تصاویر
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                @foreach (\App\Helpers\Helper::activeLanguages() ?? [] as $i => $lang)
                                    <div class="tab-pane {{ $i == 0 ? "active" : "" }}" id="{{ $lang->code }}_lang">
                                        <div class="row">
                                            @if($lang->code != 'fa')
                                                <div class="col-12 form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="has-lang-{{ $lang->code }}" name="has_lang[{{ $lang->code }}]"
                                                                {{ old('has_lang.' . $lang->code,$article->hasTranslation($lang->code)) ? 'checked' : '' }} />
                                                        <label class="custom-control-label" for="has-lang-{{ $lang->code }}">فعال/غیرفعال</label>
                                                    </div>
                                                </div>
                                            @else
                                                <input type="hidden" name="has_lang[fa]" value="on">
                                            @endif
                                            <div class="col-md-6 col-12 form-group">
                                                <label class="d-block">عنوان</label>
                                                <input class="form-control" name="{{ $lang->code }}[title]" value="{{ old($lang->code . '.title',$article->translateOrNew($lang->code)->title) }}"/>
                                                @error($lang->code . '.title')
                                                <div class="v-error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 form-group">
                                                <label class="d-block">شرح</label>
                                                <input class="form-control" name="{{ $lang->code }}[details]" value="{{ old($lang->code . '.details',$article->translateOrNew($lang->code)->details) }}"/>
                                                @error($lang->code . '.details')
                                                <div class="v-error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 form-group">
                                                <label class="d-block">متن</label>
                                                <textarea id="e-{{  $lang->code  }}-tt" class="c_editor form-control"
                                                          name="{{ $lang->code }}[text]">{{ old($lang->code . '.text',$article->translateOrNew($lang->code)->text) }}</textarea>
                                                @error($lang->code . '.text')
                                                <div class="v-error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="tab-pane" id="pictures_tab">
                                    <pic-list :current-list="{{ json_encode(\App\Helpers\Helper::renderPictureArray(old('pictures',$article->pictures))) }}">
                                    </pic-list>
                                </div>
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

@section('vendor-script')
    @includeIf('panels.rich_editor_assets')
    <script src="{{ asset(mix('vendors/js/selectize/selectize.js')) }}"></script>
@endsection

@section('page-script')
    <script>
        $(document).ready(function () {
            $('.input-tags').selectize({
                plugins: ['remove_button'],
                delimiter: ',',
                persist: false,
                create: function (input) {
                    return {value: input, text: input}
                }
            });
        })
    </script>
@endsection
