<div class="post-data">
    <div class="card-content">
        <p>{!!$report['content']!!}</p>
    </div>
    <div class="card-image">
        @if($report['url'])
        <a data-fancybox="gallery" href="{{$report['url']}}"><img src="{{$report['url']}}"></a>
        @endif
    </div>
    <div class="card-content">
        @if($report['files'] || $report['video'])
           {{trans('message.attached_files')}}
        @endif
        @if($report['files'])
            <p class="card-files">
                <a class="fancyPdf" href="{{$report['files']}}">
                    <i class="material-icons dp48"> {{trans('message.attachment')}}</i>
                    <span>
                        {{basename($report['files'])}}
                    </span>
                </a>
            </p>
        @endif
        @if($report['video'])
            <p class="card-files">
                <a data-fancybox href="{{$report['video']}}">
                    <i class="material-icons dp48">{{trans('message.attachment')}}</i>
                    <span>
                        {{basename($report['video'])}}
                    </span>
                </a>
            </p>
        @endif

        @if(count(get_tour_upload_file($userId,$report['tour_id'])) > 0 && $report['type']=='observation_report')
            Public Files
            @foreach(get_tour_upload_file($userId,$report['tour_id']) as $key => $file)
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

        <a class="social-icon likes newsFeedLike" data-group="{{$report['group_id']}}"
                value="{{$report['nr_like']}}" id="{{$report['id']}}" id="newsfeed_like_{{$report['id']}}">
            <div class="social-icon likes" id="newsfeed_like_{{$report['id']}}">
                <img src="{{ asset('img/icon-heart.png')}}" alt="">
                <span id="newsfeed_like_{{$report['id']}}">
                    {{$report['nr_like']}}
                </span>
            </div>
        </a>

        <a class="social-icon comments getNewsFeedComment" data-feed-id="{{$report['id']}}" data-type="comment">
            <div class="social-icon comments">
                <img src="{{ asset('img/icon-comment.png')}}" alt="">
                <span id="newsfeed_comment_{{$report['id']}}">
                    {{$report['comment_count']}}
                </span>
            </div>
        </a>
    </div>

    <div class="comments">
        <div class="post-comment comment hidden" id="comment_feed_{{$report['id']}}">
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
            @if(isset($report['blog_comment']))
                @foreach($report['blog_comment'] as $comment)
                    @include("admin.report.comment",['comment' => $comment])

                    @if(isset($comment['blog_sub_comment']))
                        @foreach($comment['blog_sub_comment'] as $comment)
                            @include("admin.report.comment",['comment' => $comment,'cls'=>'subcomment'])
                        @endforeach
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</div>
