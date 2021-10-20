<!DOCTYPE html>
<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <meta charset=UTF-8>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>
        {{getPageTitle()}}
    </title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="apple-touch-icon" href="{{getFavicon()}}" sizes="32X32">
    <link rel="shortcut icon" type="image/x-icon" href="{{getFavicon()}}" sizes="32X32">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- BEGIN: VENDOR MAIN CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/vendors.min.css')}}">
    <!-- END: VENDOR MAIN CSS-->

    <!-- BEGIN: THEME Level CSS-->
    @if(session()->get('theme_type') == 'vertical')
        <!-- vertical -->
            <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/vertical-modern-menu-template/materialize.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/vertical-modern-menu-template/style.min.css')}}">
        <!-- vertical -->
    @else
        <!-- horizontal -->
            <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/horizontal-menu-template/materialize.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/horizontal-menu-template/style.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/layouts/style-horizontal.css')}}">
        <!-- horizontal -->
    @endif


    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/dropify/css/dropify.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/chat.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/animate-css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/chartist-js/chartist.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/chartist-js/chartist-plugin-tooltip.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/flag-icon/css/flag-icon.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css"
        href="{{asset('app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/jkanban/jkanban.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/quill/quill.snow.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-kanban.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/custom/custom.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-sidebar.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-contacts.css')}}">
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
    <link rel="stylesheet" href="{{asset('app-assets/vendors/fancybox/jquery.fancybox.min.css')}}" />
    <!-- END: THEME  CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/css/select.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/data-tables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/daterangepicker.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{asset('css/feed.css')}}" />
    <!-- BEGIN: Page Level CSS-->

    @stack('css')
    <!-- END: Page Level CSS-->

    <style type="text/css">
        .pos-btn {
            position: fixed;
            bottom: 45px;
            right: 20px;
            z-index: 9;
            width: fit-content;
            width: -webkit-fit-content;
            width: -moz-fit-content;
            width: -ms-fit-content;
            width: -o-fit-content;
            height: fit-content;
            height: -webkit-fit-content;
            height: -moz-fit-content;
            height: -ms-fit-content;
            height: -o-fit-content;
        }
        .pos-btn a.btn-pos {
            display: inline-block;
            width: auto;
            height: 48px;
            line-height: 48px;
            padding: 0px 16px;
            text-align: center;
            background-color: rgb(79, 59, 170);
            color: #fff;
            font-size: 18px;
            border-radius: 5px;
            box-shadow: 0px 3px 8.46px 0.54px rgb(0 0 0 / 24%);
            text-transform: unset;
        }
        .police-cnt-main {
            width: 98%;
            height: 750px;
            margin: 20px auto;
            padding: 10px;
            display: flex;
            flex-wrap: wrap;
            flex-flow: column;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 5px 9px 1px rgb(0 0 0 / 10%);
            overflow-y: scroll;
        }
        /*#main.police-height-for {
            min-height: auto;
        }*/
        footer.pos-fix {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .police-align-center {
            width: 100%;
            height: 100%;
            display: flex;
            flex-wrap: wrap;
            flex-flow: column;
            align-items: center;
            justify-content: center;
            //padding-bottom: 51px;
        }

        .k-input-text {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 5px 9px 1px rgb(0 0 0 / 10%);
        }
    </style>
</head>
<!-- END: Head-->

<body class="sidebar-true">

@if(session()->get('theme_type') == 'vertical')
    <div class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 2-columns  app-page " data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">
@else
    <div class="horizontal-layout page-header-light page-header-dark horizontal-menu preload-transitions 2-columns   " data-open="click" data-menu="horizontal-menu" data-col="2-columns">
@endif

        <div id="main" class="police-height-for">
            <div id="loading" class="loader hidden">
                <p><img src="{{asset('img/ajax-loader.gif')}}" /></p>
            </div>
            <div class="police-align-center">
                <div class="police-cnt-main">
                {!! stripslashes($content) !!}
                </div>
                @if ($contract->sign == "" && $contract->is_sign != "2" && $contract->pdf_path == "")
                    <div class="pos-btn">
                        <a class="btn btn-pos k-button-fill signContract" href="Javascript:;" data-key="{{$contractKey}}">
                            {{trans('message.agree')}}
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <div class="overlay-layer hidden"></div>
        <div id="modal-sign-contract" class="modalx bottom-sheet hidden modal-custom modal-small">
            <div class="modal-header">
                <h4 class="k-h4 modalTitle">{{trans('message.sign')}} {{trans('message.contract')}}</h4>
                <div class="buttons-group">
                    <a href="#" class="close-sign-contract"><img src="{{asset('img/icon-close.png')}}" alt=""></a>
                </div>
            </div>
            <div class="modalx-content">

            </div>
        </div>
    </div>

<script type="text/javascript">
    var publicPath = "{!! URL::to('/'); !!}/";
</script>

<script src="{{asset('js/jquery-3.5.1.min.js')}}" type="text/javascript"></script>

<script src="{{asset('app-assets/js/vendors.min.js')}}" type="text/javascript"></script>

<script src="{{asset('app-assets/js/materialize.min.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/advance-ui-modals.min.js')}}"></script>

<script src="{{asset('app-assets/js/plugins.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/search.js')}}" type="text/javascript"></script>

<script src="{{asset('app-assets/js/custom/custom-script.js')}}" type="text/javascript"></script>

<script src="{{asset('app-assets/vendors/sweetalert/sweetalert.min.js')}}"></script>

<script src="{{asset('js/signature_pad.min.js')}}"></script>

<script src="{{asset('js/sign.js')}}" type="text/javascript"></script>

</body>
</html>
