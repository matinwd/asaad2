@extends('layouts/contentLayoutMaster')

@section('title', 'ویرایش صفحه')

@section('content')
    <section id="vApp">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('cms.templates.update',$template) }}" method="post">
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
                                    <label class="d-block">نام</label>
                                    <input class="form-control" name="name" value="{{ old('name',$template->name) }}"/>
                                    @error('name')
                                    <div class="v-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="d-block">Slug</label>
                                    <input dir="ltr" class="form-control" name="slug" value="{{ old('slug',$template->slug) }}"/>
                                    @error('slug')
                                    <div class="v-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 d-none">
                                    <label class="d-block">محدودیت دسترسی فعال باشد؟</label>
                                    <select name="password" class="form-control">
                                        <option value="0" {{ old('password',$template->password) == '0' ? "selected" : "" }}>
                                            خیر
                                        </option>
                                        <option value="1" {{ old('password',$template->password) == '1' ? "selected" : "" }}>
                                            بله
                                        </option>
                                    </select>
                                    @error('password')
                                    <div class="v-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="d-block">وضعیت نمایش</label>
                                    <select name="active" class="form-control">
                                        <option disabled readonly selected>-- انتخاب وضعیت --</option>
                                        <option value="1" {{ old('active',$template->active) == '1' ? "selected" : "" }}>
                                            فعال
                                        </option>
                                        <option value="0" {{ old('active',$template->active) == '0' ? "selected" : "" }}>
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
                                            @if($lang->code != 'fa')
                                                <div class="col-12 form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="has-lang-{{ $lang->code }}" name="has_lang[{{ $lang->code }}]"
                                                                {{ old('has_lang.' . $lang->code,$template->hasTranslation($lang->code)) ? 'checked' : '' }} />
                                                        <label class="custom-control-label" for="has-lang-{{ $lang->code }}">فعال/غیرفعال</label>
                                                    </div>
                                                </div>
                                            @else
                                                <input type="hidden" name="has_lang[fa]" value="on">
                                            @endif
                                            <div class="col-md-6 form-group">
                                                <label class="d-block">عنوان</label>
                                                <input class="form-control" name="{{ $lang->code }}[title]" value="{{ old($lang->code . '.title',$template->translateOrNew($lang->code)->title) }}"/>
                                                @error($lang->code . '.title')
                                                <div class="v-error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="d-block">تصویر</label>
                                                <pic-single input-name="{{ $lang->code }}[image]" :current-picture="{{ json_encode(\App\Helpers\Helper::renderPictureArray(old($lang->code . '.image',$template->translateOrNew($lang->code)->image),true)) }}"></pic-single>
                                                @error($lang->code . '.image')
                                                <div class="v-error">{{ $message }}</div>
                                                @enderror
                                            </div>

                                                <div class="col-md-12 form-group">
                                                    <label class="d-block">توضیحات سئو</label>
                                                    <input class="form-control" name="{{ $lang->code }}[short_description]"
                                                           value="{{ old($lang->code . '.short_description',$template->translateOrNew($lang->code)->short_description) }}"/>
                                                    @error($lang->code . '.short_description')
                                                    <div class="v-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <label class="d-block">کلمات کلیدی سئو</label>
                                                    <input class="form-control" name="{{ $lang->code }}[keywords]"
                                                           value="{{ old($lang->code . '.keywords',$template->translateOrNew($lang->code)->keywords) }}"/>
                                                    @error($lang->code . '.keywords')
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

@section('page-script')
    <script>
        $(document).ready(function () {
        })
    </script>
@endsection
