@if(count($finalData) > 0)
    @foreach($finalData as $report)
    <div class="post-wrapper" id="feedarea{{$report['id']}}">
        <div class="author-data">
            <div class="avatar">
                @if($user->secret_id == $report['secret_id'])
                    <a href="{{url('user/profile')}}" target="_blank">
                @else
                    <a href="{{url('userfeed/'.$report['secret_id'])}}" target="_blank">
                @endif
                    <img class="responsive-img userProfilePhoto circle" src="{{$report['user_avatar']}}" alt="">
                </a>
            </div>
            <div class="info">
                <p>
                @if(isset($report['add_by_user_id']))
                    @if($user->secret_id == $report['add_by_secret_id'])
                        <a href="{{url('user/profile')}}" target="_blank">
                    @else
                        <a href="{{url('userfeed/'.$report['add_by_secret_id'])}}" target="_blank">
                    @endif
                    {{$report['add_by_user_name']}}</a> {{trans('message.has_posted_into')}} <a href="{{url('userfeed/'.$report['secret_id'])}}" target="_blank">{{$report['user_name']}}</a> {{trans('message.timeline')}}.
                @elseif($user->secret_id == $report['secret_id'])
                    <a href="{{url('user/profile')}}" target="_blank">{{$report['user_name']}}</a> {{trans('message.added_a_new_post')}}.
                @else
                    <a href="{{url('userfeed/'.$report['secret_id'])}}" target="_blank">{{$report['user_name']}}</a> {{trans('message.added_a_new_post')}}.
                @endif
                </p>
                <span>{{$report['post_date']}}</span></p>
            </div>
        </div>
        @if($report['feed_type'] == 'feed')
            @include("admin.report.feed",['$report' => $report])
        @else
            @include("admin.report.tour",['$report' => $report])
        @endif
    </div>
    
    @endforeach
@elseif(isset($res) && !$res)
    <div class="post-wrapper card card-border noAdminReport">
        <div class="author-data">
            <div class="avatar">
                <a href="#">
                    <img class="responsive-img userProfilePhoto circle" src='{{$user->avatar}}' alt="">
                </a>
            </div>
            <div class="post-data">
                <div class="card-content">
                    {{trans('message.no_result_was_found')}}
                </div>
            </div>
        </div>
    </div>
@else
    <div class="post-wrapper card card-border noAdminReport">
        <div class="author-data">
            <div class="avatar">
                <a href="#">
                    <img class="responsive-img userProfilePhoto circle" src='{{$user->avatar}}' alt="">
                </a>
            </div>
            <div class="post-data">
                <div class="card-content">
                    {{trans('message.please_add_your_first_post')}}
                </div>
            </div>
        </div>
    </div>
@endif
