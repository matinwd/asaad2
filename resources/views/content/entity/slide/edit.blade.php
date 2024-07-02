@extends('layouts/contentLayoutMaster')

@section('title', $slide->name)

@section('vendor-style')
@endsection
@section('page-style')
@endsection

@section('content')
    <section id="vApp">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('cms.slides.update',$slide) }}" method="post">
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
                                    <label class="d-block">عنوان</label>
                                    <input class="form-control" name="name" value="{{ old('name',$slide->name) }}"/>
                                    @error('name')
                                    <div class="v-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="d-block">اولویت بندی</label>
                                    <input class="form-control" name="position" value="{{ old('position',$slide->position) }}"/>
                                    @error('position')
                                    <div class="v-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label class="d-block">فایل (تصویر / ویدئو)</label>
                                    <pic-single input-name="image"
                                                :current-picture="{{ json_encode(\App\Helpers\Helper::renderPictureArray(old('image',$slide->image),true)) }}"></pic-single>
                                    @error('image')
                                    <div class="v-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label class="d-block">پیوند</label>
                                    <input class="form-control" dir="ltr" name="url"
                                           value="{{ old('url',$slide->url) }}"/>
                                    @error('url')
                                    <div class="v-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="d-block">نوع</label>
                                    <select name="type" class="form-control">
                                        <option value="img" {{ old('type',$slide->type) == 'img' ? "selected" : "" }}>
                                            تصویر
                                        </option>
                                        <option value="video" {{ old('type',$slide->type) == 'video' ? "selected" : "" }}>
                                            ویدئو
                                        </option>
                                    </select>
                                    @error('type')
                                    <div class="v-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="d-block">وضعیت نمایش</label>
                                    <select name="active" class="form-control">
                                        <option value="1" {{ old('active',$slide->active) == '1' ? "selected" : "" }}>
                                            فعال
                                        </option>
                                        <option value="0" {{ old('active',$slide->active) == '0' ? "selected" : "" }}>
                                            غیرفعال
                                        </option>
                                    </select>
                                    @error('active')
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
                            </ul>
                            <div class="tab-content">
                                @foreach (\App\Helpers\Helper::activeLanguages() ?? [] as $i => $lang)
                                    <div class="tab-pane {{ $i == 0 ? "active" : "" }}" id="{{ $lang->code }}_lang">
                                        <div class="row">
                                            @if($lang->code != 'fa')
                                                <div class="col-12 form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                               id="has-lang-{{ $lang->code }}"
                                                               name="has_lang[{{ $lang->code }}]"
                                                                {{ old('has_lang.' . $lang->code) ? 'checked' : '' }} />
                                                        <label class="custom-control-label"
                                                               for="has-lang-{{ $lang->code }}">فعال/غیرفعال</label>
                                                    </div>
                                                </div>
                                            @else
                                                <input type="hidden" name="has_lang[fa]" value="on">
                                            @endif
                                            <div class="col-12 form-group">
                                                <label class="d-block">عنوان (اختیاری)</label>
                                                <input class="form-control" name="{{ $lang->code }}[title]"
                                                       value="{{ old($lang->code . '.title',$slide->translateOrNew($lang->code)->title) }}"/>
                                                @error($lang->code . '.title')
                                                <div class="v-error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-12 form-group">
                                                <label class="d-block">متن (اختیاری)</label>
                                                <input class="form-control" name="{{ $lang->code }}[details]"
                                                       value="{{ old($lang->code . '.title',$slide->translateOrNew($lang->code)->details) }}"/>
                                                @error($lang->code . '.details')
                                                <div class="v-error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
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

@section('vendor-script')
@endsection

@section('page-script')
    <script>
        $(document).ready(function () {
        });
    </script>
@endsection
