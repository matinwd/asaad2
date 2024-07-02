@extends('layouts/contentLayoutMaster')

@section('title', $title)

@section('content')
    <iframe src="/cms/lfm?type={{ $type }}" style="width: 100%; height: 500px; overflow: hidden; border: none;border-radius: .5rem"></iframe>
@endsection