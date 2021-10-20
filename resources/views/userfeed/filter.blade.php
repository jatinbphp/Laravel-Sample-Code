@if(count($userfeeds) > 0)
    @foreach($userfeeds as $userfeed)
        @include("userfeed.feed",['userfeed' => $userfeed])
    @endforeach
@elseif(isset($res) && !$res)
    <div class="post-wrapper card card-border noUserFeed">
        <div class="author-data">
            <div class="avatar">
                <a href="{{url('userfeed/$user->secret_id')}}"  target="_blank">
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
    <div class="post-wrapper card card-border noUserFeed">
        <div class="author-data">
            <div class="avatar">
                <a href="{{url('userfeed/$user->secret_id')}}"  target="_blank">
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
