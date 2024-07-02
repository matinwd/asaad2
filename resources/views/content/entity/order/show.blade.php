@extends('layouts/contentLayoutMaster')

@section('title', 'ثبت سوال متداول جدید')
@php($useTiny = 1)
@section('content')
    <section id="vApp">
        <div class="row">
            <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                                <h4 class="card-title">نام سفارش دهنده: {{$order->name}}</h4>
                                <h6><a href="mailto:{{$order->email}}">{{ $order->email }}</a></h6>
                                <h6>{{ $order->product->name }}</h6>
                                <p class="card-text mb-2 mt-2">
                                    {{ $order->description }}
                                </p>

                                <form action="{{ route('cms.order.change_status',$order) }}" method="post">
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
                                                    <label class="d-block">وضعیت سفارش</label>
                                                    <select  name="status" class="form-control">
                                                        <option disabled readonly selected>-- انتخاب وضعیت --</option>
                                                        @foreach($order->statuses ?? [] as $key=>$status)
                                                            <option value="{{$key}}" {{ old('status',$order->status) == $key ? "selected" : "" }}>
                                                                {{$status}}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                    @error('status')
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
                            <hr>
                            <form action="{{ route('cms.order.change_status',$order) }}" method="post">
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
                                            <div class="form-group col-md-12">
                                                <label class="d-block">عنوان ایمیل</label>
                                                <input value="{{ $order->email }}" type="text" class="form-control" name="title">
                                                @error('title')
                                                <div class="v-error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="d-block">متن ایمیل</label>
                                                <textarea type="text" class="form-control c_editor" name="message"></textarea>
                                                @error('message')
                                                <div class="v-error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">ارسال ایمیل</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

            </div>
        </div>
    </section>
@endsection


@section('vendor-script')
    @includeIf('panels.rich_editor_assets')
@endsection

@php($useTiny = 1)


@section('page-script')
    <script>
        $(document).ready(function () {
        })
    </script>
@endsection
