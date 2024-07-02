@extends('layouts/contentLayoutMaster')

@section('title', 'ویرایش دسته بندی')

@section('vendor-style')
@endsection
@section('page-style')
@endsection

@section('content')
    <section id="vApp">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('cms.categories.update',$category) }}" method="post">
                    <input type="hidden" name="id" value="{{ $category->id }}">
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
                                    <input class="form-control" dir="ltr" name="slug" value="{{ old('slug',$category->slug) }}"/>
                                    @error('slug')
                                    <div class="v-error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="d-block">آیکون svg</label>
                                        <textarea class="form-control" dir="ltr" name="svg">{{ old('svg',$category->svg) }}</textarea>
                                        @error('svg')
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
                                                                {{ old('has_lang.' . $lang->code,$category->hasTranslation($lang->code)) ? 'checked' : '' }} />
                                                        <label class="custom-control-label" for="has-lang-{{ $lang->code }}">فعال/غیرفعال</label>
                                                    </div>
                                                </div>
                                            @else
                                                <input type="hidden" name="has_lang[fa]" value="on">
                                            @endif
                                            <div class="col-md-6 col-12 form-group">
                                                <label class="d-block">عنوان</label>
                                                <input class="form-control" name="{{ $lang->code }}[title]" value="{{ old($lang->code . '.title',$category->translateOrNew($lang->code)->title) }}"/>
                                                @error($lang->code . '.title')
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
