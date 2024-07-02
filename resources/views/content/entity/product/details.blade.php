@extends('layouts/detachedLayoutMaster')

@section('title', $post->title)

@section('page-style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/base/pages/page-blog.css') }}" />
@endsection

@section('content')
<div class="blog-detail-wrapper">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <img src="{{ $post->banner }}" class="img-fluid card-img-top" alt="تصویر" />
        <div class="card-body">
          <h4 class="card-title">{{ $post->title }}</h4>
          <h6>{{ $post->details }}</h6>
          <div class="my-1 py-25">
            @foreach (explode(',',$post->tags) ?? [] as $tag)
              <a href="javascript:void(0);">
                <div class="badge badge-pill badge-light-info mr-50">{{ $tag }}</div>
              </a>
            @endforeach
          </div>
          <p class="card-text mb-2 mt-2">
            {!! $post->text !!}
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
