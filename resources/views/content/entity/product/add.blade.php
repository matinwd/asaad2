@php($useTiny = true)
@extends('layouts/contentLayoutMaster')

@section('title', 'ثبت محصول جدید')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/selectize/selectize.css')) }}">
@endsection
@section('page-style')

@endsection

@section('content')
    <section id="vApp">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('cms.products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                {{ $errors->first() }}
                                <div class="alert alert-danger p-2">
                                    <p>خطای سنجش اطلاعات :‌ لطفا پیغام های زیر را بررسی کنید</p>
                                </div>
                            @endif
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="d-block">Slug</label>
                                    <input class="form-control" dir="ltr" name="slug" value="{{ old('slug') }}"/>
                                    @error('slug')
                                    <div class="v-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="d-block">دسته بندی‌</label>
                                    <select name="category_id" class="form-control">
                                        <option disabled readonly selected>-- انتخاب دسته بندی --</option>
                                        @foreach ($categories ?? [] as $c => $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? "selected" : "" }}>
                                                {{ $category->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="v-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="d-block">وضعیت</label>
                                    <select name="visibility" class="form-control">
                                        <option disabled readonly value="">-- انتخاب وضعیت --</option>
                                        <option value="0" {{ old('visibility') == '0' ? "selected" : "" }}>
                                            غیرفعال
                                        </option>
                                        <option selected value="1" {{ old('visibility') == '1' ? "selected" : "" }}>
                                            فعال
                                        </option>
                                    </select>
                                    @error('visibility')
                                    <div class="v-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="d-block">نوع قیمت</label>
                                    <select onchange="checkPriceInput()" name="price_status" class="form-control">
                                        <option disabled readonly selected>-- انتخاب وضعیت --</option>
                                        <option value="0" {{ old('price_status') == '0' ? "selected" : "" }}>
                                            بزودی
                                        </option>
                                        <option selected value="1" {{ old('price_status') == '1' ? "selected" : "" }}>
                                            قیمت عادی
                                        </option>
                                        <option value="2" {{ old('price_status') == '2' ? "selected" : "" }}>
                                            تماس بگیرید
                                        </option>
                                        <option value="3" {{ old('price_status') == '3' ? "selected" : "" }}>
                                            توقف فروش
                                        </option>
                                    </select>
                                    @error('price_status')
                                    <div class="v-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group">
                                    <label class="d-block">قیمت</label>
                                    <input class="form-control" name="price" value="{{ old('price') }}"/>
                                    @error('price')
                                    <div class="v-error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input onchange="checkDiscountInput()" type="checkbox" id="discount_status" name="discount_status" class="custom-control-input">
                                            <label for="discount_status" class="custom-control-label">افزودن تخفیف/قیمت استثنایی</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row d-none" id="discount_wrapper">
                                    <div class="form-group col-md-6">
                                        <label class="d-block">تخفیف</label>
                                        <input class="form-control" type="number" name="discount" value="{{ old('discount') }}"></input>
                                        @error('discount')
                                        <div class="v-error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="d-block">نوع تخفیف</label>
                                        <select  name="discount_type" class="form-control">
                                            <option disabled readonly selected>-- انتخاب وضعیت --</option>
                                            <option value="percent" {{ old('discount_type') == 'percent' ? "selected" : "" }}>
                                                درصد
                                            </option>
                                            <option value="fixed" {{ old('discount_type') == 'fixed' ? "selected" : "" }}>
                                                ثابت
                                            </option>

                                        </select>
                                        @error('discount_type')
                                        <div class="v-error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <fdp label="شروع زمان قیمت ویژه" date-name="special_price_start" current-date="{{ old('special_price_start') }}"></fdp>
                                        @error('special_price_start')
                                        <div class="v-error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <fdp label="پایان زمان قیمت ویژه" date-name="special_price_end" current-date="{{ old('special_price_end') }}"></fdp>
                                        @error('special_price_end')
                                        <div class="v-error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="d-block">قیمت ویژه</label>
                                        <input class="form-control" dir="ltr" name="special_price" value="{{ old('special_price') }}"/>
                                        @error('special_price')
                                        <div class="v-error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="d-block">نوع قیمت ویژه</label>
                                        <select  name="special_price_type" class="form-control">
                                            <option disabled readonly selected>-- انتخاب وضعیت --</option>
                                            <option value="percent" {{ old('special_price_type') == 'percent' ? "selected" : "" }}>
                                                درصد
                                            </option>
                                            <option value="fixed" {{ old('special_price_type') == 'fixed' ? "selected" : "" }}>
                                                ثابت
                                            </option>

                                        </select>
                                        @error('category_id')
                                        <div class="v-error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                            <hr>
                            <ul class="nav nav-pills">
                                @foreach (\App\Helpers\Helper::activeLanguages() ?? [] as $i => $lang)
                                    <li class="nav-item lang-item">
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

                                                <input type="hidden" name="has_lang[{{ $lang->code }}]" value="on">
                                            <div class="col-12 form-group">
                                                <label class="d-block">عنوان</label>
                                                <input class="form-control" name="{{ $lang->code }}[name]" value="{{ old($lang->code . '.name') }}"/>
                                                @error($lang->code . '.name')
                                                <div class="v-error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 form-group">
                                                <label class="d-block">شرح</label>
                                                <input class="form-control" name="{{ $lang->code }}[short_description]" value="{{ old($lang->code . '.short_description') }}"/>
                                                @error($lang->code . '.short_description')
                                                <div class="v-error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 form-group">
                                                <label class="d-block">متن</label>
                                                <textarea id="e-{{  $lang->code  }}-tt" class="c_editor form-control"
                                                          name="{{ $lang->code }}[long_description]">{{ old($lang->code . '.long_description') }}</textarea>
                                                @error($lang->code . '.long_description')
                                                <div class="v-error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 form-group">
                                                <label class="d-block">برچسب ها</label>
                                                <input class="input-tags" name="{{ $lang->code }}[tags]" value="{{ old($lang->code . '.tags') }}"/>
                                                @error($lang->code . '.tags')
                                                <div class="v-error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="tab-pane" id="pictures_tab">
                                    <pic-list :current-list="{{ json_encode(\App\Helpers\Helper::renderPictureArray(old('pictures'))) }}">
                                    </pic-list>
                                </div>
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

        function checkPriceInput(){
            if(document.getElementsByName('price_status')[0].value != 1){
                document.getElementsByName('price')[0].setAttribute('disabled','')
            }
            else {
                if(document.getElementsByName('price')[0].hasAttribute('disabled')) {
                    document.getElementsByName('price')[0].removeAttribute('disabled')
                }
            }
        }
        function checkDiscountInput(){
            if(!document.getElementsByName('discount_status')[0].checked){
                document.getElementById('discount_wrapper').classList.add('d-none')
            }
            else {
                if(document.getElementById('discount_wrapper').classList.contains('d-none')) {
                    document.getElementById('discount_wrapper').classList.remove('d-none')
                }
            }
        }
        checkDiscountInput();
        checkPriceInput();

    </script>
@endsection
