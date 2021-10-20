<div class="post-wrapper" id="feedarea{{$newsfeed->id}}">
    <div class="author-data">
        <div class="avatar">
            <a href="{{url('/userfeed/').'/'.$newsfeed->user->secret_id}}"  target="_blank">
                <img class="responsive-img userProfilePhoto circle" src='{{$newsfeed->user->avatar}}' alt="">
            </a>
        </div>
        <div class="info">
            <p><a href="{{url('/userfeed/').'/'.$newsfeed->user->secret_id}}"  target="_blank"> {{$newsfeed->user->name}}</a> {{trans('message.added_a_new_post')}}</p>
            <span>{{date('d F Y h:i A',strtotime($newsfeed->created_at))}}</span></p>
        </div>
    </div>
    <div class="post-data">
        <div class="card-content">
            <p>{!!$newsfeed->content!!}</p>
        </div>
        <div class="card-image">
            @if($newsfeed->url)
                <a data-fancybox="gallery" href="{{$newsfeed->url}}"><img src="{{$newsfeed->url}}"></a>
            @endif
        </div>
        <div class="card-content">
            @if($newsfeed->files || $newsfeed->video)
               {{trans('message.attached_files')}}
            @endif
            @if($newsfeed->files)
                <p class="card-files">
                    <a class="fancyPdf" href='{{$newsfeed->files}}'>
                        <i class="material-icons dp48"> {{trans('message.attachment')}}</i>
                        <span>
                            {{basename($newsfeed->files)}}
                        </span>
                    </a>
                </p>
            @endif

            @if($newsfeed->video)
                <p class="card-files">
                    <a data-fancybox href='{{$newsfeed->video}}'>
                        <i class="material-icons dp48">{{trans('message.attachment')}}</i>
                        <span>
                            {{basename($newsfeed->video)}}
                        </span>
                    </a>
                </p>
            @endif

            @if(count(get_tour_upload_file($userId,$newsfeed->tour_id)) > 0 && $newsfeed->type=='observation_report')
                Public Files
                @foreach(get_tour_upload_file($userId,$newsfeed->tour_id) as $key => $file)
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
            <a class="social-icon likes newsFeedLike" data-group="{{$newsfeed->group_id}}"
                value="{{$newsfeed->nr_like}}" id="{{$newsfeed->id}}" id="newsfeed_like_{{$newsfeed->id}}">
                <div class="social-icon likes" id="newsfeed_like_{{$newsfeed->id}}">
                    <img src="{{ asset('img/icon-heart.png')}}" alt="">
                    <span>{{$newsfeed->nr_like}}</span>
                </div>
            </a>

            <a class="social-icon comments getNewsFeedComment" data-feed-id="{{$newsfeed->id}}" data-type="comment">
                <div class="social-icon comments">
                    <img src="{{ asset('img/icon-comment.png')}}" alt="">
                    <span id="post_comment_{{$newsfeed->id}}">{{$newsfeed->commentCount()}}</span>
                </div>
            </a>
        </div>

        <div class="comments">
            <div class="post-comment comment hidden" id="comment_feed_{{$newsfeed->id}}">
                <div class="avatar">
                    <a href="{{url('/userfeed/').'/'.$newsfeed->user->secret_id}}" target="_blank">
                        <img class="responsive-img userProfilePhoto circle"
                        src='{{$user->avatar}}' alt="" />
                    </a>
                </div>
                <div class="comment-input">

                </div>
            </div>
            <div class="newsFeedComment">
                @if($newsfeed->blogcomments !=null)
                    @foreach($newsfeed->blogcomments as $comment)
                        @include("newsfeed.comment",['comment' => $comment])

                        @php
                            $subComment = $comment->blogSubComments($comment->comment_id);
                        @endphp
                        @if(isset($subComment))
                            @foreach($subComment as $comment)
                                @include("newsfeed.comment",['comment' => $comment,'cls'=>'subcomment'])
                            @endforeach
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
