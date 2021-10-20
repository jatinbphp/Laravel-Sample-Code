@extends('layouts.app')
@section('content')
<div class="section groups-container" id="user-profile">
    <div class="row">
        <div class="col s12">
            <div class="header-group coustome-header-group">
                @php
                $bgimage = $user->cover_photo;
                $bgimage = asset('img/banner-kendra.png')
                @endphp
                <div class="cover-group userCoverPhoto" style="background-image:url('{{$bgimage}}')">
                    <div class="logo-group">
                        <img src='{{$user->avatar}}' alt="avatar" class="userProfilePhoto" />
                    </div>
                    <div class="titlu-group">
                        <input type="hidden" id="user_id" value="{{$user->id}}" />
                        <p class="user_name_N">{{$user->name}}</p>
                        <span>{{$user->role}}</span>
                    </div>
                    <div class="statistica-group">
                        <ul>
                            <li><b>50</b><span>$</span></li>
                            <li><b>{{$files}}</b><span>{{trans('message.files')}}</span></li>
                            <li><b>{{count($posts)}}</b><span>{{trans('message.posts')}}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="nav-group row top-part-filter">
                    <div class="col s12 m12 l12">
                        <form>
                            <div class="row">
                                <div class="input-field col m10 s10">
                                    <div class="row cus-margin">
                                        <div class="input-field col m2 cus-width-control s2 cus-padding m-0">
                                            <input id="icon_prefix1" type="text" class="validate form-box" placeholder="dd-mm-yyyy">
                                        </div>
                                        <div class="input-field col m2 cus-width-control s2 cus-padding m-0">
                                            <select>
                                                <option value="" disabled selected>Staff Member</option>
                                                <option value="1">Manager</option>
                                                <option value="2">Developer</option>
                                                <option value="3">Business</option>
                                            </select>
                                        </div>
                                        <div class="input-field col m2 cus-width-control s2 cus-padding m-0">
                                            <select>
                                                <option value="" disabled selected>Staff Type</option>
                                                <option value="1">Manager</option>
                                                <option value="2">Developer</option>
                                                <option value="3">Business</option>
                                            </select>
                                        </div>
                                        <div class="input-field col m2 cus-width-control s2 cus-padding m-0">
                                            <select>
                                                <option value="" disabled selected>Model Name</option>
                                                <option value="1">Manager</option>
                                                <option value="2">Developer</option>
                                                <option value="3">Business</option>
                                            </select>
                                        </div>
                                        <div class="input-field col m2 cus-width-control s2 cus-padding m-0">
                                            <select>
                                                <option value="" disabled selected>Post Type</option>
                                                <option value="1">Manager</option>
                                                <option value="2">Developer</option>
                                                <option value="3">Business</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-field col m2 s2">
                                    <div class="cleare-btn">
                                        <a href="#">Clear filters <span>X</span></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col s12" id="cronologie-tab">
                <!-- User Post Feed -->
                <div class="col s12 m12 xl12">
                    <div id="feed" class="postFeed">
                        @foreach($posts as $post)
                        <div class="post-wrapper card card-border report-listing" id="postarea{{$post->id}}">
                            <div class="author-data">
                                <div class="expands-icon">
                                    <a href="#">
                                        <img src="{{ asset('img/expands.png')}}">
                                    </a>
                                </div>
                                <div class="avatar">
                                    <a href="#">
                                        <img class="responsive-img userProfilePhoto circle" src='{{$post->user->avatar}}' alt="">
                                    </a>
                                </div>
                                <div class="info">
                                    <p><a href="#">{{$post->user->name}}</a>{{trans('message.added_a_new_post')}}</p>
                                    <span>{{date('d F Y h:i A',strtotime($post->created_at))}}</span></p>
                                </div>
                            </div>
                            <ul class="collapsible collapsible-accordion">
                                <li>
                                    <div class="collapsible-header">
                                        <div class="collapsible-header-text">Report Name 1</div>
                                        <div class="collapsible-header-comment">
                                            <div class="social-icon likes" id="post_like_86">
                                                <img src="{{asset('img/icon-heart-active.png')}}" alt="">
                                                <span>1</span>
                                            </div>
                                            <div class="social-icon comments">
                                                <img src="{{ asset('img/icon-comment-active.png')}}" alt="">
                                                <span id="post_comment_86">0</span>
                                            </div>
                                            <div class="social-icon arrow-down">
                                                <img src="{{ asset('img/downarrow.svg')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="collapsible-body">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                                            et
                                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                            aliquip
                                            ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                            ullamco
                                            laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing
                                            elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis
                                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        </p>
                                        <div class="post-comments">
                                            <div class="social-wrapper">
                                                <button type="button" name="btnSend" class="social-icon likes postLike" data-group="{{$post->group_id}}"
                                                value="{{$post->nr_like}}" id="{{$post->id}}">
                                                <img src="{{ asset('img/like-black.png')}}" alt="">
                                                <span>Like</span>
                                                </button>
                                                <button type="button" name="btnSend" class="social-icon comments getComment" data-id="{{$post->id}}">
                                                <img src="{{ asset('img/comment-black.png')}}" alt="">
                                                <span>Comment</span>
                                                </button>
                                            </div>
                                            <div class="comments align-center-content">
                                                <div class="post-comment comment" id="comment_{{$post->id}}">
                                                    <div class="avatar">
                                                        <a href="#">
                                                            <img class="responsive-img userProfilePhoto circle"
                                                            src='{{$user->avatar}}' alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="comment-input comment-input-with-send-option">
                                                        <form class="form_comment" method="POST"
                                                            id="form_comment" name="form_comment">
                                                            @csrf
                                                            <input type="hidden" class="postId" name="post_id" value="{{$post->id}}">
                                                            <textarea class="comment-container comment_textarea" name="comment"
                                                            placeholder="{{trans('message.add_a_comment')}}..."></textarea>
                                                            <div class="btn-group-right">
                                                                <button type="button" name="btnSend" class="add-image">
                                                                <img src="{{ asset('img/camera.png')}}" alt="">
                                                                </button>
                                                                <button type="button" name="btnSend" class="add-image btnPostComment">
                                                                <img src="{{ asset('img/send.png')}}" alt="">
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="postComment">
                                                    @if($post->blogcomments !=null)
                                                    @foreach($post->blogcomments as $comment)
                                                    <div id="commentPart{{$comment->id}}">
                                                        <div class="comment">
                                                            <div class="avatar">
                                                                <a href="#"><img class="responsive-img userProfilePhoto circle"
                                                                src="{{$comment->user->avatar}}" alt=""></a>
                                                            </div>
                                                            <div class="comment-input comment-input-with-send-option">
                                                                <div class="comment-container">
                                                                    <b><a href="#">{{$comment->user->name}}</a>.</b> {{$comment->content}}
                                                                    @if($user && $user->id == $comment->user_id)
                                                                    <div class="btn-group-right">
                                                                        <button type="button" class="removeComment" name="btnDelete" data-id="{{$comment->id}}" data-post-id="{{$comment->post_id}}">
                                                                        <i class="material-icons">delete</i>
                                                                        </button>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="collapsible-header">
                                        <div class="collapsible-header-text">Report Name 1</div>
                                        <div class="collapsible-header-comment">
                                            <div class="social-icon likes" id="post_like_86">
                                                <img src="{{ asset('img/icon-heart-active.png') }}" alt="">
                                                <span>1</span>
                                            </div>
                                            <div class="social-icon comments">
                                                <img src="{{ asset('img/icon-comment-active.png')}}" alt="">
                                                <span id="post_comment_86">0</span>
                                            </div>
                                            <div class="social-icon arrow-down">
                                                <img src="{{ asset('img/downarrow.svg')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="collapsible-body">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                                            et
                                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                            aliquip
                                            ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                            ullamco
                                            laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing
                                            elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis
                                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        </p>
                                        <div class="post-comments">
                                            <div class="social-wrapper">
                                                <button type="button" name="btnSend" class="social-icon likes postLike" data-group="{{$post->group_id}}"
                                                value="{{$post->nr_like}}" id="{{$post->id}}">
                                                <img src="{{ asset('img/like-black.png')}}" alt="">
                                                <span>Like</span>
                                                </button>
                                                <button type="button" name="btnSend" class="social-icon comments getComment" data-id="{{$post->id}}">
                                                <img src="{{ asset('img/comment-black.png')}}" alt="">
                                                <span>Comment</span>
                                                </button>
                                            </div>
                                            <div class="comments">
                                                <div class="post-comment comment" id="comment_{{$post->id}}">
                                                    <div class="avatar">
                                                        <a href="#">
                                                            <img class="responsive-img userProfilePhoto circle"
                                                            src='{{$user->avatar}}' alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="comment-input comment-input-with-send-option">
                                                        <form class="form_comment" method="POST"
                                                            id="form_comment" name="form_comment">
                                                            @csrf
                                                            <input type="hidden" class="postId" name="post_id" value="{{$post->id}}">
                                                            <textarea class="comment-container comment_textarea" name="comment"
                                                            placeholder="{{trans('message.add_a_comment')}}..."></textarea>
                                                            <div class="btn-group-right">
                                                                <button type="button" name="btnSend" class="add-image">
                                                                <img src="{{ asset('img/camera.png')}}" alt="">
                                                                </button>
                                                                <button type="button" name="btnSend" class="add-image btnPostComment">
                                                                <img src="{{ asset('img/send.png')}}" alt="">
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="postComment">
                                                    @if($post->blogcomments !=null)
                                                    @foreach($post->blogcomments as $comment)
                                                    <div id="commentPart{{$comment->id}}">
                                                        <div class="comment">
                                                            <div class="avatar">
                                                                <a href="#"><img class="responsive-img userProfilePhoto circle"
                                                                src="{{$comment->user->avatar}}" alt=""></a>
                                                            </div>
                                                            <div class="comment-input">
                                                                <div class="comment-container">
                                                                    <b><a href="#">{{$comment->user->name}}</a>.</b> {{$comment->content}}
                                                                    @if($user && $user->id == $comment->user_id)
                                                                    <a class="removeComment" data-id="{{$comment->id}}" data-post-id="{{$comment->post_id}}">
                                                                        <i class="material-icons">delete</i>
                                                                    </a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="collapsible-header">
                                        <div class="collapsible-header-text">General Observation</div>
                                        <div class="collapsible-header-comment">
                                            <div class="social-icon likes" id="post_like_86">
                                                <img src="{{ asset('img/icon-heart-active.png') }}" alt="">
                                                <span>1</span>
                                            </div>
                                            <div class="social-icon comments">
                                                <img src="{{ asset('img/icon-comment-active.png')}}" alt="">
                                                <span id="post_comment_86">0</span>
                                            </div>
                                            <div class="social-icon arrow-down">
                                                <img src="{{ asset('img/downarrow.svg')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="collapsible-body">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                                            et
                                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                            aliquip
                                            ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                            ullamco
                                            laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing
                                            elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis
                                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        </p>
                                        <div class="post-comments">
                                            <div class="social-wrapper">
                                                <button type="button" name="btnSend" class="social-icon likes postLike" data-group="{{$post->group_id}}"
                                                value="{{$post->nr_like}}" id="{{$post->id}}">
                                                <img src="{{ asset('img/like-black.png')}}" alt="">
                                                <span>Like</span>
                                                </button>
                                                <button type="button" name="btnSend" class="social-icon comments getComment" data-id="{{$post->id}}">
                                                <img src="{{ asset('img/comment-black.png')}}" alt="">
                                                <span>Comment</span>
                                                </button>
                                            </div>
                                            <div class="comments">
                                                <div class="post-comment comment" id="comment_{{$post->id}}">
                                                    <div class="avatar">
                                                        <a href="#">
                                                            <img class="responsive-img userProfilePhoto circle"
                                                            src='{{$user->avatar}}' alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="comment-input comment-input-with-send-option">
                                                        <form class="form_comment" method="POST"
                                                            id="form_comment" name="form_comment">
                                                            @csrf
                                                            <input type="hidden" class="postId" name="post_id" value="{{$post->id}}">
                                                            <textarea class="comment-container comment_textarea" name="comment"
                                                            placeholder="{{trans('message.add_a_comment')}}..."></textarea>
                                                            <div class="btn-group-right">
                                                                <button type="button" name="btnSend" class="add-image">
                                                                <img src="{{ asset('img/camera.png')}}" alt="">
                                                                </button>
                                                                <button type="button" name="btnSend" class="add-image btnPostComment">
                                                                <img src="{{ asset('img/send.png')}}" alt="">
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="postComment">
                                                    @if($post->blogcomments !=null)
                                                    @foreach($post->blogcomments as $comment)
                                                    <div id="commentPart{{$comment->id}}">
                                                        <div class="comment">
                                                            <div class="avatar">
                                                                <a href="#"><img class="responsive-img userProfilePhoto circle"
                                                                src="{{$comment->user->avatar}}" alt=""></a>
                                                            </div>
                                                            <div class="comment-input comment-input-with-send-option">
                                                                <div class="comment-container">
                                                                    <b><a href="#">{{$comment->user->name}}</a>.</b> {{$comment->content}}
                                                                    @if($user && $user->id == $comment->user_id)
                                                                    <a class="removeComment" data-id="{{$comment->id}}" data-post-id="{{$comment->post_id}}">
                                                                        <i class="material-icons">delete</i>
                                                                    </a>
                                                                    @endif
                                                                </div>
                                                                <div class="comment-react like-and-comment-btn">
                                                                    <a class="social-icon likes postSubLike" id="{{$comment->id}}">
                                                                        <span>Like</span>
                                                                    </a>
                                                                    <a class="social-icon comments getSubComment" data-id="{{$comment->id}}" data-post-id="{{$comment->post_id}}">
                                                                        Comment
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="post-comments">
                                <div class="post-comments-like-report">
                                    <div class="collapsible-header-comment">
                                        <div class="social-icon likes" id="post_like_86">
                                            <img src="{{ asset('img/icon-heart-active.png') }}" alt="">
                                            <span>1</span>
                                        </div>
                                        <div class="social-icon comments">
                                            <img src="{{ asset('img/icon-comment-active.png') }}" alt="">
                                            <span id="post_comment_86">0</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="social-wrapper">
                                    <a class="social-icon likes postLike" data-group="{{$post->group_id}}"
                                        value="{{$post->nr_like}}" id="{{$post->id}}">
                                        <img src="{{ asset('img/like-black.png')}}" alt="">
                                        <span>Like</span>
                                    </a>
                                    <a class="social-icon comments getComment" data-id="{{$post->id}}">
                                        <img src="{{ asset('img/comment-black.png')}}" alt="">
                                        <span>Comment</span>
                                    </a>
                                </div>
                                <div class="comments">
                                    <div class="post-comment comment" id="comment_{{$post->id}}">
                                        <div class="avatar">
                                            <a href="#">
                                                <img class="responsive-img userProfilePhoto circle"
                                                src='{{$user->avatar}}' alt="" />
                                            </a>
                                        </div>
                                        <div class="comment-input comment-input-with-send-option">
                                            <form class="form_comment" method="POST"
                                                id="form_comment" name="form_comment">
                                                @csrf
                                                <input type="hidden" class="postId" name="post_id" value="{{$post->id}}">
                                                <textarea class="comment-container comment_textarea" name="comment"
                                                placeholder="{{trans('message.add_a_comment')}}..."></textarea>
                                                <div class="btn-group-right">
                                                    <button type="button" name="btnSend" class="add-image">
                                                    <img src="{{ asset('img/camera.png')}}" alt="">
                                                    </button>
                                                    <button type="button" name="btnSend" class="add-image btnPostComment">
                                                    <img src="{{ asset('img/send.png')}}" alt="">
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="postComment">
                                        @if($post->blogcomments !=null)
                                        @foreach($post->blogcomments as $comment)
                                        <div id="commentPart{{$comment->id}}">
                                            <div class="comment">
                                                <div class="avatar">
                                                    <a href="#"><img class="responsive-img userProfilePhoto circle"
                                                    src="{{$comment->user->avatar}}" alt=""></a>
                                                </div>
                                                <div class="comment-input ">
                                                    <div class="comment-container">
                                                        <b><a href="#">{{$comment->user->name}}</a>.</b> {{$comment->content}}
                                                        @if($user && $user->id == $comment->user_id)
                                                            <div class="btn-group-right">
                                                                <button type="button" class="removeComment" name="btnDelete" data-id="{{$comment->id}}" data-post-id="{{$comment->post_id}}">
                                                                <i class="material-icons">delete</i>
                                                                </button>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
// Used events
var drEvent = $('.dropify-event').dropify();
});
</script>
@endsection
