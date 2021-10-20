<!DOCTYPE html>
<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <meta charset=UTF-8>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" /> -->

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
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('css/chat.css')}}"> -->
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

    <link rel="stylesheet" type="text/css" href="{{asset('nprogress/nprogress.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/custom/jquery.mCustomScrollbar.min.css')}}">

    <!-- BEGIN: Page Level CSS-->
    @stack('css')
    <!-- END: Page Level CSS-->

    @livewireStyles
</head>
<!-- END: Head-->

<body class="sidebar-true rangePicker @if(isset($isProfile)) profile-block-filter @endif">

@if(session()->get('theme_type') == 'vertical')
    <div class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 2-columns  app-page " data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">
@else
    <div class="horizontal-layout page-header-light page-header-dark horizontal-menu preload-transitions 2-columns   " data-open="click" data-menu="horizontal-menu" data-col="2-columns">
@endif

    @include("layouts.common.top-menu")
    @include("layouts.common.mobile-menu")

    <!-- BEGIN: Page Main-->
    <div id="main">
        <div id="loading" class="loader hidden">
            <p></p>
        </div>

        @include('modals.add-modals')

        <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <!-- Account settings -->
                    <div class="top-profile-content-block newsfeeds-profile">
                        <div class="row display-flex">
                            <div class="col sidebar-left sidebar-fixed">
                                <div class="sidebar">
                                    <div class="sidebar-content">
                                        <div class="sidebar-header">
                                            <div class="sidebar-details">
                                                <div class="breadcrumbs-dark p-0 mt-0" id="breadcrumbs-wrapper">
                                                    <h5 class="breadcrumbs-title mt-0 mb-0">
                                                        <a href="{{url('/')}}" class="homeicon">
                                                            <i class="material-icons">home</i>
                                                        </a>
                                                        <span>
                                                            @if(isset($isUserFeed))
                                                                {{$realName}}
                                                            @else
                                                                {{$breadcrumb}}
                                                            @endif
                                                        </span>
                                                    </h5>
                                                    <ol class="breadcrumbs mb-0 mt-2">
                                                        <li class="breadcrumb-item">
                                                            <a href="{{url('/')}}">Dashboard</a>
                                                        </li>
                                                        <li class="breadcrumb-item active">
                                                            {{$breadcrumb}}
                                                        </li>
                                                    </ol>
                                                </div>

                                                @if(isset($isProfile))
                                                    <div class="row valign-wrapper mt-2 pt-2 animate fadeLeft">
                                                        <div class="col s3">
                                                            <img src="{{$user->avatar}}" alt="" class=" userProfilePhoto circle z-depth-2 responsive-img">
                                                            <!-- notice the "circle" class -->
                                                        </div>
                                                        <div class="col s9">
                                                            <p class="m-0 subtitle font-weight-700">{{$user->name}}</p>
                                                            <p class="m-0 text-muted">{{$user->email}}</p>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col right-new-filter">
                                <div class="top-filter-block-main-new filterBarDiv">
                                    @yield('filter')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @yield('content')

        @yield('shortIcon')

        @if(isset($user) && $user->signature == "" && url()->current() != url('user/profile') && in_array($user->role_id,['1','2','3','4']))
            <div class="overlay-layer" id="overlay-layer"></div>
            <div id="modal-sign-contract" class="modalx bottom-sheet modal-custom modal-small">
                <div class="modal-header">
                    <h4 class="k-h4 modalTitle">{{trans('message.user')}} {{trans('message.signature')}}</h4>
                </div>
                <div class="modalx-content">
                    <form id="form-user-sign" name="form-user-sign" class="display-flex flex-column h-100 justify-content-between" enctype="multipart/form-data">
                      <div class="input-field col s12 k-input-text">
                        <canvas id="signature-pad" class="signature-pad" width="450" height="300">
                        </canvas>
                        <span class="error k-error" id="image_error"></span>
                      </div>
                      <div class="row">
                        <div class="input-field col s6">
                          <div class="modal_button_center">
                            <button class="action-btn  btn k-button-fill k-icon" type="submit" id="btnSignature" name="signature">
                              {{trans('message.sign')}}
                            </button>
                          </div>
                        </div>
                        <div class="input-field col s6">
                          <div class="modal_button_center">
                            <button class="action-btn  btn k-button-fill k-icon" id="clearUserSignature" type="button" name="clear-signature">
                              {{trans('message.clear')}}
                            </button>
                          </div>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        @endif
    </div>
    <!-- END: Page Main-->
