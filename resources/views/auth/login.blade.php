<!DOCTYPE html>
<html class="loading" data-textdirection="ltr" lang="en">
    <!-- BEGIN: Head-->
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
        <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
        <meta content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" name="viewport"/>
        <title>
            User Login |  The Webcam Lab
        </title>
        <meta content="{{ csrf_token() }}" name="csrf-token"/>
        <link rel="apple-touch-icon" href="{{asset('storage/logo.png')}}" sizes="32X32">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('storage/logo.png')}}" sizes="32X32">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
        <link href="{{asset('app-assets/vendors/vendors.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('app-assets/css/themes/horizontal-menu-template/materialize.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('app-assets/css/themes/horizontal-menu-template/style.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('app-assets/css/layouts/style-horizontal.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('app-assets/css/pages/login.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('app-assets/css/custom/custom.css')}}" rel="stylesheet" type="text/css"/>
    </head>
    <!-- END: Head-->
    <body class="horizontal-layout page-header-light horizontal-menu 1-column login-bg blank-page blank-page" data-col="1-column" data-menu="horizontal-menu" data-open="click">
        <div class="row">
            <div class="col s12">
                <div class="container">
                    <div class="row" id="login-page">
                        <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
                            <form action="{{ route('login') }}" class="login-form" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="input-field col s12">
                                        <h5 class="ml-4">
                                            {{trans('message.sign_in')}}
                                        </h5>
                                    </div>
                                </div>
                                @if(Session::has('error'))
                                <div class="row">
                                    <div class="input-field col s12">
                                        <div class="card-alert card gradient-45deg-red-pink">
                                            <div class="card-content white-text">
                                                <p>
                                                    <i class="material-icons">
                                                        error
                                                    </i>
                                                    {{Session::get('error')}}
                        @php
                          Session::put("error","");
                        @endphp
                                                </p>
                                            </div>
                                            <button aria-label="Close" class="close white-text" data-dismiss="alert" type="button">
                                                <span aria-hidden="true">
                                                    ×
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="row margin">
                                    <div class="input-field col s12 k-input-text">
                                        <label class="center-align" for="username">
                                            {{trans('message.email')}}
                                            <span>
                                                *
                                            </span>
                                        </label>
                                        <input class="k-txt-box" id="email" name="email" type="text">
                                            {!! $errors->first('email','
                                            <span class="error k-error">
                                                :message
                                            </span>
                                            ') !!}
                                        </input>
                                    </div>
                                </div>
                                <div class="row margin">
                                    <div class="input-field col s12 k-input-text">
                                        <label for="password">
                                            {{trans('message.password')}}
                                            <span>
                                                *
                                            </span>
                                        </label>
                                        <input class="k-txt-box" id="password" name="password" type="password">
                                            {!! $errors->first('password','
                                            <span class="error k-error">
                                                :message
                                            </span>
                                            ') !!}
                                        </input>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m12 l12 ml-2 mt-1">
                                        <p style="margin-left: 6px;">
                                            <label class="k-checkbox-fill">
                                                <input class="filled-in" type="checkbox"/>
                                                <span style="padding-left: 40px;">
                                                    {{trans('message.remember_me')}}
                                                </span>
                                            </label>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <button class=" btn k-button-fill k-btn-normal col s12" type="submit">
                                            {{trans('message.login')}}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{asset('js/jquery-3.5.1.min.js')}}" type="text/javascript">
        </script>
        <script src="{{asset('app-assets/js/vendors.min.js')}}" type="text/javascript">
        </script>
        <script src="{{asset('app-assets/js/plugins.js')}}" type="text/javascript">
        </script>
        <script src="{{asset('app-assets/js/custom/custom-script.js')}}" type="text/javascript">
        </script>
    </body>
</html>
