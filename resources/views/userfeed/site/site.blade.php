<div class="left-img-box">
    <img src="{{$site->videosite->image}}">
</div>
<div class="right-img-box">
    <a href="{{$site->videosite->link}}" target="_blank" class="freemium-link">{{$site->videosite->name}}</a>
    <p>{{trans('message.user')}}: <span>{{$site->username}}</span></p>
    <p>{{trans('message.password')}}: <span>{{$site->password}}</span></p>
    <ul>
        <li class="btn-link">
            <a href="#">Login</a>
        </li>
        <li class="social-link">
            <a class="editSiteRow" data-id="{{$site->id}}">
                <img src="{{ asset('img/edit.png')}}">
            </a>
        </li>
        <li class="social-link">
            <a class="hideSiteRow" data-id="{{$site->id}}">
                <img src="{{ asset('img/delete.png')}}">
            </a>
        </li>
    </ul>
</div>
