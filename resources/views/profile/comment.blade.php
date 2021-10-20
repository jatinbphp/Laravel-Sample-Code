<div id="commentPart{{$comment->id}}">
    <div class="comment {{ isset($cls) ? $cls : ''}}">
        <div class="avatar">
            <a href="{{url('/userfeed/').'/'.$comment->user->secret_id}}" target="_blank"><img class="responsive-img userProfilePhoto circle"
            src="{{$comment->user->avatar}}" alt=""></a>
        </div>
        <div class="comment-input">
            <div class="comment-container">
                <b><a href="{{url('/userfeed/').'/'.$comment->user->secret_id}}" target="_blank">{{$comment->user->name}}</a>.</b>
                {!!$comment->content!!}
                @if($user && $user->id == $comment->user_id)
                    <div class="btn-group-right">
                        <button type="button" class="removeComment removePostComment" name="btnDelete" data-id="{{$comment->id}}" data-post-id="{{$comment->post_id}}">
                        <i class="material-icons">delete</i>
                        </button>
                    </div>
                @endif
                @if($comment->image != "")
                    <p class="card-files">
                        <a data-fancybox="gallery" href='{{$comment->image}}'>
                            <i class="material-icons dp48">{{trans('message.attachment')}}</i>
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
                <a class="social-icon comments getPostComment" data-comment-id="{{$comment->id}}" data-post-id="{{$comment->post_id}}" data-type="subcomment">
                    {{trans('message.reply')}}
                </a>
            </div>
            <div class="post-comment comment hidden" id="sub_comment_{{$comment->id}}" target="_blank">
                <div class="avatar">
                    <a href="{{url('/userfeed/').'/'.$comment->user->secret_id}}" target="_blank">
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
