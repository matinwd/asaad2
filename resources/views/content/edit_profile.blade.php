@extends('layouts/contentLayoutMaster')

@section('title', 'ویرایش اطلاعات حساب')

@section('vendor-style')
@endsection
@section('page-style')
@endsection

@section('content')
    <section id="vApp">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('cms.account.update_profile') }}" method="post">
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
                                        <input class="form-control text-center" dir="ltr" name="name" value="{{ old('name',auth()->user()->name) }}"/>
                                        @error('name')
                                        <div class="v-error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="d-block">ایمیل</label>
                                        <input type="email" class="form-control text-center" dir="ltr" name="email" value="{{ old('email',auth()->user()->email) }}"/>
                                        @error('email')
                                        <div class="v-error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary" tabindex="3">بروزرسانی</button>
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
