@extends('layouts/contentLayoutMaster')

@section('title', 'ارسال اعلانات / پیامک')

@section('page-style')
@stop

@section('content')
    <div id="vApp">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <el-alert class="mb-1"
                                  type="info"
                                  show-icon>
                            <div slot="title">
                                پر کردن فیلد هایی که با ستاره قرمز
                                <span class="text-danger">*</span>
                                مشخص شده اند الزامی است
                            </div>
                        </el-alert>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>
                                    <i class="text-danger">*</i>
                                    نوع
                                </label>
                                <el-radio-group class="w-100" dir="ltr" v-model="entity.type">
                                    <el-radio-button label="email">ایمیل</el-radio-button>
                                    <el-radio-button label="sms">پیامک / sms</el-radio-button>
{{--                                    <el-radio-button label="notify">اعلانات داخلی / notify</el-radio-button>--}}
                                </el-radio-group>
                                <div class="validation-message v-error" v-text="error('type')"></div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>
                                    <i class="text-danger">*</i>
                                    ارسال شود برای
                                </label>
                                <el-radio-group class="w-100" dir="ltr" v-model="entity.send_type">
                                    <el-radio-button :label="2">کاربر خاص (یک کاربر)</el-radio-button>
{{--                                    <el-radio-button :label="1">کاربران خاص / Filter</el-radio-button>--}}
{{--                                    <el-radio-button :label="0">کل کاربران</el-radio-button>--}}
                                </el-radio-group>
                                <div class="validation-message v-error" v-text="error('send_type')"></div>
                            </div>
                        </div>
                        <div class="row" v-if="entity.send_type == 1">
                            <div class="col-md-6 form-group">
                                <label>
                                    <i class="text-danger">*</i>
                                    شهر ها
                                </label>
                                <el-select dir="ltr" class="w-100"
                                           clearable
                                           v-model="entity.filter.cities_ids" multiple filterable
                                           placeholder="-- همه شهر ها --">
                                    <el-option key="esf" label="اصفهان" value="1"></el-option>
                                    <el-option key="teh" label="تهران" value="2"></el-option>
                                    <el-option key="msd" label="مشهد" value="3"></el-option>
                                    <el-option key="tbz" label="تبریز" value="4"></el-option>
                                    <el-option key="shrz" label="شیراز" value="5"></el-option>
                                </el-select>
                                <div class="validation-message v-error" v-text="error('filter_cities_ids')"></div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>
                                    <i class="text-danger">*</i>
                                    جنسیت
                                </label>
                                <el-radio-group class="w-100" dir="ltr" v-model="entity.filter.gender">
                                    <el-radio-button :label="-1">نامشخص</el-radio-button>
                                    <el-radio-button :label="2">خانم</el-radio-button>
                                    <el-radio-button :label="1">آقا</el-radio-button>
                                    <el-radio-button label="all">همه</el-radio-button>
                                </el-radio-group>
                                <div class="validation-message v-error" v-text="error('filter_send_type')"></div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>
                                    <i class="text-danger">*</i>
                                    وضعیت آگهی ها
                                </label>
                                <el-radio-group class="w-100" dir="ltr" v-model="entity.filter.has_order">
                                    <el-radio-button :label="0">بدون آگهی</el-radio-button>
                                    <el-radio-button :label="1">دارای حداقل یک آگهی</el-radio-button>
                                    <el-radio-button label="all">همه</el-radio-button>
                                </el-radio-group>
                                <div class="validation-message v-error" v-text="error('filter_has_order')"></div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-6 form-group">
                                <label>
                                    <i class="text-danger">*</i>
                                    شماره تلفن یا ایمیل کاربر
                                </label>
                                <el-input dir="auto" v-model="entity.user_key" clearable></el-input>
                                <div class="validation-message v-error" v-text="error('user_key')"></div>
                            </div>
                        </div>
                        <hr>
                        {{-- title --}}
                        <div class="row" v-if="entity.type != 'sms'">
                            <div class="col-md-6 form-group">
                                <label>
                                    عنوان
                                </label>
                                <el-input dir="auto" v-model="entity.title" clearable></el-input>
                                <div class="validation-message v-error" v-text="error('title')"></div>
                            </div>
                        </div>
                        {{-- message --}}
                        <div class="row">
                            <div class="col-12 form-group">
                                <label>
                                    <i class="text-danger">*</i>
                                    متن پیام
                                </label>
                                <textarea class="c_editor form-control"
                                          v-model="entity.message" type="textarea" id="" cols="30" rows="10"></textarea>
                                <div class="validation-message v-error" v-text="error('message')"></div>
                            </div>
                        </div>

                        {{-- || only sms || --}}
                        <div v-if="entity.type == 'sms'">
                            {{-- sms_pattern --}}
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>
                                        <i class="text-danger">*</i>
                                        کد الگو در سامانه پیامکی
                                    </label>
                                    <el-input dir="auto" v-model="entity.sms_pattern" clearable></el-input>
                                    <div class="validation-message v-error" v-text="error('sms_pattern')"></div>
                                </div>
                            </div>
                            {{-- pattern_params --}}
                            <div class="row">
                                <div class="col-12">
                                    <label>
                                        <i class="text-danger">*</i>
                                        پارامتر های الگو
                                    </label>
                                    <table class="table table-striped table-hover table-borderless" aria-label="a"
                                           aria-describedby="d">
                                        <thead>
                                        <tr>
                                            <th>کلید</th>
                                            <th>مقدار</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(item,index) in entity.pattern_params">
                                            <td>
                                                <el-input dir="auto" v-model="item.key" clearable></el-input>
                                            </td>
                                            <td>
                                                <el-input dir="auto" v-model="item.value" clearable></el-input>
                                            </td>
                                            <td>
                                                <button :disabled="entity.pattern_params.length == 1"
                                                        @click="deleteItemFromPatternParams(index)"
                                                        class="btn btn-secondary" type="button">
                                                    <i class="feather icon-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="text-center mt-2">
                                        <button @click="addNewItemToPatternParams" class="btn btn-success" type="button">
                                            <i class="feather icon-plus"></i>
                                            افزودن پارامتر جدید
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                            {{-- has_action --}}
                           {{-- <div class="row">
                                <div class="col-md-2 form-group">
                                    <label>
                                        <i class="text-danger">*</i>
                                        اعلان ارسالی لینک دارد؟
                                    </label>
                                    <el-radio-group class="w-100" dir="ltr" v-model="has_action">
                                        <el-radio-button :label="0">خیر</el-radio-button>
                                        <el-radio-button :label="1">بله</el-radio-button>
                                    </el-radio-group>
                                    <div class="validation-message v-error" v-text="error('has_action')"></div>
                                </div>
                                <div v-if="has_action == 1" class="col-md-6 form-group">
                                    <label>
                                        <i class="text-danger">*</i>
                                        لینک
                                    </label>
                                    <el-input dir="ltr" v-model="entity.url" clearable
                                              placeholder="https://example.com/foo-bar"></el-input>
                                    <div class="validation-message v-error" v-text="error('url')"></div>
                                </div>
                                <div v-if="has_action == 1" class="col-md-4 form-group">
                                    <label>
                                        <i class="text-danger">*</i>
                                        عنوان لینک
                                    </label>
                                    <el-input dir="auto" v-model="entity.action_title" clearable></el-input>
                                    <div class="validation-message v-error" v-text="error('action_title')"></div>
                                </div>
                            </div>--}}
                            {{-- has_image --}}
                            <div class="row">
                                <div class="col-md-2 form-group">
                                    <label>
                                        <i class="text-danger">*</i>
                                        اعلان ارسالی فایل پیوست دارد؟
                                    </label>
                                    <el-radio-group class="w-100" dir="ltr" v-model="has_image">
                                        <el-radio-button :label="0">خیر</el-radio-button>
                                        <el-radio-button :label="1">بله</el-radio-button>
                                    </el-radio-group>
                                    <div class="validation-message v-error" v-text="error('has_image')"></div>
                                </div>
                            </div>
                            <div class="row" v-if="has_image == 1">
                                <div class="col-md-10 form-group">
                                    <label>
                                        <i class="text-danger">*</i>
                                        تصویر
                                    </label>

                                    <div class="validation-message v-error" v-text="error('image')"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <el-button type="primary" round :loading="submitingForm" @click="submitForm">تایید</el-button>
                        <el-button round>
                            <a href="./">منصرف شدم</a>
                        </el-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('vendor-scripts')
    @includeIf('panels.rich_editor_assets')
