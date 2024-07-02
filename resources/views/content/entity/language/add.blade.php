@extends('layouts/contentLayoutMaster')

@section('title', 'ثبت زبان جدید')

@section('content')
    <section id="vApp">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('cms.languages.store') }}" method="post">
                    @csrf
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
                                    <input class="form-control" name="name" value="{{ old('name',fakeInput('نام')) }}"/>
                                    @error('name')
                                        <div class="v-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="d-block">کد</label>
                                    <input class="form-control" placeholder="مثلا fa برای زبان فارسی" name="code" value="{{ old('code',fakeInput('in')) }}"/>
                                    @error('code')
                                    <div class="v-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="d-block">نوع چینش</label>
                                    <select name="direction" class="form-control">
                                        <option disabled readonly selected>-- انتخاب نوع چینش --</option>
                                        <option value="rtl" {{ old('direction') == 'rtl' ? "selected" : "" }}>
                                            راست چین
                                        </option>
                                        <option value="ltr" {{ old('direction') == 'ltr' ? "selected" : "" }}>
                                            چپ چین
                                        </option>
                                    </select>
                                    @error('direction')
                                    <div class="v-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="d-block">وضعیت نمایش</label>
                                    <select name="active" class="form-control">
                                        <option disabled readonly selected>-- انتخاب وضعیت --</option>
                                        <option value="1" {{ old('active') == '1' ? "selected" : "" }}>
                                            فعال
                                        </option>
                                        <option value="0" {{ old('active') == '0' ? "selected" : "" }}>
                                            غیرفعال
                                        </option>
                                    </select>
                                    @error('active')
                                    <div class="v-error">{{ $message }}</div>
                                    @enderror
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

@section('page-script')
    <script>
        $(document).ready(function () {
        })
    </script>
@endsection
