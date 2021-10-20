<li>
    <a href="{{url('/')}}">
        <i class="material-icons">settings_applications</i>
        <span class="dropdown-title" data-i18n="settings_applications">
            {{trans('message.legal')}}
        </span>
    </a>
</li>

@if($userRoleName =="Super Admin" && $userId != "2")
    <li>
        <a href="{{url('people')}}">
            <i class="material-icons">people_outline</i>
            <span class="dropdown-title" data-i18n="people_outline">
                {{trans('message.people')}}
            </span>
        </a>
    </li>
@endif
