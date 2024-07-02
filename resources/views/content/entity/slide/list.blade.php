@extends('layouts/contentLayoutMaster')

@section('title', 'فهرست اسلاید ها')

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
                                <th>عنوان</th>
                                <th>اولویت بندی</th>
                                <th>تصویر</th>
                                <th>پیوند</th>
                                <th>وضعیت</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($items ?? [] as $i => $item)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->position }}</td>
                                    <td>
                                        <img src="{{ $item->image }}" alt="تصویر آلبوم" width="100px">
                                    </td>
                                    <td>
                                        <a target="_blank" href="{{ $item->url }}" class="btn btn-info">نمایش</a>
                                    </td>
                                    <td>
                                        @if($item->active)
                                            <span class="badge badge-pill badge-light-success">فعال</span>
                                        @else
                                            <span class="badge badge-pill badge-light-danger">غیرفعال</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow"
                                                    data-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                   href="{{ route('cms.slides.edit',$item) }}">
                                                    <i data-feather="edit-2" class="mr-50"></i>
                                                    <span>ویرایش</span>
                                                </a>
                                                <a class="dropdown-item" href="javascript:void(0)"
                                                   onclick="$('#frm-delete-{{ $item->id }}').submit()">
                                                    <i data-feather="trash" class="mr-50"></i>
                                                    <span>حذف</span>
                                                </a>
                                                <form id="frm-delete-{{ $item->id }}" class="d-none frm-delete-{{ $item->id }}"
                                                      action="{{ route('cms.slides.destroy',$item) }}"
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
