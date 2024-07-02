@extends('layouts/contentLayoutMaster')

@section('title', 'ویرایش فرم')

@section('content')
    <style>
        .el-checkbox__label,.el-radio__label{
            padding-right : .5rem !important;
            padding-left : unset !important;
        }
        .el-checkbox,.el-radio{
            margin-right: unset !important;
            margin-left: 1rem !important;
        }
        .el-checkbox:last-child,.el-radio:last-child{
            margin-right: unset !important;
            margin-left: 0 !important;
        }
        ul .el-input__inner{
            height: 42px !important;
            line-height: 42px !important;
        }
        .el-form-item__content ul{
            list-style: none !important;
        }
    </style>
    <section id="vApp">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('cms.forms.update',$form) }}" method="post">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="id" value="{{ $form->id }}">
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
                                    <input class="form-control" name="name" value="{{ old('name',$form->name) }}"/>
                                    @error('name')
                                    <div class="v-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="d-block">Slug</label>
                                    <input dir="ltr" class="form-control" name="slug" value="{{ old('slug',$form->slug) }}"/>
                                    @error('slug')
                                    <div class="v-error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <form-builder dir="rtl"
                                                  :current-form-items="{{ json_encode($form->content)  }}">
                                    </form-builder>
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

@section('page-script')
    <script>
        $(document).ready(function () {
        })
    </script>
@endsection
