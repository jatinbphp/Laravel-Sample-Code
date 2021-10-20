<ul class="collapsible collapsible-accordion collapsibleAccordion{{$report['id']}}">
    @if(isset($report['tour_data']))
        @foreach($report['tour_data'] as $key => $tour)
            <li id="feedarea{{$tour->id}}">
                <div class="collapsible-header">
                    <div class="collapsible-header-text">
                        @if($tour->type=='observation_report')
                           {{trans('message.general_observations')}}
                        @else
                            {{$tour->model->name}}
                        @endif
                    </div>
                    <div class="collapsible-header-comment">
                        <div class="social-icon likes" id="newsfeed_like_{{$tour->id}}">
                            <img src="{{asset('img/icon-heart-active.png')}}" alt="">
                            <span>{{$tour->likeCount()}}</span>
                        </div>
                        <div class="social-icon comments">
                            <img src="{{ asset('img/icon-comment-active.png')}}" alt="">
                            <span id="newsfeed_comment_{{$tour->id}}">{{$tour->totalComment()}}</span>
                        </div>
                        <div class="social-icon arrow-down">
                            <img src="{{ asset('img/downarrow.svg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="collapsible-body">
                    <p>{!!$tour->content!!}</p>

                    @if($tour->url)
                        <a data-fancybox="gallery" href="{{$tour->url}}">
                            <img src="{{$tour->url}}">
                        </a>
                    @endif

                    @if($tour->files || $tour->video)
                       {{trans('message.attached_files')}}
                    @endif

                    @if($tour->files)
                        <p class="card-files">
                            <a class="fancyPdf" href='{{$tour->files}}' target="_blank">
                                <i class="material-icons dp48">attachment</i>
                                <span>
                                    {{basename($tour->files)}}
                                </span>
                            </a>
                        </p>
                    @endif

                    @if($tour->video)
                        <p class="card-files">
                            <a data-fancybox href='{{$tour->video}}' target="_blank">
                                <i class="material-icons dp48">attachment</i>
                                <span>
                                    {{basename($tour->video)}}
                                </span>
                            </a>
                        </p>
                    @endif

                    @if(count(get_tour_upload_file($userId,$tour->tour_id)) > 0 && $tour->type=='observation_report')
                        Public Files
                        @foreach(get_tour_upload_file($userId,$tour->tour_id) as $key => $file)
                            <p class="card-files">
                                <a data-fancybox href='{{$file}}' target="_blank">
                                    <i class="material-icons dp48">attachment</i>
                                    <span>
                                        {{basename($file)}}
                                    </span>
                                </a>
                            </p>
                        @endforeach
                    @endif

                    <div class="post-comments">
                        <div class="social-wrapper">
                            <button type="button" name="btnSend" class="social-icon likes newsFeedLike" data-group="{{$tour->group_id}}"
                            value="{{$tour->nr_like}}" id="{{$tour->id}}">
                            <img src="{{ asset('img/like-black.png')}}" alt="">
                            <span>{{trans('message.like')}}</span>
                            </button>
                            <button type="button" name="btnSend" class="social-icon comments getNewsFeedComment" data-feed-id="{{$tour->id}}" data-type="comment">
                            <img src="{{ asset('img/comment-black.png')}}" alt="">
                            <span>{{trans('message.comment')}}</span>
                            </button>
                        </div>

                        <div class="comments">
                            <div class="post-comment comment hidden" id="comment_feed_{{$tour->id}}">
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
                                @if($tour->blogcomments !=null)
                                    @foreach($tour->blogcomments as $comment)
                                        @include("admin.report.comment",['comment' => $comment])

                                        @php
                                            $subComment = $comment->blogSubComments($comment->comment_id);
                                        @endphp
                                        @if(isset($subComment))
                                            @foreach($subComment as $comment)
                                                @include("admin.report.comment",['comment' => $comment,'cls'=>'subcomment'])
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    @endif
</ul>
<div class="post-comments">
    <div class="post-comments-like-report">
        <div class="collapsible-header-comment">
            <div class="social-icon likes" id="newsfeed_like_{{$tour->finish_tour_id}}">
                <img src="{{ asset('img/icon-heart-active.png')}}" alt="" class="">
                <span>{{$tour->nr_like}}</span>
            </div>
            <div class="social-icon comments">
                <img src="{{ asset('img/icon-comment-active.png')}}" alt="">
                <span id="newsfeed_comment_{{$tour->finish_tour_id}}">
                    @if($tour->reportComment !=null)
                        {{count($tour->reportComment)}}
                    @endif
                </span>
            </div>
        </div>
    </div>
    <div class="social-wrapper">
        <a class="social-icon likes newsFeedLike">
            <img src="{{ asset('img/like-black.png')}}" alt="">
            <span>{{trans('message.like')}}</span>
        </a>
        <a class="social-icon comments getReportComment" data-feed-id="{{$report['finish_tour_id']}}" data-type="comment">
            <img src="{{ asset('img/comment-black.png')}}" alt="">
            <span>{{trans('message.comment')}}</span>
        </a>
    </div>
    <div class="comments" id="tourFeed{{$report['finish_tour_id']}}">
        <div class="post-comment comment hidden" id="comment_feed_{{$report['finish_tour_id']}}">
            <div class="avatar">
                <a href="#">
                    <img class="responsive-img userProfilePhoto circle"
                    src='{{$user->avatar}}' alt="" />
                </a>
            </div>
            <div class="comment-input comment-input-with-send-option">

            </div>
        </div>
        <div class="tourComment">
            @if($tour->reportComment !=null)
                @foreach($tour->reportComment as $comment)
                    @include("admin.report.tour-comment",['comment' => $comment])

                    @php
                        $subComment = $comment->reportSubComments($comment->comment_id);
                    @endphp
                    @if(isset($subComment))
                        @foreach($subComment as $comment)
                            @include("admin.report.tour-comment",['comment' => $comment,'cls'=>'subcomment'])
                        @endforeach
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</div>