</div>

<script type="text/javascript">
    var publicPath = "{!! URL::to('/'); !!}/";
    var rolePath = "{!! getRolePath(); !!}/";
    var date="@php echo date('Y-m-d') @endphp";
    var are_you_sure = "{{trans('message.are_you_sure')}}";
    var you_want_remove_this_filter = "{{trans('message.you_want_remove_this_filter')}}";
    var you_want_to_delete_this_comment = "{{trans('message.you_want_to_delete_this_comment')}}";
    var you_want_to_delete_the_filters = "{{trans('message.you_want_remove_this_filter')}}";
    var do_you_want_to_complete_this_task = "{{trans('message.do_you_want_to_complete_this_task')}}";
    var you_want_to_delete_your_filters = "{{trans('message.you_want_to_delete_your_filters')}}";
    var that_you_want_to_close_the_current_shift = "{{trans('message.that_you_want_to_close_the_current_shift')}}";
    var your_comment_has_been_deleted = "{{trans('message.your_comment_has_been_deleted')}}";
    var you_want_to_change_payment_status = "{{trans('message.you_want_to_change_payment_status')}}";
    var you_want_to_delete_your_payment_request = "{{trans('message.you_want_to_delete_your_payment_request')}}";
    var there_is_no_person_at_work_on_the_selected_date = "{{trans('message.there_is_no_person_at_work_on_the_selected_date')}}";
    var task_added_successfully = "{{trans('message.task_added_successfully')}}";
    var please_dont = "{{trans('message.please_dont')}}";
    var yes_delete_it = "{{trans('message.yes_delete_it')}}";
    var yes_close_it = "{{trans('message.yes_close_it')}}";
    var not = "{{trans('message.not')}}";
    var yes = "{{trans('message.yes')}}";
    var the_text_of_the_general_remarks_is_missing = "{{trans('message.the_text_of_the_general_remarks_is_missing')}}";
    var You_want_to_cancel_this_interview = "{{trans('message.You_want_to_cancel_this_interview')}}";
    var are_you_sure_shift_unapprove = "{{trans('message.are_you_sure_shift_unapprove')}}";
    var are_you_sure_cleaning = "{{trans('message.are_you_sure_cleaning')}}";
    var comments_successfully_added = "{{trans('message.comments_successfully_added')}}";
    var site_notice = "{{trans('message.site_notice')}}";
    var there_is_no_person_at_work_on_the_selected_date = "{{trans('message.there_is_no_person_at_work_on_the_selected_date')}}";
    var you_want_to_delete_task = "{{trans('message.you_want_to_delete_task')}}";
    var you_want_to_delete = "{{trans('message.you_want_to_delete')}}";
    var you_want_to_change_status = "{{trans('message.you_want_to_change_status')}}";
    var cancel_request = "{{trans('message.cancel_request')}}";
    var you_want_to_change_this_theme = "{{trans('message.you_want_to_change_this_theme')}}";
    var you_want_to_lock_screen = "{{trans('message.you_want_to_lock_screen')}}";
    var edit = "{{trans('message.edit')}}";
    var task = "{{trans('message.task')}}";
    var update = "{{trans('message.update')}}";
    var add = "{{trans('message.add')}}";
    var view = "{{trans('message.view')}}";
    var send = "{{trans('message.send')}}";
    var accept = "{{trans('message.accept')}}";
    var request = "{{trans('message.request')}}";
    var deletes = "{{trans('message.delete')}}";
    var payments = "{{trans('message.payment')}}";
    var you_want_book_this_shift = "{{trans('message.you_want_book_this_shift')}}";
    var you_want_to_add = "{{trans('message.you_want_to_add')}}";
    var as_holiday_for = "{{trans('message.as_holiday_for')}}";
    var you_want_to_remove_this_row = "{{trans('message.you_want_to_remove_this_row')}}";
    var you_want_to_block = "{{trans('message.you_want_to_block_this_member')}}";
    var you_want_to_delete_your_emails = "{{trans('message.you_want_to_delete_your_emails')}}";
    var you_want_remove_this_video_site = "{{trans('message.you_want_remove_this_video_site')}}";
    var you_want_make_payment = "{{trans('message.you_want_make_payment')}}";
    var you_want_to_reject_salary_loan = "{{trans('message.you_want_to_reject_salary_loan')}}";
    var you_want_to_approve_salary_loan = "{{trans('message.you_want_to_approve_salary_loan')}}";
