@if(count($posts) > 0)
    @foreach($posts as $post)
        @include("profile.post",['post' => $post])
    @endforeach
@elseif(isset($res) && !$res)
    <div class="post-wrapper card card-border noPost">
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
    <div class="post-wrapper card card-border noPost">
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
