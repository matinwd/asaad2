<?php
$form = \App\Models\Form::query()->find($data['form_id'] ?? 0);
$content = $form->content;
foreach ($content as $index => $item) {
    if ($item['fieldType'] == 'TextInput' && !isset($content[$index]['isInputMask'])) {
        $content[$index]['isInputMask'] = false;
        $content[$index]['inputMask'] = '';
    }
}
$form->content = $content;
$form->save();
?>

@if($form instanceof \App\Models\Form)
    <style>
        .custom-file-label {
            border-radius: 0 !important;
            border: 6px solid #f5f5f5 !important;
            padding-bottom: 1.7rem !important;
        }

        .custom-file:hover .custom-file-label {
            border: 6px solid #c8c8c8 !important;
        }

        .custom-file-label:after {
            right: unset !important;
            left: 0 !important;
            border: unset !important;
        }

        .help-block.with-errors {
            font-size: .75rem;
            line-height: 1rem;
            margin: .5rem;
        }

        .form-main . {
            border: 6px solid #f5f5f5 !important;
        }

        .form-main .:hover {
            border: 6px solid #c8c8c8 !important;
        }

        label {
            margin-top: .5rem;
        }
    </style>
    <section id="app"
             class="mt-120 col-lg-{{ $data['col_lg'] ?? '12' }} col-md-{{ $data['col_md'] ?? '12' }} col-sm-{{ $data['col_sm'] ?? '12' }}">
        <div class="form-wrapper">
            @if((isset($data['title']) &&  trim($data['title'])) || (isset($data['details']) &&  trim($data['details'])))
                <div class="row text-center">
                    <div class="col-lg-12 col-md-12 m{{ $mpLeft }}-auto m{{ $mpRight }}-auto">
                        <div class="form-title2">
                            @if(isset($data['title']) &&  trim($data['title']))
                                <h3>{{ $data['title'] ?? null }}</h3>
                            @endif
                        </div>
                        @if(isset($data['details']) &&  trim($data['details']))
                            <div class="para"><p class="mb-0">{{ $data['details'] ?? null }}</p></div>
                        @endif
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-8 m-auto">
                    <div class="form-main">
                        <form method="post" action="{{ route('form.submit',$form->slug) }}" class="frm"
                              enctype="multipart/form-data">
                            @csrf
                            {!! RecaptchaV3::field('fb') !!}
                            @error('g-recaptcha-response')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="messages"></div>
                            @foreach ($form->content as $fIndex => $item)
                                @php($isProvince = $item['fieldType'] == 'ProvinceCity')
                                @php($cityElementId = uniqid('city_'))
                                <div class="">
                                    @isset($item['label'])
                                        @if($item['isRequired'])
                                            <span class="text-danger px-1">*</span>
                                        @endif
                                        <label for="form_{{ $fIndex }}_{{ str_slug($item['name']) }}">{{ $item['label'] }}</label>
                                    @endisset
                                    @if($item['fieldType'] == 'TextInput')
                                        <div class="form-inner">
                                            <input id="form_{{ $fIndex }}_{{ str_slug($item['name']) }}" type="text"
                                                   value="{{ old($item['name']) }}" name="{{ $item['name'] }}"
                                                   class=""
                                                   placeholder="{{ $item['isPlaceholderVisible'] ? $item['placeholder'] : '' }}"
                                                   {{ $item['isRequired'] ? 'required' : '' }}
                                                   {{ $item['isInputMask'] ? "mask={$item['inputMask']} dir=ltr" : '' }}
                                                   data-error="پر کردن این قسمت اجباری میباشد">
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    @elseif($item['fieldType'] == 'FileUploader')
                                        <div class="custom-file">
                                            <input data-error="پر کردن این قسمت اجباری میباشد"
                                                   {{ $item['isRequired'] ? 'required' : '' }} type="file"
                                                   class="custom-file-input" name="{{ $item['name'] }}"
                                                   id="form_{{ $fIndex }}_{{ str_slug($item['name']) }}">
                                            <label class="custom-file-label"
                                                   for="form_{{ $fIndex }}_{{ str_slug($item['name']) }}">انتخاب فایل
                                                برای بارگزاری</label>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    @elseif($item['fieldType'] == 'DatePicker')
                                        <input type="text" class="" name="{{ $item['name'] }}"
                                               {{ $item['isRequired'] ? 'required' : '' }}
                                               v-model="date_{{ $fIndex}}"
                                               id="form_{{ $fIndex }}_{{ str_slug($item['name']) }}"
                                               data-error="پر کردن این قسمت اجباری میباشد"
                                               placeholder="روز / ماه / سال"/>
                                        <div class="help-block with-errors"></div>
                                        <date-picker
                                                v-model="date_{{ $fIndex}}"
                                                format="jYYYY/jMM/jDD"
                                                element="form_{{ $fIndex }}_{{ str_slug($item['name']) }}"
                                        />
                                    @elseif($item['fieldType'] == 'LongTextInput')
                                        <textarea id="form_{{ $fIndex }}_{{ str_slug($item['name']) }}"
                                                  name="{{ $item['name'] }}" class=""
                                                  placeholder="{{ $item['isPlaceholderVisible'] ? $item['placeholder'] : '' }}"
                                                  {{ $item['isRequired'] ? 'required' : '' }}
                                                  data-error="پر کردن این قسمت اجباری میباشد">{!! old($item['name']) !!}</textarea>
                                        <div class="help-block with-errors"></div>
                                    @elseif($item['fieldType'] == 'SelectList')
                                        <select id="form_{{ $fIndex }}_{{ str_slug($item['name']) }}"
                                                name="{{ $item['name'] }}"
                                                class=" custom-control custom-select"
                                                {{ $item['isRequired'] ? 'required' : '' }}
                                                data-error="پر کردن این قسمت اجباری میباشد">
                                            <option disabled readonly selected>-- انتخاب کنید --</option>
                                            @foreach ($item['options'] ?? [] as $option)
                                                <option {{ old($item['name']) == $option['optionValue'] ? 'selected' : '' }} value="{{ $option['optionValue'] }}">{{ $option['optionValue'] }}</option>
                                            @endforeach
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    @elseif($item['fieldType'] == 'ProvinceCity')
                                        <select id="form_{{ $fIndex }}_{{ str_slug($item['name']) }}"
                                                name="{{ $item['name'] }}"
                                                data-city-id="{{ $cityElementId }}"
                                                class=" custom-control custom-select province-el"
                                                {{ $item['isRequired'] ? 'required' : '' }}
                                                data-error="پر کردن این قسمت اجباری میباشد">
                                            <option disabled readonly selected>-- انتخاب کنید --</option>
                                            @foreach (getProvinces() ?? [] as $option)
                                                <option {{ old($item['name']) == $option['name'] ? 'selected' : '' }} data-id="{{ $option['id'] }}"
                                                        value="{{ $option['name'] }}">{{ $option['name'] }}</option>
                                            @endforeach
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    @elseif($item['fieldType'] == 'RadioButton')
                                        <div class="row">
                                            @foreach ($item['options'] ?? [] as $oIndex => $option)
                                                <div class="custom-control custom-radio {{ count($item['options']) != 1 ? 'col-md-4 col-sm-6' : 'col-12' }}">
                                                    <input type="radio" class="custom-control-input"
                                                           id="form_{{ $fIndex }}_{{ str_slug($item['name']) }}_r_option_{{ $oIndex }}"
                                                           name="{{ $item['name'] }}"
                                                           data-error="انتخاب یکی از موارد بالا اجباری میباشد"
                                                           {{ $item['isRequired'] ? 'required' : '' }}
                                                           value="{{ $option['optionValue'] }}" {{ old($item['name']) == $option['optionValue'] ? 'checked' : '' }} >
                                                    <label class="custom-control-label"
                                                           for="form_{{ $fIndex }}_{{ str_slug($item['name']) }}_r_option_{{ $oIndex }}">{{ $option['optionValue'] }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    @elseif($item['fieldType'] == 'Checkbox')
                                        <div class="row">
                                            @foreach ($item['options'] ?? [] as $oIndex => $option)
                                                <div class="custom-control custom-checkbox {{ count($item['options']) != 1 ? 'col-md-4 col-sm-6' : 'col-12' }}">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="form_{{ $fIndex }}_{{ str_slug($item['name']) }}_c_option_{{ $oIndex }}"
                                                           name="{{ $item['name'] }}[]"
                                                           data-error="انتخاب حداقل یکی از موارد بالا اجباری میباشد"
                                                           {{ $item['isRequired'] ? 'required' : '' }}
                                                           value="{{ $option['optionValue'] }}" {{ old($item['name']) == $option['optionValue'] ? 'checked' : '' }}>
                                                    <label class="custom-control-label"
                                                           for="form_{{ $fIndex }}_{{ str_slug($item['name']) }}_c_option_{{ $oIndex }}">
                                                        {{ $option['optionValue'] }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    @elseif($item['fieldType'] == 'Button')
                                        <button class="eg-btn btn--primary btn--md form--btn" type="submit" value="fb">
                                            <span>{{ $item['buttonText'] }}</span>
                                        </button>
                                    @endif
                                </div>
                                @if($isProvince)
                                    <div class="form-group">
                                        @isset($item['label'])
                                            @if($item['isRequired'])
                                                <span class="text-danger px-1">*</span>
                                            @endif
                                            <label for="{{ $cityElementId }}">شهر</label>
                                        @endisset
                                        <select id="{{ $cityElementId }}"
                                                name="city__{{ $item['name'] }}"
                                                class=" custom-control custom-select"
                                                {{ $item['isRequired'] ? 'required' : '' }}
                                                data-error="پر کردن این قسمت اجباری میباشد">
                                            <option disabled readonly selected>-- انتخاب کنید --</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                @endif
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('end_scripts')
        <script src="https://unpkg.com/imask"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue"></script>
        <script src="https://cdn.jsdelivr.net/npm/moment"></script>
        <script src="https://cdn.jsdelivr.net/npm/moment-jalaali@0.7.4/build/moment-jalaali.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue-persian-datetime-picker/dist/vue-persian-datetime-picker-browser.js"></script>
        <script>
            var app = new Vue({
                el: '#app',
                data: {
                    @foreach ($form->content as $fIndex => $item)
                    date_{{ $fIndex}}: "{{ old($item['name']) }}",
                    @endforeach
                },
                components: {
                    DatePicker: VuePersianDatetimePicker
                }
            });
        </script>
        <script>
            $(document).ready(function () {
                $('[mask]').each(function (index, element) {
                    console.debug(element);
                    var mask = IMask(element, {
                        mask: element.getAttribute('mask'),
                        lazy: element.placeholder ? true : false,
                        placeholderChar: '_',
                    });
                });
            });
        </script>
    @endpush
@endif