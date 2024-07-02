@extends('layouts/contentLayoutMaster')

@section('title', 'ترجمه کلمات')

@section('vendor-style')
@endsection
@section('page-style')
@endsection

@section('content')
    <section id="vApp">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('cms.localization_post') }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills">
                                @foreach (\App\Helpers\Helper::activeLanguages() as $i => $lang)
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
                            <div class="tab-content pt-2">
                                @foreach (\App\Helpers\Helper::activeLanguages() as $i => $lang)
                                    <div class="tab-pane {{ $i == 0 ? "active" : "" }}" id="{{ $lang->code }}_lang">
                                        @foreach($groups as $g => $group)
                                            <h3>{{ $g }}</h3>
                                            <div class="row">
                                                @foreach($group as $k => $item)
                                                    <div class="col-md-6 col-12 form-group">
                                                        <label class="d-block">{{ $item['key'] }}</label>
                                                        <input class="form-control" name="text[{{ $g }}.{{ $item['key'] }}][{{ $lang->code }}]"
                                                               value="{{ $item->text[$lang->code] ?? null }}"/>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @if($g != 'blog_side_bar')
                                                <hr>
                                            @endif
                                        @endforeach
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
