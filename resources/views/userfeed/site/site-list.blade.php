@if($onlineVideoSite != null)
    @foreach($onlineVideoSite as $key => $site)
        <div class="content-box-row active-chat-box" id="hideRow{{$site->id}}">
            @include("userfeed.site.site",['site'=> $site])
        </div>
    @endforeach
@endif

@if($offlineVideoSite != null)
    @foreach($offlineVideoSite as $key => $site)
        <div class="content-box-row deactive-chat-box" id="hideRow{{$site->id}}">
            @include("userfeed.site.site",['site'=> $site])
        </div>
    @endforeach
@endif
