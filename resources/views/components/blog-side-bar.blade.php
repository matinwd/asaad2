<div class="col-lg-3 col-md-12 sidebar order-lg-1">
    <div class="widget">
        <div class="widget-search">
            <form class="form-inline form">
                <div class="widget-searchbox">
                    <button type="submit" class="search-btn"><i class="fas fa-search"></i>
                    </button>
                    <input type="text" placeholder="{{ trans('blog_side_bar.search_place_holder') }}"
                           class="form-control" name="q" value="{{ request('q') }}">
                </div>
            </form>
        </div>
    </div>
    <div class="widget">
        <h5 class="widget-title">{{ trans('blog_side_bar.category_title') }}</h5>
        <ul class="widget-categories list-unstyled">
            @foreach ($categories as $category)
                <li>
                    <a href="{{ route('category.posts',$category) }}">{{ $category->title }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="widget">
        <h5 class="widget-title">{{ trans('blog_side_bar.recently_new_title') }}</h5>
        <div class="recent-post">
            <ul class="list-unstyled">
                @foreach ($recentlyPosts as $post)
                    <li class="mb-3">
                        <div class="recent-post-thumb">
                            <img class="img-fluid" src="{{ $post->banner }}" alt="Banner Post">
                        </div>
                        <div class="recent-post-desc">
                            <a href="{{ route('posts.show',$post) }}">{{ $post->title }}</a>
                            <span>
                                <i class="fas fa-calendar-alt text-theme ml-1"></i>
                                {{ $post->getDisplayDate() }}
                            </span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="widget clearfix">
        <h5 class="widget-title">{{ trans('blog_side_bar.tags_title') }}</h5>
        <ul class="widget-tags list-inline">
            @foreach ($tags as $tag)
                <li>
                    <a href="?tag={{ $tag }}">{{ str_replace('_',' ',$tag) }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    @php($socialSetting = \App\Helpers\Helper::Setting('social_enable'))
    @if($socialSetting->val == 1)
        <div class="widget">
            <h5 class="widget-title">{{ trans('blog_side_bar.social_title') }}</h5>
            <div class="social-icons social-colored">
                <ul class="list-inline mb-0">
                    @php($facebook = \App\Helpers\Helper::Setting('social_facebook'))
                    @if(strlen(trim($facebook->val)) > 0)
                    <li class="social-facebook">
                        <a href="{{ $facebook->val }}">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    @endif
                    @php($twitter = \App\Helpers\Helper::Setting('social_twitter'))
                    @if(strlen(trim($twitter->val)) > 0)
                    <li class="social-twitter">
                        <a href="{{ $twitter->val }}">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    @endif
                    @php($instagram = \App\Helpers\Helper::Setting('social_insta'))
                    @if(strlen(trim($instagram->val)) > 0)
                    <li class="social-instagram">
                        <a href="{{ $instagram->val }}">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    @endif
                    @php($linkedin = \App\Helpers\Helper::Setting('social_linkdin'))
                    @if(strlen(trim($linkedin->val)) > 0)
                    <li class="social-instagram">
                        <a href="{{ $linkedin->val }}">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    @endif
</div>
