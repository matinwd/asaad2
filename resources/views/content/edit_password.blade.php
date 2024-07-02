@extends('layouts/contentLayoutMaster')

@section('title', 'ویرایش کلمه عبور')

@section('vendor-style')
@endsection
@section('page-style')
@endsection

@section('content')
    <section id="vApp">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('cms.account.update_password') }}" method="post">
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
                                        <label class="d-block">کلمه عبور فعلی</label>
                                        <input type="password" class="form-control text-center" dir="ltr" name="old_password"/>
                                        @error('old_password')
                                        <div class="v-error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="d-block">کلمه عبور جدید</label>
                                        <input type="password" class="form-control text-center" dir="ltr" name="password"/>
                                        @error('password')
                                        <div class="v-error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="d-block">تایید کلمه عبور جدید</label>
                                        <input type="password" class="form-control text-center" dir="ltr" name="password_confirmation"/>
                                        @error('password_confirmation')
                                        <div class="v-error">{{ $message }}</div>
                                        @enderror
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
@endsection

@section('page-script')
    <script>
        $(document).ready(function () {
        });
    </script>
@endsection
