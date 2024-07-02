@extends('layouts/contentLayoutMaster')

@section('title', 'ویرایش منو')

@section('vendor-style')
@endsection
@section('page-style')
@endsection

@section('content')
    <section id="vApp">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('cms.menus.update',$menu) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills">
                                @foreach (\App\Helpers\Helper::activeLanguages() ?? [] as $i => $lang)
                                    <li class="nav-item">
                                        <a class="nav-link {{ $i == 0 ? "active" : "" }}"
                                           id="{{ $lang->code }}-lang-tab" data-toggle="pill"
                                           href="#{{ $lang->code }}_lang">
                                            <i class="flag-icon flag-icon-{{ $lang->flag }}"></i>
                                            {{ $lang->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="tab-content">
                                @foreach (\App\Helpers\Helper::activeLanguages() ?? [] as $i => $lang)
                                    <div class="tab-pane {{ $i == 0 ? "active" : "" }}" id="{{ $lang->code }}_lang">
                                        <menu-items input-name="{{ $lang->code }}[items]" :current-items="{{ json_encode($menu->translateOrDefault($lang->code)->vue_items ?? []) }}">
                                        </menu-items>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">بروزرسانی</button>
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
