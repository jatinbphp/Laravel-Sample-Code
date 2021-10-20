<div class="post-wrapper" id="postarea{{$post->id}}">
    <div class="author-data">
        <div class="avatar">
            <a href="{{url('/userfeed/').'/'.$post->user->secret_id}}" target="_blank">
                <img class="responsive-img userProfilePhoto circle" src='{{$post->user->avatar}}' alt="">
            </a>
        </div>
        <div class="info">
            <p><a href="{{url('/userfeed/').'/'.$post->user->secret_id}}" target="_blank"> {{$post->user->name}}</a> {{trans('message.added_a_new_post')}}.</p>
            <span>{{date('d F Y h:i A',strtotime($post->created_at))}}</span>
        </div>
    </div>
    <div class="post-data">
        <div class="card-image">
            @if($post->url)
                <a data-fancybox="gallery" href="{{$post->url}}">
                    <img src="{{$post->url}}">
                </a>
            @endif
        </div>
        <div class="card-content">
            {!! $post->content !!}
        </div>
        <div class="card-content">
            @if($post->files || $post->video)
               {{trans('message.attached_files')}}
            @endif
            @if($post->files)
                <p class="card-files">
                    <a class="fancyPdf" href='{{$post->files}}' target="_blank">
                        <i class="material-icons dp48"> {{trans('message.attachment')}}</i>
                        <span>
                            {{basename($post->files)}}
                        </span>
                    </a>
                </p>
            @endif

            @if($post->video)
                <p class="card-files">
                    <a data-fancybox href='{{$post->video}}' target="_blank">
                        <i class="material-icons dp48">{{trans('message.attachment')}}</i>
                        <span>
                            {{basename($post->video)}}
                        </span>
                    </a>
                </p>
            @endif

            @if(count(get_tour_upload_file($userId,$post->tour_id)) > 0 && $post->type=='observation_report')
                Public Files
                @foreach(get_tour_upload_file($userId,$post->tour_id) as $key => $file)
                    <p class="card-files">
                        <a data-fancybox href='{{$file}}' target="_blank">
                            <i class="material-icons dp48">{{trans('message.attachment')}}</i>
                            <span>
                                {{basename($file)}}
                            </span>
                        </a>
                    </p>
                @endforeach
            @endif
        </div>
    </div>
    <div class="post-comments">
        <div class="social-wrapper">
            <a class="social-icon likes postLike" data-group="{{$post->group_id}}"
                value="{{$post->nr_like}}" id="{{$post->id}}" id="post_like_{{$post->id}}">
                <div class="social-icon likes" id="post_like_{{$post->id}}">
                    <img src="{{ asset('img/icon-heart.png')}}" alt="">
                    <span>{{$post->nr_like}}</span>
                </div>
            </a>

            <a class="social-icon comments getPostComment" data-post-id="{{$post->id}}" data-type="comment">
                <div class="social-icon comments">
                    <img src="{{ asset('img/icon-comment.png')}}" alt="">
                    <span id="post_comment_{{$post->id}}">{{$post->commentCount()}}</span>
                </div>
            </a>
        </div>

        <div class="comments">
            <div class="post-comment comment hidden" id="comment_{{$post->id}}">
                <div class="avatar">
                    <a href="#">
                        <img class="responsive-img userProfilePhoto circle"
                        src='{{$user->avatar}}' alt="" />
                    </a>
                </div>
                <div class="comment-input">

                </div>
            </div>
            <div class="postComment">
                @if($post->blogcomments !=null)
                    @foreach($post->blogcomments as $comment)
                        @include("profile.comment",['comment' => $comment])
                        @php
                            $subComment = $comment->blogSubComments($comment->comment_id);
                        @endphp
                        @if(isset($subComment))
                            @foreach($subComment as $comment)
                                @include("profile.comment",['comment' => $comment,'cls'=>'subcomment'])
                            @endforeach
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
