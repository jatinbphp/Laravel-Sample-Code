<div class="post-wrapper" id="feedarea{{$userfeed->id}}">
    <div class="author-data">
        <div class="avatar">
            <a href="#">
                <img class="responsive-img userProfilePhoto circle" src='{{$userfeed->user->avatar}}' alt="">
            </a>
        </div>
        <div class="info">
            @if($userfeed->add_by !="")
                <p><a href="#">{{$userfeed->addBy->name}}</a>   {{trans('message.has_posted_into_your_timeline')}}</p>
            @else
                <p><a href="#">{{$userfeed->user->name}}</a>{{trans('message.added_a_new_post')}} </p>
            @endif
            <span>{{date('d F Y h:i A',strtotime($userfeed->created_at))}}</span></p>
        </div>
    </div>
    <div class="post-data">
        <div class="card-content">
            <p>{!!$userfeed->content!!}</p>
        </div>
        <div class="card-image">
            @if($userfeed->url)
                <a data-fancybox="gallery" href="{{$userfeed->url}}"><img src="{{$userfeed->url}}"></a>
            @endif
        </div>
        <div class="card-content">
            @if($userfeed->files || $userfeed->video)
              {{trans('message.attached_files')}}
            @endif
            @if($userfeed->files)
                <p class="card-files">
                    <a class="fancyPdf" href='{{$userfeed->files}}'>
                        <i class="material-icons dp48">{{trans('message.attachment')}}</i>
                        <span>
                            {{basename($userfeed->files)}}
                        </span>
                    </a>
                </p>
            @endif

            @if($userfeed->video)
                <p class="card-files">
                    <a data-fancybox href='{{$userfeed->video}}'>
                        <i class="material-icons dp48">{{trans('message.attachment')}}</i>
                        <span>
                            {{basename($userfeed->video)}}
                        </span>
                    </a>
                </p>
            @endif

            @if(count(get_tour_upload_file($userId,$userfeed->tour_id)) > 0 && $userfeed->type=='observation_report')
                Public Files
                @foreach(get_tour_upload_file($userId,$userfeed->tour_id) as $key => $file)
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
            <a class="social-icon likes newsFeedLike" data-group="{{$userfeed->group_id}}"
                value="{{$userfeed->nr_like}}" id="{{$userfeed->id}}" id="newsfeed_like_{{$userfeed->id}}">
                <div class="social-icon likes" id="newsfeed_like_{{$userfeed->id}}">
                    <img src="{{ asset('img/icon-heart.png')}}" alt="">
                    <span>{{$userfeed->nr_like}}</span>
                </div>
            </a>

            <a class="social-icon comments getNewsFeedComment" data-feed-id="{{$userfeed->id}}" data-type="comment">
                <div class="social-icon comments">
                    <img src="{{ asset('img/icon-comment.png')}}" alt="">
                    <span id="newsfeed_comment_{{$userfeed->id}}">
                        {{$userfeed->commentCount()}}
                    </span>
                </div>
            </a>
        </div>

        <div class="comments">
            <div class="post-comment comment hidden" id="comment_feed_{{$userfeed->id}}">
                <div class="avatar">
                    <a href="#">
                        <img class="responsive-img userProfilePhoto circle"
                        src='{{$user->avatar}}' alt="" />
                    </a>
                </div>
                <div class="comment-input">

                </div>
            </div>
            <div class="newsFeedComment">
                @if($userfeed->blogcomments !=null)
                    @foreach($userfeed->blogcomments as $comment)
                        @include("userfeed.comment",['comment' => $comment])

                        @php
                            $subComment = $comment->blogSubComments($comment->comment_id);
                        @endphp
                        @if(isset($subComment))
                            @foreach($subComment as $comment)
                                @include("userfeed.comment",['comment' => $comment,'cls'=>'subcomment'])
                            @endforeach
                        @endif
                    @endforeach

                @endif
            </div>
        </div>
    </div>
</div>
