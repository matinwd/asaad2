@extends('layouts/contentLayoutMaster')

@section('title', 'پیشخوان مدیریت')

@section('vendor-style')
@endsection
@section('page-style')
@endsection

@section('content')
    <section id="dashboard-ecommerce">
        <div class="row match-height">
            <div class="col-xl-4 col-md-6 col-12">
                <div class="card card-congratulation-medal">
                    <div class="card-body">
                        <a href="{{ route('cms.posts.create') }}" class="btn btn-primary btn-block">ثبت خبر جدید</a>
                        <a href="{{ route('cms.products.create') }}" class="btn btn-primary btn-block">ثبت محصول جدید</a>
                        <a href="{{ route('cms.templates.create') }}" class="btn btn-primary btn-block">ایجاد صفحه
                            جدید</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-md-6 col-12">
                <div class="card card-statistics">
                    <div class="card-header">
                        <h4 class="card-title">اطلاعات وب‌سایت</h4>
                    </div>
                    <div class="card-body statistics-body">
                        <div class="row">
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <a href="{{ route('cms.posts.index') }}">
                                    <div class="media">
                                        <div class="avatar bg-light-primary mr-2">
                                            <div class="avatar-content">
                                                <i data-feather="file-text" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">{{ $postsCount }}</h4>
                                            <p class="card-text font-small-3 mb-0">خبر</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <a href="{{ route('cms.orders.index') }}">
                                    <div class="media">
                                        <div class="avatar bg-light-warning mr-2">
                                            <div class="avatar-content">
                                                <i data-feather="image" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">{{ $ordersCount }}</h4>
                                            <p class="card-text font-small-3 mb-0">سفارشات</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <a href="{{ route('cms.products.index') }}">
                                    <div class="media">
                                        <div class="avatar bg-light-danger mr-2">
                                            <div class="avatar-content">
                                                <i data-feather="file-text" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">{{ $productsCount }}</h4>
                                            <p class="card-text font-small-3 mb-0">محصولات</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <a href="{{ route('cms.templates.index') }}">
                                    <div class="media">
                                        <div class="avatar bg-light-info mr-2">
                                            <div class="avatar-content">
                                                <i data-feather="file" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">{{ $templatesCount }}</h4>
                                            <p class="card-text font-small-3 mb-0">صفحه</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">آخرین سفارشات</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>نام فرستنده</th>
                                    <th>ایمیل</th>
                                    <th>محصول</th>
                                    <th>تاریخ ثبت</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($orders as $p => $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ verta($item->created_at)->format('l d F Y') }}</td>
                                        <td>
                                            <a href="{{ route('cms.orders.show',$item) }}">
                                                <span class="badge badge-pill badge-light-info">نمایش</span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">اخبار اخیر</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>عنوان</th>
                                    <th>دسته بندی</th>
                                    <th>تاریخ</th>
                                    <th>وضعیت</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($posts as $p => $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->category->title }}</td>
                                        <td>{{ $item->getDisplayDate() }}</td>
                                        <td>
                                            @if($item->status == "draft")
                                                <span class="badge badge-pill badge-light-warning">پیشنویس</span>
                                            @else
                                                <span class="badge badge-pill badge-light-success">منتشر شده</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">آخرین محصولات</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>عنوان</th>
                                    <th>تاریخ</th>
                                    <th>وضعیت</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($products ?? [] as $p => $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->created_at->diffForHumans()}}</td>
                                        <td>
                                            @if($item->status == "draft")
                                                <span class="badge badge-pill badge-light-warning">پیشنویس</span>
                                            @else
                                                <span class="badge badge-pill badge-light-success">منتشر شده</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('vendor-script')
@endsection
@section('page-script')
    {{-- Page js files --}}
    {{--  <script src="{{ asset(mix('js/scripts/pages/dashboard.js')) }}"></script>--}}
@endsection
