<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square mobile-menu-block-main" >
    <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="/"><img src="{{asset('img/logo.png')}}" alt="kendrastudio logo"/><span class="logo-text hide-on-med-and-down">Kendra Unirii</span></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
    </div>
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow main-menu-open main-Mobile-Menu" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
        @hasanyrole('Super Admin')
            <li class="bold mobileMenu">
                <ul id="menu-5" class="{{getTabCls()}} collapsible collapsible-sub" data-collapsible="accordion">
                    <li class="tab mobileMenu">
                        <a href="@if(url()->current() != url('superadmin')){{url('superadmin')}}@endif#first" class="collapsible-header" href="JavaScript:void(0)">
                            <i class="material-icons">collections_bookmark</i>
                            <span class="dropdown-title" data-i18n="collections_bookmark">
                                {{trans('message.agencies')}}
                            </span>
                        </a>
                    </li>
                    <li class="tab mobileMenu">
                        <a href="@if(url()->current() != url('superadmin')){{url('superadmin')}}@endif#second" class="collapsible-header" href="JavaScript:void(0)">
                            <i class="material-icons">view_list</i>
                            <span class="dropdown-title" data-i18n="view_list">
                                {{trans('message.invoices')}}
                            </span>
                        </a>
                    </li>
                    @if($userId != "2")
                        <li class="tab mobileMenu">
                            <a href="@if(url()->current() != url('superadmin')){{url('superadmin')}}@endif#third" class="collapsible-header" href="JavaScript:void(0)">
                                <i class="material-icons">account_circle</i>
                                <span class="dropdown-title" data-i18n="account_circle">
                                    {{trans('message.setting')}}
                                </span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endrole

        @hasanyrole('Agency Admin')
            <li class="bold mobileMenu">
                <ul id="menu-5" class="{{getTabCls()}} collapsible collapsible-sub" data-collapsible="accordion">
                    <li class="tab mobileMenu">
                        <a href="@if(url()->current() != url('agencyadmin')){{url('agencyadmin')}}@endif#first" class="collapsible-header" href="JavaScript:void(0)">
                            <i class="material-icons">photo_filter</i>
                            <span class="dropdown-title" data-i18n="photo_filter">
                                {{trans('message.studios')}}
                            </span>
                        </a>
                    </li>
                    <li class="tab mobileMenu">
                        <a href="@if(url()->current() != url('agencyadmin')){{url('agencyadmin')}}@endif#second" class="collapsible-header" href="JavaScript:void(0)">
                            <i class="material-icons">view_list</i>
                            <span class="dropdown-title" data-i18n="view_list">
                                {{trans('message.invoices')}}
                            </span>
                        </a>
                    </li>
                    <li class="tab mobileMenu">
                        <a href="@if(url()->current() != url('agencyadmin')){{url('agencyadmin')}}@endif#third" class="collapsible-header" href="JavaScript:void(0)">
                            <i class="material-icons">account_circle</i>
                            <span class="dropdown-title" data-i18n="account_circle">
                                {{trans('message.setting')}}
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
        @endrole

        @hasanyrole('Training Admin')
            <li class="bold mobileMenu">
                <ul id="menu-5" class="{{getTabCls()}} collapsible collapsible-sub" data-collapsible="accordion">
                    <li class="tab mobileMenu">
                        <a href="@if(url()->current() != url('studioadmin')){{url('studioadmin')}}@endif#first" class="collapsible-header" href="JavaScript:void(0)">
                            <i class="material-icons">line_style</i>
                            <span class="dropdown-title" data-i18n="line_style">
                                {{trans('message.contract')}}
                            </span>
                        </a>
                    </li>
                    <li class="tab mobileMenu">
                        <a href="@if(url()->current() != url('studioadmin')){{url('studioadmin')}}@endif#second" class="collapsible-header" href="JavaScript:void(0)">
                            <i class="material-icons">view_list</i>
                            <span class="dropdown-title" data-i18n="view_list">
                                {{trans('message.invoices')}}
                            </span>
                        </a>
                    </li>
                    <li class="tab mobileMenu">
                        <a href="@if(url()->current() != url('studioadmin')){{url('studioadmin')}}@endif#third" class="collapsible-header" href="JavaScript:void(0)">
                            <i class="material-icons">account_circle</i>
                            <span class="dropdown-title" data-i18n="account_circle">
                                {{trans('message.setting')}}
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
        @endrole

        @hasanyrole('Spaces Admin')
            <li class="bold mobileMenu">
                <a class="collapsible-header mobileMenu" href="JavaScript:void(0)">
                    <i class="material-icons">settings_applications</i>
                    <span class="dropdown-title" data-i18n="settings_applications">
                        {{trans('message.legal')}}
                    </span>
                </a>
            </li>
        @endrole
    </ul>
    <div class="navigation-background"></div>
    <!-- <a class="sidenav-trigger btn-floating btn-medium  hide-on-large-only main-toggle" href="#" data-target="slide-out"> -->
        <a class="sidenav-trigger myMobile btn-floating btn-medium  hide-on-large-only main-toggle" href="#" data-target="slide-out">
        <i class="material-icons menu-icon"></i></a>
</aside>
