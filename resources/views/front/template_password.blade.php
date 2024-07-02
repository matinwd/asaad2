@extends('front.master')

@section('content')
    <section dir="{{ $currentLocale->direction }}" class="page-title o-hidden text-center parallaxie" data-overlay="7"
             data-bg-img="{{ $template->image }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 m{{ $mpLeft }}-auto m{{ $mpRight }}-auto">
                    <h1 class="title mb-0">{{ $template->title }}</h1>
                </div>
            </div>
            <nav aria-label="breadcrumb" class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/"><i class="fas fa-home"></i></a>
                    </li>
                    {{--                        <li class="breadcrumb-item"><a href="#">صفحات</a></li>--}}
                    <li class="breadcrumb-item active">{{ $template->title }}</li>
                </ol>
            </nav>
        </div>
    </section>

    <div class="page-content" style="overflow-x: hidden;" dir="{{ $currentLocale->direction }}">
        <div class="row">
            <div class="col-12">
                <form action="" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 d-none d-md-block"></div>
                                <div class="col-md-6 col-sm-12">
                                    <br>
                                    <h5 class="my-25">جهت مشاهده محتوا صفحه نام کاربری و کلمه عبور وارد کنید : </h5>
                                    <br>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="js-user_name">نام کاربری</label>
                                            <input type="text" class="form-control" name="user_name" id="js-user_name"
                                                   dir="auto">
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="js-password">رمزعبور</label>
                                            <input type="text" class="form-control" name="password" id="js-password" dir="auto">
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-border btn-radius">تایید</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 d-none d-md-block"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
