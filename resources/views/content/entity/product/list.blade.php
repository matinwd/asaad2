@extends('layouts/contentLayoutMaster')

@section('title', 'فهرست محصولات')

@section('vendor-style')
@endsection
@section('page-style')
@endsection

@section('content')
    <section id="vApp">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-hover table-center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>slug</th>
                                <th>عنوان</th>
                                <th>دسته بندی</th>
                                <th>تاریخ</th>
                                <th>وضعیت</th>
                                <th>تعداد سفارش</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($items ?? [] as $i => $item)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $item->slug }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->category?->title }}</td>
                                    <td>{{ verta($item->date)->format('Y/m/d') }}</td>
                                    <td>
                                        @if($item->status == "0")
                                            <span class="badge badge-pill badge-light-warning">پیشنویس</span>
                                        @else
                                            <span class="badge badge-pill badge-light-success">منتشر شده</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->orders()->count() }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow"
                                                    data-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                   href="{{ route('cms.products.edit',$item) }}">
                                                    <i data-feather="edit-2" class="mr-50"></i>
                                                    <span>ویرایش</span>
                                                </a>
                                                <a class="dropdown-item" href="javascript:void(0)"
                                                   onclick="$('#frm-delete-{{ $item->id }}').submit()">
                                                    <i data-feather="trash" class="mr-50"></i>
                                                    <span>حذف</span>
                                                </a>
                                                <form id="frm-delete-{{ $item->id }}" class="d-none frm-delete-{{ $item->id }}"
                                                      action="{{ route('cms.products.destroy',$item) }}"
                                                      method="post">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100">موردی یافت نشد/موردی ثبت نشده است!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if($items->lastPage() > 1)
                        <div class="card-footer text-center">
                            {{ $items->render() }}
                        </div>
                    @endif
                </div>
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
