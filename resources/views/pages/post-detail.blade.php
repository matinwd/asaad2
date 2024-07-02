@extends('pages.master')
@section('content')
 <div class="inner-banner">
  <div class="container">
   <h2 class="inner-banner-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">{{ $post->title }}</h2>
   <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
     <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ trans('breadcrumb_pages.home') }}</a></li>
     <li class="breadcrumb-item"><a href="{{ url('/posts') }}">{{ trans('breadcrumb_pages.posts') }}</a></li>
     <li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
    </ol>
   </nav>
  </div>
 </div>
 <div class="blog-details-section pt-120 pb-120">
  <img alt="image" src="{{ asset('assets/images/bg/section-bg.png') }}" class="img-fluid section-bg-top">
  <img alt="image" src="{{ asset('assets/images/bg/section-bg.png') }}" class="img-fluid section-bg-bottom">
  <div class="container">
   <div class="row gy-5">
    <div class="col-lg-8">
     <div class="blog-details-single">
      <div class="blog-img">
       <img alt="image" src="{{ asset($post->banner) }}" class="img-fluid rounded wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".2s">
      </div>
      <ul class="blog-meta gap-2">
       <li><a href="#"><img alt="image" src="{{ asset('assets/images/icons/calendar.svg') }}">{{ trans('blog_side_bar.date') }}: {{ $post->created_at->format('Y M d') }}</a></li>
{{--       <li><a href="#"><img alt="image" src="{{ asset('assets/images/icons/tags.svg') }}">{{ $post->tags }}</a></li>--}}
       <li><a href="#"><img alt="image" src="{{ asset('assets/images/icons/admin.svg') }}">{{ trans('blog_side_bar.posted_by') . ' ' . trans('actions.admin') }}</a></li>
      </ul>
      <h3 class="blog-title">{{ $post->title }}</h3>
      <div class="blog-content">
       {!! $post->text !!}
      </div>
      <div class="blog-tag">
       <div class="row g-3">
        @isset($post->category_id)
        <div class="col-md-6 d-flex justify-content-md-start justify-content-center align-items-center">
         <h6>{{ trans('blog_side_bar.post_categories') }}:  <a href="{{ route('category.posts',$post->category->slug) }}">{{ $post->category->title }}</a></h6>

        </div>
        @endisset
        <div class="col-md-6 d-flex justify-content-md-end justify-content-center align-items-center">
         <ul class="share-social gap-3">
          <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('posts.show',$post->slug)) }}&t={{urlencode($post->title)}}"><i class='bx bxl-facebook'></i></a></li>
          <li><a target="_blank" href="https://twitter.com/intent/tweet?url={{ urlencode(route('posts.show',$post->slug)) }}&text={{urlencode($post->title)}}"><i class='bx bxl-twitter'></i></a></li>
          <li><a target="_blank" href="https://api.whatsapp.com/send?text={{ urlencode($post->title . ' ' . url()->current() ) }}"><i class='bx bxl-whatsapp'></i></a></li>
          <li><a target="_blank" href="https://telegram.me/share/url?url={{ urlencode(route('posts.show',$post->slug)) }}&text={{ urlencode($post->title) }}"><i class='bx bxl-telegram'></i></a></li>
         </ul>
        </div>
       </div>
      </div>
      <div class="blog-comment" id="comments">
       <div class="blog-widget-title">
        <h4>{{ trans('blog_side_bar.comments') }} {{ $post->comments()->count() }}</h4>
        <span></span>
       </div>
       @forelse($comments ?? [] as $comment)
       <ul class="comment-list mb-50">
        <li>
         <div class="comment-box">
          <div class="comment-header d-flex justify-content-between align-items-center">
           <div class="author d-flex flex-wrap">
            <img alt="image" src="https://www.gravatar.com/avatar/b2437b6f7f7a17a9e02f3b87673235c1?s=100&d=mp&r=pg">
            <h5><a href="javascript:void(0)">{{ $comment->name }}</a></h5><span class="commnt-date"> {{ $comment->created_at->diffForHumans() }}</span>
           </div>
           <a onclick="changeParentId({{$comment->id}})" href="#comment-form" class="commnt-reply"><i class="bi bi-reply"></i></a>
          </div>
          <div class="comment-body">
           <p class="para">{{$comment->description}}</p>
          </div>
          @foreach($comment->children ?? [] as $childComment)
           @include('pages.sections.comment-reply',['comment' => $childComment])
          @endforeach
         </div>

        </li>
       </ul>
        @empty

       @endforelse
      </div>
      <div class="comment-form" id="comment-form">
       <div class="blog-widget-title style2">
        <h4>{{ trans('blog_side_bar.leave_comment') }}</h4>
        <p class="para">{{ trans('blog_side_bar.leave_comment_subtext') }}</p>
        <span></span>
       </div>
       <form action="{{ route('comments.store') }}" method="post">
        <div class="row">
         @csrf
         <div class="col-xl-6 col-lg-12 col-md-6">
          <div class="form-inner">
           <input type="text" name="name" placeholder="{{ trans('actions.your_name') }}">
           <input type="hidden" id="parent_id" name="parent_id">
           @error('email')
            <span style="color:red;" class="error">{{ $message }}</span>
           @enderror
          </div>
         </div>
         <div class="col-xl-6 col-lg-12 col-md-6">
          <div class="form-inner">
           <input type="email" name="email" placeholder="{{ trans('actions.your_email') }}">
           @error('email')
            <span style="color:red;" class="error">{{ $message }}</span>
           @enderror
          </div>
         </div>
         <input type="hidden" name="post_id" value="{{ $post->id }}">
         <div class="col-12">
          <div class="form-inner">
           <textarea name="description" placeholder="{{ trans('actions.write_message') }}" rows="12"></textarea>
           @error('description')

           <span style="color:red;" class="error">{{ $message }}</span>
           @enderror


          </div>
         </div>
         <div class="col-12">
          <button type="submit" class="eg-btn btn--primary btn--md form--btn">{{ trans('contact_modal.btn_send') }}</button>
         </div>
        </div>
       </form>
      </div>
     </div>
    </div>
    <div class="col-lg-4">

     <div class="blog-sidebar">
      <div class="blog-widget-item wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".2s">
       <div class="search-area">
        <div class="sidebar-widget-title">
         <h4>{{ trans('blog_side_bar.search_title') }}</h4>
         <span></span>
        </div>
        <div class="blog-widget-body">
         <form action="{{ route('search') }}" method="get">
          <div class="form-inner">
           <input name="q" type="text" placeholder="{{ trans('blog_side_bar.search_place_holder') }}">
           <button class="search--btn"><i class='bx bx-search-alt-2'></i></button>
          </div>
         </form>
        </div>
       </div>
      </div>
      <div class="blog-widget-item wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".4s">
       <div class="blog-category">
        <div class="sidebar-widget-title">
         <h4>{{ trans('blog_side_bar.recently_new_title') }}</h4>
         <span></span>
        </div>
        <div class="blog-widget-body">
         <ul class="recent-post">
          @foreach($recentPosts ?? [] as $post)
           <li class="single-post">
            <div class="post-img">
             <a href="{{ route('posts.show',$post->slug) }}"><img alt="image" src="{{ asset($post->banner) }}"></a>
            </div>
            <div class="post-content">
             <span>{{ $post->created_at->diffForHumans() }}</span>
             <h6><a href="{{ route('posts.show',$post->slug) }}">{{ $post->title }}</a>
             </h6>
            </div>
           </li>

          @endforeach
         </ul>
        </div>
       </div>
      </div>
      <div class="blog-widget-item wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".4s">
       <div class="top-blog">
        <div class="sidebar-widget-title">
         <h4>{{ trans('blog_side_bar.post_categories') }}</h4>
         <span></span>
        </div>
        <div class="blog-widget-body">
         <ul class="category-list">
          @foreach($categories ?? [] as $category)
           <li><a href="{{ route('category.posts',$category->slug) }}"><span>{{$category->title}}</span><span>{{ $category->posts()->count() }}</span></a></li>
          @endforeach
         </ul>
        </div>
       </div>
      </div>
      <div class="blog-widget-item wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".8s">
       <div class="tag-area">
        <div class="sidebar-widget-title">
         <h4>Follow Social</h4>
         <span></span>
        </div>
        <div class="blog-widget-body">
         <ul class="sidebar-social-list gap-4">
          <li><a href="{{ \App\Helpers\Helper::Setting('social_facebook')->value }}"><i class='bx bxl-facebook'></i></a></li>
          <li><a href="{{ \App\Helpers\Helper::Setting('social_twitter')->value }}"><i class='bx bxl-twitter'></i></a></li>
          <li><a href="{{ \App\Helpers\Helper::Setting('social_insta')->value }}"><i class='bx bxl-instagram'></i></a></li>
          <li><a href="{{ \App\Helpers\Helper::Setting('social_telegram')->value }}"><i class='bx bxl-telegram'></i></a></li>
         </ul>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
@endsection

@section('script')
 <script>
  function changeParentId(id){
   document.getElementById('parent_id').value = id
  }
 </script>
@endsection


@section('styles')
 <style>
  .inner-banner::before{
   content: url({{ \App\Helpers\Helper::Setting('page_header_pic')->value }}) !important;
   position: absolute;
   top: 0;
   bottom: 0;
   left: 0;
   z-index: -1;
  }
 </style>
@endsection