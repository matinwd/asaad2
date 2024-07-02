@extends('layouts/contentLayoutMaster')

@section('title', 'فهرست منو ها')

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
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($items ?? [] as $i => $item)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a class="btn btn-primary"
                                           href="{{ route('cms.menus.edit',$item) }}">
                                            <i data-feather="sliders" class="mr-50"></i>
                                            <span>پیکربندی</span>
                                        </a>
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