</script>

<script src="{{asset('js/jquery-3.6.0.min.js')}}" type="text/javascript"></script>

<script src="{{asset('app-assets/js/vendors.min.js')}}" type="text/javascript"></script>

<script src="{{asset('js/materialize.min.js')}}" type="text/javascript"></script>

<script type="text/javascript" src="{{asset('js/preload.js')}}" type="text/javascript" />

<script src="{{asset('app-assets/js/scripts/advance-ui-modals.min.js')}}"></script>

<script src="{{asset('app-assets/js/plugins.js')}}" type="text/javascript"></script>


<script src="{{asset('app-assets/js/search.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/dropify/js/dropify.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/custom/custom-script.js')}}" type="text/javascript"></script>
<!-- <script src="{{asset('js/chat.js')}}" type="text/javascript"></script> -->

<script src="{{asset('app-assets/vendors/dropify/js/dropify.min.js')}}"></script>

<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/dataTables.responsive.min.js')}}"></script>

<script src="{{asset('app-assets/vendors/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/fancybox/jquery.fancybox.min.js')}}"></script>

<script src="{{asset('app-assets/fieldsaddmore/jqery.fieldsaddmore.js')}}"></script>

<script src="{{ asset('js/select2.min.js')}}"></script>

<script src="{{ asset('js/jquery.cookie.js')}}"></script>

<script type="text/javascript" src="{{ asset('js/moment.min.js')}}"></script>

<script src="{{ asset('js/daterangepicker.min.js')}}"></script>

<script src="{{ asset('nprogress/nprogress.js')}}" type="text/javascript"></script>

<script src="https://cdn.tiny.cloud/1/576jlwtmeaofrjcuu4h9ev0238eh33vsxewnmf8vqy433q3x/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<!-- <script src="https://cdn.tiny.cloud/1/4zc8a2pz4awr5y184lnfrqwez2tp4gaaaamk09kh9lrtmc4i/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->

<script src="{{asset('js/signature_pad.min.js')}}"></script>

@if(isset($user) && $user->signature == "" && url()->current() != url('user/profile') && in_array($user->role_id,['1','2','3','4']))
<script type="text/javascript">
$(document).ready(function() {
    var canvas = document.getElementById('signature-pad'),
    context = canvas.getContext('2d');
    var canvas = document.querySelector("canvas");
    var signaturePad = new SignaturePad(canvas);
    signaturePad.penColor = "rgb(0, 0, 255)";
    var saveSignature = document.getElementById('btnSignature');
    var clearUserSignature = document.getElementById("clearUserSignature");
    clearUserSignature.addEventListener('click', function(e) {
        signaturePad.clear();
    });
    saveSignature.addEventListener('click', function(e) {
        e.preventDefault();
        var img = signaturePad.toDataURL('image/png');
        $.ajax({
            url: publicPath + "user/signature",
            type: 'post',
            data: {
                'signature':img,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                myShow();
            },
            complete: function() {
                myHide();
            },
            error: function(response) {
                if (response.status == 400) {
                    $.each(response.responseJSON.errors, function(k, v) {
                        $('#' + k + '_error').text(v);
                    });
                }
            },
            success: function(response) {
                if (response.success) {
                    M.toast({
                        html: response.message
                    });
                    signaturePad.clear();
                    $("#modal-sign-contract").addClass("hidden");
                    $("#overlay-layer").addClass("hidden");
                }
            },
        });
    });
});
</script>
@endif

<script src="{{ asset('js/welcome.js')}}"></script>

<script src="{{ asset('js/superadmin/super_admin.js')}}"></script>

<script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

<script type="text/javascript">
    $(".filterNewData.filterdate-block").mCustomScrollbar({
        axis: "x",
        theme: "light-3",
        advanced: {
            autoExpandHorizontalScroll: true
        },
    });
</script>

@stack('js')

@livewireScripts

</body>
</html>
