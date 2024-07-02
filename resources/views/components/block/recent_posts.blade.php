<?php
if (!isset($data['background']))
    $data['background'] = null;
?>
        <div class="recent-news-section pt-120 d-flex justify-content-center">

            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="section-title4">
                    <h2>{{ $data['title'] }}</h2>
                    <p class="mb-0">{{ $data['details'] }}</p>
                </div>
            </div>
        </div>
        <div class="container">
        	<div class="row d-flex p-4 g-4">
            @php($posts = \App\Models\Post::latest()->translatedIn(app()->getLocale())->limit(3)->get())
            @foreach ($posts as $p => $post)

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-10 mb-2">
                <div class="single-blog-style3 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.2s; animation-name: fadeInDown;">
                    <div class="blog-img">
                        <a href="#" class="blog-date"><i class="bi bi-calendar-check"></i>{{ $post->created_at->DiffForHumans() }}</a>
                        <img alt="image" src="{{ $post->banner }}">
                    </div>
                    <div class="blog-content">
                        <h5><a href="{{ route('posts.show',[$post->slug]) }}">{{ $post->title }}
                            </a></h5>
                        <div class="blog-meta">
                            <div class="author">
                                <img alt="image" src="assets/images/blog/author1.png">
                                <a href="{{ route('posts.show',[$post->slug]) }}" class="author-name">{{ trans('actions.admin') }}</a>
                            </div>
                            <div class="comment">
                                <img alt="image" src="{{ asset('assets/images/icons/comment-icon.svg') }}">
                                <a href="#" class="comment">{{$post->comments()->count() . ' ' . trans('blog_side_bar.comments') }}</a>
                            </div>
                        </div>
                        <p class="para">{{ $post->details }}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>  
		</div>