@extends('layouts/detachedLayoutMaster')

@section('title', "جزئیات درخواست")

@section('page-style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/base/pages/page-blog.css') }}" />
@endsection

@section('content')
<div class="blog-detail-wrapper">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">{{ $contactRequest->subject }}</h4>
          <h6><a href="mailto:{{ $contactRequest->email }}">{{ $contactRequest->email }}</a></h6>
          <p class="card-text mb-2 mt-2">
            {{ $contactRequest->message }}
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
