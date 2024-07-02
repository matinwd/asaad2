@extends('layouts/fullLayoutMaster')

@section('title', 'ورود به پیشخوان مدیریت')

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-auth.css')) }}">
@endsection

@section('content')
    <section class="d-none" id="vApp"></section>
    <div class="auth-wrapper auth-v1 px-2">
        <div class="auth-inner py-2">
            <!-- Login v1 -->
            <div class="card mb-0">
                <div class="card-body">
                    <a href="javascript:void(0);" class="brand-logo">
                        <img src="{{ \App\Helpers\Helper::Setting('logo_dark')->val }}" alt="logo" width="300">
                    </a>

                    <h4 class="card-title mb-1">ورود به پیشخوان مدیریت</h4>
                    <form class="auth-login-form mt-2" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="login-email" class="form-label">ایمیل</label>
                            <input dir="ltr" type="text" class="form-control text-center @error('email') is-invalid @enderror"
                                   id="login-email" name="email" placeholder="mail@example.com"
                                   tabindex="1" autofocus value="{{ old('email') }}"/>
                            @error('email')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="d-flex justify-content-between">
                                <label for="login-password">رمز عبور</label>
                            </div>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input dir="ltr" type="password" class="form-control form-control-merge text-center" id="login-password"
                                       name="password" tabindex="2"
                                       placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"/>
                                <div class="input-group-append">
                                    <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                </div>
                            </div>
                            @error('password')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror

                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="remember-me" name="remember-me"
                                       tabindex="3" {{ old('remember-me') ? 'checked' : '' }} />
                                <label class="custom-control-label" for="remember-me"> مرا به خاطر بسپار </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" tabindex="4">ورود</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
