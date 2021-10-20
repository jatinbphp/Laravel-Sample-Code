<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <meta charset=UTF-8>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{getPageTitle()}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="apple-touch-icon" href="{{getFavicon()}}" sizes="32X32">
    <link rel="shortcut icon" type="image/x-icon" href="{{getFavicon()}}" sizes="32X32">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/vendors.min.css')}}">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/horizontal-menu-template/materialize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/horizontal-menu-template/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/layouts/style-horizontal.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/lock.css')}}">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/custom/custom.css')}}">
    <!-- END: Custom CSS-->
    <!-- END: THEME  CSS-->

    <!-- BEGIN: Page Level CSS-->
    @stack('css')
    <!-- END: Page Level CSS-->

    <!-- BEGIN VENDOR JS-->
    <script src="{{asset('app-assets/js/vendors.min.js')}}"></script>
    <!-- BEGIN VENDOR JS-->
</head>
<!-- END: Head-->

<body class="horizontal-layout page-header-light horizontal-menu preload-transitions 1-column forgot-bg blank-page" data-open="click" data-menu="horizontal-menu" data-col="1-column">

    <div class="horizontal-layout page-header-light horizontal-menu preload-transitions 1-column forgot-bg blank-page">
        <div class="row">
            <div class="col s12">
                <div class="container">
                    <div id="lock-screen" class="row">
                        <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 forgot-card bg-opacity-8">
                            <form class="lock-form" name="lock-form" id="lock-form" method="post" action="{{route('unlock')}}">
                                @csrf
                                <div class="row">
                                    <div class="input-field col s12 center-align mt-10">
                                        <img class="z-depth-4 circle responsive-img" width="100" src="{{ Auth::user()->avatar }}" alt="">
                                        <h5>{{ Auth::user()->name }}</h5>
                                    </div>
                                </div>
                                <div class="row margin">
                                    <div class="input-field col s12 k-input-text @if($errors->any()) k-input-error  @endif ">
                                        <label for="password">{{trans('message.password')}}</label>
                                        <input id="password" type="password" name="password" class="validate k-txt-box">
                                        {!! $errors->first('password','<span class="error k-error">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <button type="submit" class=" btn k-button-fill k-btn-normal col s12">{{trans('message.login')}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="content-overlay"></div>
            </div>
        </div>
    </div>

    <!-- END THEME  JS-->
</body>

</html>
