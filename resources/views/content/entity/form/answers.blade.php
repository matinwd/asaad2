@extends('layouts/contentLayoutMaster')

@section('title', 'لیست پاسخ ها')

@section('vendor-style')
@endsection
@section('page-style')
@endsection

@section('content')
    <section id="vApp">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('cms.forms.export_excel',$form) }}" class="btn btn-success">خروجی اکسل</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover table-center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اطلاعات</th>
                                <th>IP</th>
                                <th>دستگاه</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($items as $i => $answer)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>
                                        @if(count($inputs) != 0)
                                        @php($fKey = array_keys($form->answers[0]->data)[0])
                                        <strong>{{ $inputs[$fKey] }} : </strong>
                                        <span>{{ $answer->data[$fKey] }}</span>
                                        @endif
                                        @if(count($inputs) > 1)
                                            <br>
                                            ...
                                            <br>
                                            <form-data :form-data="{{ json_encode($answer->data) }}"
                                                       :inputs="{{ json_encode($inputs) }}" :files="{{ json_encode($answer->files) }}"></form-data>
                                        @endif
                                    </td>
                                    <td>{{ $answer->ip }}</td>
                                    <td>{{ $answer->user_agent }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow"
                                                    data-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0)"
                                                   onclick="$('#frm-delete-{{ $answer->id }}').submit()">
                                                    <i data-feather="trash" class="mr-50"></i>
                                                    <span>حذف</span>
                                                </a>
                                                <form id="frm-delete-{{ $answer->id }}"
                                                      class="d-none frm-delete-{{ $answer->id }}"
                                                      action="{{ route('cms.forms.delete_answer',$answer->id) }}"
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