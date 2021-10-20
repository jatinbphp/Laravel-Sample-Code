<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square mobile-menu-block-main" >
    <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="/"><img src="{{asset('img/logo.png')}}" alt="kendrastudio logo"/><span class="logo-text hide-on-med-and-down">Kendra Unirii</span></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
    </div>
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
        <li>
            <a href="{{url('/')}}">
                <i class="material-icons">dashboard</i>
                <span class="dropdown-title" data-i18n="Dashboard">
                    {{trans('message.dashboard')}}
                </span>
            </a>
        </li>

        <li>
            <a href="{{url('newsfeed')}}">
                <i class="material-icons">cast</i>
                <span class="dropdown-title" data-i18n="newsfeed">
                    {{trans('message.newsfeed')}}
                </span>
            </a>
        </li>

        <li>
            <a href="{{url('admin/payment')}}">
                <i class="material-icons">payment</i>
                <span class="dropdown-title" data-i18n="payment">
                    {{trans('message.money')}}
                </span>
            </a>
        </li>

        <li>
            <a href="{{url('booking')}}">
                <i class="material-icons">schedule</i>
                <span class="dropdown-title" data-i18n="schedule">
                    {{trans('message.schedule')}}
                </span>
            </a>
        </li>

        <li>
            <a href="{{url('task')}}">
                <i class="material-icons">format_list_numbered</i>
                <span class="dropdown-title" data-i18n="schedule">
                    {{trans('message.tasks')}}
                </span>
            </a>
        </li>

        <li>
            <a href="{{url('file-manager')}}">
                <i class="material-icons">folder_shared</i>
                <span class="dropdown-title" data-i18n="files">
                    {{trans('message.files')}}
                </span>
            </a>
        </li>

        <li>
            <a href="{{url('communication')}}">
                <i class="material-icons">voice_chat</i>
                <span class="dropdown-title" data-i18n="communication">
                    {{trans('message.communication')}}
                </span>
            </a>
        </li>

        <li>
            <a href="{{url('knowledge')}}">
                <i class="material-icons">book</i>
                <span class="dropdown-title" data-i18n="manuals">
                    {{trans('message.manuals')}}
                </span>
            </a>
        </li>

        <li>
            <a href="{{url('people')}}">
                <i class="material-icons">people</i>
                <span class="dropdown-title" data-i18n="people">
                    {{trans('message.people')}}
                </span>
            </a>
        </li>

        <li class="bold">
            <a class="collapsible-header waves-effect waves-cyan" href="JavaScript:void(0)">
                <i class="material-icons">dvr</i>
                <span class="menu-title" data-i18n="Dashboard">
                    {{trans('message.reports')}}
                </span>
                <span class="badge badge pill orange float-right mr-10">
                    1
                </span>
            </a>
            <div class="collapsible-body">
                <ul class="dropdown-content dropdown-horizontal-list" id="accordion">
                    <li data-menu="">
                        <a href="{{url('admin/report')}}"><span data-i18n="Modern">{{ trans('message.reports')}}</span></a>
                    </li>
                    <li data-menu="">
                        <a href="{{url('admin/task')}}"><span data-i18n="Modern">{{ trans('message.tasks')}}</span></a>
                    </li>

                    <li data-menu="">
                        <a href="{{url('admin/activity')}}"><span data-i18n="Modern">{{ trans('message.activity_log')}}</span></a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
    <div class="navigation-background"></div>
    <a class="sidenav-trigger btn-floating btn-medium  hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>
