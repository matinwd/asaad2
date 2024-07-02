<ul class="comment-reply">
    <li>
        <div class="comment-box">
            <div class="comment-header d-flex justify-content-between align-items-center">
                <div class="author d-flex flex-wrap">
                    <img alt="image" src="https://www.gravatar.com/avatar/b2437b6f7f7a17a9e02f3b87673235c1?s=100&d=mp&r=pg">
                    <h5><a href="#">{{ $comment->name }}</a></h5><span class="commnt-date"> {{ $comment->created_at->diffForHumans() }}</span>
                </div>
                <a onclick="changeParentId({{$comment->id}})" href="#comment-form"  class="commnt-reply"><i class="bi bi-reply"></i></a>
            </div>
            <div class="comment-body">
                <p class="para">{{ $comment->description }}</p>
            </div>
        </div>
        @foreach($comment->children as $thirdLevelComment)
            @include('pages.sections.comment-reply',['comment' => $thirdLevelComment])
        @endforeach
    </li>
</ul>