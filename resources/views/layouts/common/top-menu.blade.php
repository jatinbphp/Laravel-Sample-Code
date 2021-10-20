<!-- BEGIN: Header-->
<header class="page-topbar" id="header">
    <div class="navbar navbar-fixed">
        <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark gradient-45deg-indigo-purple no-shadow pl-0">
            <div class="nav-wrapper">
                <div class="top-header-container-block">
                    <div class="left-part-header">
                        <!-- <div class="left-logo-block">
                            <a href="{{url('/')}}">
                                <img src="{{getThemeLogo()}}">
                            </a>
                        </div> -->
                        @if(session()->get('theme_type') == 'horizontal')
                            <div class="custome-nav-horizontal" id="horizontal-nav">
                                <ul class="left hide-on-med-and-down" data-menu="menu-navigation">
                                    @include("layouts.common.menu-list")
                                </ul>
                            </div>
                        @endif
                    </div>

                    <ul class="navbar-list right">
                        <li>
                            <a class="notification-button" href="javascript:void(0);" data-target="notifications-dropdown">
                                <i class="material-icons">notifications_none
                                <small class="notification-badge numar-notificari">0</small>
                                </i>
                            </a>
                        </li>
                        <li>
                            <a class="profile-button" href="javascript:void(0);" data-target="profile-dropdown">
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
                    </ul>
                </div>

                <!-- translation-button-->
                <!-- <form class="" action="{{url('/locale')}}" method="post" id="form-locale">
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
                </ul> -->
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

                    @if(isset($user) && $user->role_id != "3")
                        <!-- <li>
                            <a class="grey-text text-darken-1 gmailConfig" href="#">
                                <i class="material-icons">email</i>{{trans('message.gmail_config')}}
                            </a>
                        </li> -->
                    @endif

                    @if(isset($user) && $user->role_id == "1" && $user->id != '2')
                        <li>
                            <a class="grey-text text-darken-1 downloadDatabase" href="#"><i class="material-icons">file_download</i>
                                Download DB
                            </a>
                        </li>
                    @endif

                    <li>
                        <a class="grey-text text-darken-1 lockScreen" href="#">
                            <i class="material-icons">person_outline</i>{{trans('message.lock')}}
                        </a>
                    </li>
                    <li>
                        @if(Auth::user()->isImpersonating())
                            <a class="grey-text text-darken-1" href="#" onclick="event.preventDefault(); document.getElementById('impersonate-form').submit();"><i class="material-icons">keyboard_tab</i>
                        @else
                            <a class="grey-text text-darken-1" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons">keyboard_tab</i>
                        @endif
                        {{trans('message.logout')}}</a>
                    </li>
                </ul>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <form id="impersonate-form" action="{{ route('impersonate.stop')}}" method="POST" style="display: none;">
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
                @include("layouts.common.menu-list")
            </ul>
            <div class="navigation-background"></div>
            <a class="sidenav-trigger btn-floating btn-medium  hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
        </aside>
    <!-- END: SideNav-->
@endif
