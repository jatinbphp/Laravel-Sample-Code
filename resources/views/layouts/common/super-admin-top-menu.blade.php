<!-- BEGIN: Header-->
<header class="page-topbar" id="header">
    <div class="navbar navbar-fixed">
        <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark gradient-45deg-indigo-purple no-shadow pl-0">
            <div class="nav-wrapper">
                <div class="top-header-container-block">
                    <div class="left-part-header">
                        <div class="left-logo-block">
                            <a href="{{url('/')}}"><img src="{{asset('img/logo.png')}}"></a>
                        </div>

                        @if(session()->get('theme_type') == 'horizontal')
                            <div class="custome-nav-horizontal" id="horizontal-nav">
                                <ul class="left hide-on-med-and-down" data-menu="menu-navigation">
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
                                        <a href="{{url('admin/money')}}">
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

                                    <li>
                                        <a class="dropdown-menu" href="Javascript:void(0)" data-target="ReportDropdown">
                                            <i class="material-icons">dvr</i>
                                            <span>
                                                <span class="dropdown-title" data-i18n="Chart">
                                                    {{trans('message.reports')}}
                                                </span>
                                                <i class="material-icons right">keyboard_arrow_down</i>
                                            </span>
                                        </a>
                                        <ul class="dropdown-content dropdown-horizontal-list" id="ReportDropdown">
                                            <li data-menu="">
                                                <a href="{{url('admin/report')}}"><span data-i18n="Modern">{{ trans('message.reports')}}</span></a>
                                            </li>
                                            <li data-menu="">
                                                <a href="{{url('admin/task')}}"><span data-i18n="Modern">{{ trans('message.tasks')}}</span></a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="{{url('admin/setting')}}">
                                            <i class="material-icons">settings_applications</i>
                                            <span class="dropdown-title" data-i18n="settings_applications">
                                                {{trans('message.setting')}}
                                            </span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        @endif
                    </div>

                    <ul class="navbar-list right">
                        <li>
                            <span class="label-puncte-k"><span class="puncte-kendra">k</span>{{get_user_meta('puncte')}}ptk</span>
                        </li>
                        <li class="hide-on-med-and-down">
                            <a class="waves-effect waves-block waves-light translation-button" href="javascript:void(0);" data-target="translation-dropdown">
                                @if(App::isLocale('en'))
                                <span class="flag-icon flag-icon-gb"></span>
                                @else
                                <span class="flag-icon flag-icon-ro"></span>
                                @endif
                            </a>
                        </li>
                        <li>
                            <a class="waves-effect waves-block waves-light notification-button" href="javascript:void(0);" data-target="notifications-dropdown">
                                <i class="material-icons">notifications_none
                                <small class="notification-badge numar-notificari">0</small>
                                </i>
                            </a>
                        </li>
                        <li>
                            <a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown">
                                <span class="avatar-status avatar-online">
                                    @if(isset($adminUser))
                                        <img src='{{$adminUser->avatar}}' alt="avatar" class="userProfilePhoto" />
                                        <i></i>
                                    @else
                                        <img src='{{$user->avatar}}' alt="avatar" class="userProfilePhoto" />
                                        <i></i>
                                    @endif
                                </span>
                            </a>
                        </li>
                        <li class="view-change-btn">
                            <a class="waves-effect waves-block waves-light themeChange" href="#">
                                <i class="material-icons">format_indent_increase</i>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- translation-button-->
                <form class="" action="{{url('/locale')}}" method="post" id="form-locale">
                    @csrf
                    <input type="hidden" name="locale" id="locale">
                </form>

                <ul class="dropdown-content" id="translation-dropdown">
                    <li>
                        <a class="grey-text text-darken-1 changeLocale" data-locale="ro">
                            <i class="flag-icon flag-icon-ro"></i>{{trans('message.romania')}}
                        </a>
                    </li>
                    <li>
                        <a class="grey-text text-darken-1 changeLocale" data-locale="en">
                            <i class="flag-icon flag-icon-gb"></i>{{trans('message.english')}}
                        </a>
                    </li>
                </ul>
                <!-- notifications-dropdown-->
                <ul class="dropdown-content" id="notifications-dropdown">
                    <li>
                        <h6>{{trans('message.notifications')}}<span class="new badge numar-notificari">0</span></h6>
                    </li>
                    <li class="divider"></li>
                    <div id="show_notification">

                    </div>
                </ul>
                <!-- profile-dropdown-->
                <ul class="dropdown-content" id="profile-dropdown">
                    <li>
                        <a class="grey-text text-darken-1" href="{{url('user/profile')}}">
                            <i class="material-icons">person_outline</i>{{trans('message.profile')}}
                        </a>
                    </li>

                    <li>
                        <a class="grey-text text-darken-1 lockScreen" href="#">
                            <i class="material-icons">person_outline</i>{{trans('message.lock')}}
                        </a>
                    </li>
                    <li>
                        <a class="grey-text text-darken-1" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons">keyboard_tab</i>
                        {{trans('message.logout')}}</a>
                    </li>
                </ul>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <nav class="display-none search-sm">
                <div class="nav-wrapper">
                    <form>
                        <div class="input-field">
                            <input class="search-box-sm" type="search" required="">
                            <label class="label-icon" for="search"><i class="material-icons search-sm-icon">{{trans('message.search')}}</i></label><i class="material-icons search-sm-close">{{trans('message.close')}}</i>
                        </div>
                    </form>
                </div>
            </nav>
        </nav>
    </div>
</header>

@if(session()->get('theme_type') == 'vertical')
    <!-- BEGIN: SideNav-->
        <aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square dekstop-menu-block-main">
            <div class="brand-sidebar">
                <h1 class="logo-wrapper">
                    <a class="brand-logo darken-1" href="/">
                        <img src="{{asset('img/logo.png')}}" alt="kendrastudio logo"/>
                            <span class="logo-text hide-on-med-and-down">Kendra Unirii</span>
                    </a>
                    <a class="navbar-toggler" href="#">
                        <i class="material-icons">radio_button_checked</i>
                    </a>
                </h1>
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
                    <a href="{{url('admin/money')}}">
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
                    <a href="{{url('tasks')}}">
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
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{url('admin/setting')}}">
                        <i class="material-icons">settings_applications</i>
                        <span class="dropdown-title" data-i18n="settings_applications">
                            {{trans('message.setting')}}
                        </span>
                    </a>
                </li>

            </ul>
            <div class="navigation-background"></div>
            <a class="sidenav-trigger btn-floating btn-medium  hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
        </aside>
    <!-- END: SideNav-->
@endif
