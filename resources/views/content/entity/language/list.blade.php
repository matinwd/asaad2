@extends('layouts/contentLayoutMaster')

@section('title', 'فهرست زبان ها')

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
                                <th>نام</th>
                                <th>کد/نشان</th>
                                <th>چینش</th>
                                <th>وضعیت</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($items as $i => $item)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <i class="flag-icon flag-icon-{{ $item->flag }}"></i>
                                        {{ $item->code }}
                                    </td>
                                    <td>
                                        @if($item->direction == 'rtl')
                                            <span class="badge badge-pill badge-light-info">راست چین - RTL</span>
                                        @else
                                            <span class="badge badge-pill badge-light-info">چپ چین - LTR</span>
                                        @endif
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
                                                   href="{{ route('cms.languages.edit',$item) }}">
                                                    <i data-feather="edit-2" class="mr-50"></i>
                                                    <span>ویرایش</span>
                                                </a>
                                                <a class="dropdown-item" href="javascript:void(0)"
                                                   onclick="$('#frm-delete-{{ $item->id }}').submit()">
                                                    <i data-feather="trash" class="mr-50"></i>
                                                    <span>حذف</span>
                                                </a>
                                                <form id="frm-delete-{{ $item->id }}" class="d-none frm-delete-{{ $item->id }}"
                                                      action="{{ route('cms.languages.destroy',$item) }}"
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