@endsection

@php($useTiny = true)


@section('page-script-vue')
    <script>
        mixins.push({
            data() {
                return {
                    submitingForm: false,
                    has_action: 0,
                    has_image: 0,
                    entity: {
                        type: 'email', // notify || sms || email
                        send_type: 2, // 0:all 1:filter 2:specific
                        filter: {
                            cities_ids: [],
                            gender: 'all', // 1:men 2:women -1:unknown
                            has_order: 'all', // 1:true 0:false
                        },
                        user_key: null,
                        title: null,
                        message: null,
                        image: null,
                        file: null,
                        url: null,
                        users: [],
                        action_title: null,
                        // if sms
                        sms_pattern: null,
                        pattern_params: [],
                        // todo | add icon + add icon_color
                    },
                }
            },
            methods: {
                deleteItem(list, index) {
                    list.splice(index, 1);
                },
                deleteItemFromPatternParams(index) {
                    this.deleteItem(this.entity.pattern_params, index);
                },
                addNewItemToPatternParams() {
                    this.entity.pattern_params.push({
                        key: null,
                        value: null
                    });
                },
                submitForm() {
                    this.submitingForm = true;
                    this.emptyValidator();

                    axios.post(`${location.pathname}`, this.entity)
                        .then(response => {
                            this.$message.success({
                                center: true,
                                message: "پیام شما با موفقیت ثبت و ارسال خواهد شد",
                            });
                            /*setTimeout(function () {
                                window.redirect(`./`);
                            }, 1500);*/
                        })
                        .catch(error => {
                            if (error.response.status && error.response.status === 422) {
                                this.handleValidation(error, "{{ trans('actions.validate_fail') }}");
                            } else {
                                this.$message.error({
                                    center: true,
                                    message: "{{ trans('ارسال با شکست مواجه شد') }}",
                                });
                            }
                        })
                        .finally(_ => {
                            this.submitingForm = false;
                        });
                }
            },
            created() {
                let urlParams = new URLSearchParams(window.location.search);

                if(urlParams.get('user_key'))
                    this.entity.user_key = urlParams.get('user_key')


                this.addNewItemToPatternParams();
                this.addNewItemToPatternParams();
                this.addNewItemToPatternParams();
            }
        });
    </script>
@endsection