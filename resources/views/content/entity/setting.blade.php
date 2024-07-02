@extends('layouts/contentLayoutMaster')

@section('title', 'تنظیمات')

@section('vendor-style')
@endsection
@section('page-style')
    <style>
        #c-table td, #c-table th, #c-table td input {
            text-align: center !important;
        }

        #c-table td:nth-of-type(3) {
            width: 180px;
        }

        #c-table td:nth-of-type(2) {
            width: 110px;
        }

        #c-table td:nth-of-type(1) {
            width: 250px;
        }
    </style>
@endsection

@section('content')
{{--    <section id="vApp"></section>--}}
    <section id="vApp">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('cms.setting_post') }}" method="post">
                    @csrf
                    @method('patch')
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
                            <div class="tab-content pt-2">
                                @foreach (\App\Helpers\Helper::activeLanguages() as $i => $lang)
                                    <div class="tab-pane {{ $i == 0 ? "active" : "" }}" id="{{ $lang->code }}_lang">
                                        <ul class="nav nav-pills justify-content-center">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="pill"
                                                   href="#footer-{{ $lang->code }}-tab">
                                                    فوتر
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill"
                                                   href="#pic-{{ $lang->code }}-tab">
                                                    تصاویر
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill"
                                                   href="#blog-{{ $lang->code }}-tab">
                                                    اخبار
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill"
                                                   href="#contact-{{ $lang->code }}-tab">
                                                    تماس با ما
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content pt-2">
                                            <div class="tab-pane active" id="footer-{{ $lang->code }}-tab">
                                                <div class="row">
                                                    @php($item = \App\Helpers\Helper::Setting('footer_about_compacy'))
                                                    <div class="col-12 form-group">
                                                        <label class="d-block">{{ $item->label }}</label>
                                                        <textarea rows="1" class="form-control"
                                                                  name="set[{{ $item->key }}][{{ $lang->code }}][value]">{{ $item->translateOrNew($lang->code)->val }}</textarea>
                                                    </div>
                                                    @php($item = \App\Helpers\Helper::Setting('footer_about_compacy_url'))
                                                    <div class="col-12 form-group">
                                                        <label class="d-block">{{ $item->label }}</label>
                                                        <input dir="ltr" class="form-control"
                                                               name="set[{{ $item->key }}][{{ $lang->code }}][value]"
                                                               value="{{ $item->translateOrNew($lang->code)->val }}"/>
                                                    </div>
                                                    @php($item = \App\Helpers\Helper::Setting('footer_office_address'))
                                                    <div class="col-12 form-group">
                                                        <label class="d-block">{{ $item->label }}</label>
                                                        <input class="form-control"
                                                               name="set[{{ $item->key }}][{{ $lang->code }}][value]"
                                                               value="{{ $item->translateOrNew($lang->code)->val }}"/>
                                                    </div>
                                                    @php($item = \App\Helpers\Helper::Setting('footer_phone'))
                                                    <div class="col-12 form-group">
                                                        <label class="d-block">{{ $item->label }}</label>
                                                        <input type="tel" dir="ltr" class="form-control"
                                                               name="set[{{ $item->key }}][{{ $lang->code }}][value]"
                                                               value="{{ $item->translateOrNew($lang->code)->val }}"/>
                                                    </div>
                                                    @php($item = \App\Helpers\Helper::Setting('footer_email'))
                                                    <div class="col-12 form-group">
                                                        <label class="d-block">{{ $item->label }}</label>
                                                        <input type="email" dir="ltr" class="form-control"
                                                               name="set[{{ $item->key }}][{{ $lang->code }}][value]"
                                                               value="{{ $item->translateOrNew($lang->code)->val }}"/>
                                                    </div>
                                                    @php($item = \App\Helpers\Helper::Setting('footer_copyright'))
                                                    <div class="col-12 form-group">
                                                        <label class="d-block">{{ $item->label }}</label>
                                                        <textarea rows="1" class="form-control"
                                                                  name="set[{{ $item->key }}][{{ $lang->code }}][value]">{{ $item->translateOrNew($lang->code)->val }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="pic-{{ $lang->code }}-tab">
                                                <div class="row">
                                                    @php($item = \App\Helpers\Helper::Setting('logo'))
                                                    <div class="col-12 form-group">
                                                        <label class="d-block">{{ $item->label }}</label>
                                                        <pic-single
                                                                input-name="set[{{ $item->key }}][{{ $lang->code }}][value]"
                                                                :current-picture="{{ json_encode(\App\Helpers\Helper::renderPictureArray($item->translateOrNew($lang->code)->val,true)) }}"></pic-single>
                                                    </div>
                                                    @php($item = \App\Helpers\Helper::Setting('logo_dark'))
                                                    <div class="col-12 form-group">
                                                        <label class="d-block">{{ $item->label }}</label>
                                                        <pic-single
                                                                input-name="set[{{ $item->key }}][{{ $lang->code }}][value]"
                                                                :current-picture="{{ json_encode(\App\Helpers\Helper::renderPictureArray($item->translateOrNew($lang->code)->val,true)) }}"></pic-single>
                                                    </div>
                                                    @php($item = \App\Helpers\Helper::Setting('logo_light'))
                                                    <div class="col-12 form-group">
                                                        <label class="d-block">{{ $item->label }}</label>
                                                        <pic-single
                                                                input-name="set[{{ $item->key }}][{{ $lang->code }}][value]"
                                                                :current-picture="{{ json_encode(\App\Helpers\Helper::renderPictureArray($item->translateOrNew($lang->code)->val,true)) }}"></pic-single>
                                                    </div>
                                                    @php($item = \App\Helpers\Helper::Setting('favicon'))
                                                    <div class="col-12 form-group">
                                                        <label class="d-block">{{ $item->label }}</label>
                                                        <pic-single
                                                                input-name="set[{{ $item->key }}][{{ $lang->code }}][value]"
                                                                :current-picture="{{ json_encode(\App\Helpers\Helper::renderPictureArray($item->translateOrNew($lang->code)->val,true)) }}"></pic-single>
                                                    </div>
                                                    @php($item = \App\Helpers\Helper::Setting('page_header_pic'))
                                                    <div class="col-12 form-group">
                                                        <label class="d-block">{{ $item->label }}</label>
                                                        <pic-single
                                                                input-name="set[{{ $item->key }}][{{ $lang->code }}][value]"
                                                                :current-picture="{{ json_encode(\App\Helpers\Helper::renderPictureArray($item->translateOrNew($lang->code)->val,true)) }}"></pic-single>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="contact-{{ $lang->code }}-tab">
                                                <div class="row">
                                                    @php($item = \App\Helpers\Helper::Setting('google_map'))
                                                    <div class="col-12 form-group">
                                                        <label class="d-block">{{ $item->label }}</label>
                                                        <textarea dir="ltr" rows="1" class="form-control"
                                                                  name="set[{{ $item->key }}][{{ $lang->code }}][value]">{{ $item->translateOrNew($lang->code)->val }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    @php($item = \App\Helpers\Helper::Setting('intro_movie'))
                                                    <div class="col-12 form-group">
                                                        <label class="d-block">{{ $item->label }}</label>
                                                        <textarea dir="ltr" rows="1" class="form-control"
                                                                  name="set[{{ $item->key }}][{{ $lang->code }}][value]">{{ $item->translateOrNew($lang->code)->val }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    @php($item = \App\Helpers\Helper::Setting('intro_text'))
                                                    <div class="col-12 form-group">
                                                        <label class="d-block">{{ $item->label }}</label>
                                                        <textarea dir="ltr" rows="1" class="form-control"
                                                                  name="set[{{ $item->key }}][{{ $lang->code }}][value]">{{ $item->translateOrNew($lang->code)->val }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    @php($item = \App\Helpers\Helper::Setting('intro_subtext'))
                                                    <div class="col-12 form-group">
                                                        <label class="d-block">{{ $item->label }}</label>
                                                        <textarea dir="ltr" rows="1" class="form-control"
                                                                  name="set[{{ $item->key }}][{{ $lang->code }}][value]">{{ $item->translateOrNew($lang->code)->val }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    @php($item = \App\Helpers\Helper::Setting('intro_button'))
                                                    <div class="col-12 form-group">
                                                        <label class="d-block">{{ $item->label }}</label>
                                                        <textarea dir="ltr" rows="1" class="form-control"
                                                                  name="set[{{ $item->key }}][{{ $lang->code }}][value]">{{ $item->translateOrNew($lang->code)->val }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    @php($item = \App\Helpers\Helper::Setting('intro_button_url'))
                                                    <div class="col-12 form-group">
                                                        <label class="d-block">{{ $item->label }}</label>
                                                        <textarea dir="ltr" rows="1" class="form-control"
                                                                  name="set[{{ $item->key }}][{{ $lang->code }}][value]">{{ $item->translateOrNew($lang->code)->val }}</textarea>
                                                    </div>
                                                </div>
                                                <hr>
                                                @php($contactItem = \App\Helpers\Helper::Setting('contact_info'))
                                                <div class="table-responsive">
                                                    <table id="c-table" class="table table-bordered table-sm t-center">
                                                        <thead>
                                                        <tr>
                                                            <th>عنوان</th>
                                                            <th>نوع</th>
                                                            <th>آیکون</th>
                                                            <th>مقدار</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr v-for="(item,index) in items_{{ $lang->code }}">
                                                            <td>
                                                                <input class="form-control" v-model="item.title"/>
                                                            </td>
                                                            <td>
                                                                <select v-model="item.type"
                                                                        class="form-control custom-control">
                                                                    <option value="text">متن</option>
                                                                    <option value="tel">تلفن</option>
                                                                    <option value="email">ایمیل</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input class="form-control" v-model="item.icon"/>
                                                            </td>
                                                            <td>
                                                                <input :dir="item.type != 'text' ? 'ltr' : 'rtl'"
                                                                       class="form-control" v-model="item.value"/>
                                                            </td>
                                                            <td>
                                                                <button type="button"
                                                                        class="btn btn-sm btn-danger"
                                                                        @click="deleteItem(items_{{ $lang->code }},index)">
                                                                    <i class="feather icon-trash"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <td colspan="5" class="text-center">
                                                                <button type="button" class="btn btn-success"
                                                                        @click="addNewItem(items_{{ $lang->code }})">
                                                                    ردیف جدید
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                                    <input type="hidden"
                                                           name="set[{{ $contactItem->key }}][{{ $lang->code }}][value]"
                                                           :value="JSON.stringify(items_{{ $lang->code }})">
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="blog-{{ $lang->code }}-tab">
                                                <div class="row">
                                                    @php($item = \App\Helpers\Helper::Setting('tags'))
                                                    <div class="col-12 form-group">
                                                        <label class="d-block">{{ $item->label }}</label>
                                                        <input class="form-control"
                                                               name="set[{{ $item->key }}][{{ $lang->code }}][value]"
                                                               value="{{ $item->translateOrNew($lang->code)->val }}"/>
                                                    </div>
                                                    @php($item = \App\Helpers\Helper::Setting('social_enable'))
                                                    <div class="col-12 form-group">
                                                        <label class="d-block">{{ $item->label }}</label>
                                                        <select name="set[{{ $item->key }}][{{ $lang->code }}][value]"
                                                                class="form-control custom-control">
                                                            <option value="1" {{ $item->translateOrNew($lang->code)->val == 1 ? 'selected' : '' }}>
                                                                فعال
                                                            </option>
                                                            <option value="0" {{ $item->translateOrNew($lang->code)->val == 0 ? 'selected' : '' }}>
                                                                غیر فعال
                                                            </option>
                                                        </select>
                                                    </div>
                                                    @php($item = \App\Helpers\Helper::Setting('social_facebook'))
                                                    <div class="col-md-6 col-12 form-group">
                                                        <label class="d-block">{{ $item->label }}</label>
                                                        <input dir="ltr" class="form-control"
                                                               name="set[{{ $item->key }}][{{ $lang->code }}][value]"
                                                               value="{{ $item->translateOrNew($lang->code)->val }}"/>
                                                    </div>
                                                    @php($item = \App\Helpers\Helper::Setting('social_twitter'))
                                                    <div class="col-md-6 col-12 form-group">
                                                        <label class="d-block">{{ $item->label }}</label>
                                                        <input dir="ltr" class="form-control"
                                                               name="set[{{ $item->key }}][{{ $lang->code }}][value]"
                                                               value="{{ $item->translateOrNew($lang->code)->val }}"/>
                                                    </div>
                                                    @php($item = \App\Helpers\Helper::Setting('social_insta'))
                                                    <div class="col-md-6 col-12 form-group">
                                                        <label class="d-block">{{ $item->label }}</label>
                                                        <input dir="ltr" class="form-control"
                                                               name="set[{{ $item->key }}][{{ $lang->code }}][value]"
                                                               value="{{ $item->translateOrNew($lang->code)->val }}"/>
                                                    </div>
                                                    @php($item = \App\Helpers\Helper::Setting('social_linkdin'))
                                                    <div class="col-md-6 col-12 form-group">
                                                        <label class="d-block">{{ $item->label }}</label>
                                                        <input dir="ltr" class="form-control"
                                                               name="set[{{ $item->key }}][{{ $lang->code }}][value]"
                                                               value="{{ $item->translateOrNew($lang->code)->val }}"/>
                                                    </div>
                                                </div>
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

@section('page-script-vue')
        <script>
        mixins.push({

            data() {
                return {
                    @foreach (\App\Helpers\Helper::activeLanguages() as $i => $lang)
                    items_{{ $lang->code }} : {!! json_encode($contactItem->translateOrNew($lang->code)->value) !!},
                    @endforeach
                }
            },

            methods: {
                addNewItem(list) {
                    list.push({
                        'title': '',
                        'icon': '',
                        'type': '',
                        'value': '',
                    });
                },
                deleteItem(list, index) {
                    list.splice(index, 1);
                },
            },
            created() {
            }
        })




    </script>
@endsection
