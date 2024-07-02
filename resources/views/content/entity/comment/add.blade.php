@extends('layouts/contentLayoutMaster')

@section('title', 'ثبت کامنت جدید')

@section('content')
    <section id="vApp">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('cms.comments.store') }}" method="post">
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
                                        <label class="d-block">نام کاربر</label>
                                        <input class="form-control" name="name" value="{{ old('name') }}"/>
                                        @error('name')
                                        <div class="v-error">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label class="d-block">وضعیت</label>
                                        <select name="visibility" class="form-control">
                                            <option disabled readonly selected>-- انتخاب وضعیت --</option>
                                            <option value="0" {{ old('visibility') == '0' ? "selected" : "" }}>
                                                غیر قابل نمایش
                                            </option>
                                            <option value="1" {{ old('visibility') == '1' ? "selected" : "" }}>
                                                انتشار
                                            </option>
                                        </select>
                                        @error('visibility')
                                        <div class="v-error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="d-block">توضیحات کامنت</label>
                                        <textarea class="form-control" name="description"></textarea>
                                        @error('description')
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
