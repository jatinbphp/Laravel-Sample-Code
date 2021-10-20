<div id="commentNewsFeedPart{{$comment->id}}">
    <div class="comment {{ isset($cls) ? $cls : ''}}">
        <div class="avatar">
            <a href="#"><img class="responsive-img userProfilePhoto circle"
            src="{{$comment->user->avatar}}" alt=""></a>
        </div>
        <div class="comment-input">
            <div class="comment-container">
                <b><a href="#">{{$comment->user->name}}</a>.</b>
                {!!$comment->content!!}
                @if($user && $user->id == $comment->user_id)
                    <div class="btn-group-right">
                        <button type="button" class="removeComment removeNewsFeedComment" name="btnDelete" data-id="{{$comment->id}}" data-feed-id="{{$comment->post_id}}">
                        <i class="material-icons">delete</i>
                        </button>
                    </div>
                @endif
                @if($comment->image != "")
                    <p class="card-files">
                        <a data-fancybox="gallery" href='{{$comment->image}}'>
                            <i class="material-icons dp48">attachment</i>
                            <span>
                                {{basename($comment->image)}}
                            </span>
                        </a>
                    </p>
                @endif
            </div>
            <div class="comment-react">
                <a class="social-icon likes tooltipped {{is_user_like($userId,$comment->id)}} postSubLike" id="{{$comment->id}}" data-position="top" data-tooltip="{{$comment->likeUser()}}">
                    <span class="likeCount{{$comment->id}}">
                        {{$comment->likeCount()}}
                    </span>
                    <span>{{trans('message.rate')}}</span>
                </a>
                <a class="social-icon comments getNewsFeedComment" data-comment-id="{{$comment->id}}" data-feed-id="{{$comment->post_id}}" data-type="subcomment">
                    {{trans('message.reply')}}
                </a>
            </div>
            <div class="post-comment comment hidden" id="sub_feed_comment_{{$comment->id}}">
                <div class="avatar">
                    <a href="#">
                        <img class="responsive-img userProfilePhoto circle"
                        src='{{$user->avatar}}' alt="" />
                    </a>
                </div>
                <div class="comment-input commentSubInput">

                </div>
            </div>
        </div>
    </div>
</div>
