@extends('layouts/detachedLayoutMaster')

@section('title', $article->title)

@section('page-style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/base/pages/page-blog.css') }}" />
@endsection

@section('content')
<div class="blog-detail-wrapper">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <img src="{{ $article->banner }}" class="img-fluid card-img-top" alt="تصویر" />
        <div class="card-body">
          <h4 class="card-title">{{ $article->title }}</h4>
          <h6>{{ $article->details }}</h6>
          <p class="card-text mb-2 mt-2">
            {!! $article->text !!}
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
