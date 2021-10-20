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
<!-- <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/dropify/css/dropify.min.css')}}"> -->
<link rel="stylesheet" type="text/css" href="{{asset('css/chat.css')}}">
<!-- <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/animate-css/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/chartist-js/chartist.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/chartist-js/chartist-plugin-tooltip.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/flag-icon/css/flag-icon.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css"
href="{{asset('app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/jkanban/jkanban.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-kanban.css')}}"> -->
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/custom/custom.css')}}">
<!-- <link rel="stylesheet" href="{{asset('css/styles.css')}}">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/flaticon.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/slick-theme.css')}}"> -->
<!-- <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-contacts.css')}}"> -->
<!-- <link rel="stylesheet" href="{{asset('css/profile.css')}}"> -->
<!-- <link rel="stylesheet" href="{{asset('app-assets/vendors/fancybox/jquery.fancybox.min.css')}}" /> -->
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/custom/jquery.mCustomScrollbar.min.css')}}">
<!-- END: THEME  CSS-->
<!-- BEGIN: Page Level CSS-->
@stack('css')
<!-- END: Page Level CSS-->
<!-- BEGIN VENDOR JS-->
<script src="{{asset('app-assets/js/vendors.min.js')}}" type="text/javascript"></script>
<!-- END VENDOR JS-->
</head>
<!-- END: Head-->
<body class="chat-screen">
<!--Scrollable Tabs-->

        <div id="Scrollable-tabs" class="scrollspy">
            <div class="card-content chat-card-content-block">


                        <div class="tab-scroll-block">

                                <ul id="scroll-tab" class="tabs tab-demo z-depth-1 gradient-45deg-indigo-purple">
                                    @foreach($messages as $key => $chat)
                                    <li class="tab">
                                        <a href="#{{$chat['id']}}">
                                            <div class="user-img-chat">
                                                <img src="{{$chat['avatar']}}" alt="" class="circle z-depth-2 responsive-img">
                                            </div>
                                            <div class="user-chat-room-name">
                                                <p class="m-0">{{$chat['name']}}</p>
                                            </div>
                                            <span style="cursor: pointer" class="closeChatWindow pill"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                              <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                              <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                            </svg></span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>

                            <div class="scroll-button">
                                <button class="scroll-pre" id="pre-btn">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                    </svg>
                                </button>
                                <button class="scroll-next" id="next-btn">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="chat-room-container">

                            @foreach($messages as $key => $chat)
                            <div id="{{$chat['id']}}" class="col s12 chat-row-block">
                                <div class="fadeIn chat-main-animate-container" data-user="{{$chat['id']}}"
                                    id="chatWindow_{{$chat['id']}}" style="position: inherit;" data-update="{{route('chat.update',['receiver'=>$chat['id']])}}">
                                    <div class="raspuns-chat animated fadeInUp">
                                        <div class="mesaje-chat">
                                            <div class="chat-scroll-content">
                                                @foreach($chat['messages'] as $message)
                                                @if (trim($message['text']))
                                                <div class="row">
                                                    @if ($message['user_id'] === $user->id)
                                                    <div class="to to-block-msg">
                                                        <p>{{ $user->name}}</p>
                                                        <span title="Trimis: {{$message['created_at']}}"> {!! $message['text'] !!}</span>
                                                    </div>
                                                    @else
                                                    <div class="from from-block-msg">
                                                        <p>{{$chat['name']}}</p>
                                                        <span title="Trimis: {{$message['created_at']}}"> {!! $message['text'] !!}</span>
                                                    </div>
                                                    @endif
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="file-chat"></div>
                                        <div class="trimite-chat ">
                                            <label class="upload upload-photo-block" title="Trimite fisiere">
                                                <i class="material-icons">cloud_upload</i>
                                            </label>
                                            <div class="chatFrom" data-action="{{route('chat.send')}}">
                                                <div class="input-field k-input-text mb-0">
                                                    <input type="hidden" class="receiver_id " name="receiver_id" value="{{$chat['id']}}">
                                                    <input type="text" name="text" value="" class="message text k-txt-box" autofocus autocomplete="off"/>
                                                </div>
                                                <div class="pabs">
                                                    <i class="material-icons">send</i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

            </div>
        </div>

<script type="text/javascript">
var public_path = "{!! URL::to('/'); !!}/";
var date="@php echo date('Y-m-d') @endphp";
</script>
<!-- BEGIN THEME  JS-->
<script src="{{asset('app-assets/js/materialize.min.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/advance-ui-modals.min.js')}}"></script>
<script src="{{asset('app-assets/js/plugins.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/search.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/dropify/js/dropify.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/custom/custom-script.js')}}" type="text/javascript"></script>
<script src="{{asset('js/chat.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/chartjs/chart.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/chartist-js/chartist.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/chartist-js/chartist-plugin-tooltip.js')}}"></script>
<script src="{{asset('app-assets/vendors/chartist-js/chartist-plugin-fill-donut.min.js')}}"></script>
<!-- END PAGE VENDOR JS-->
<script src="{{asset('app-assets/vendors/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/fancybox/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/form-editor.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/charts-chartjs.js')}}"></script>
<script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
<script src="{{asset('app-assets/fieldsaddmore/jqery.fieldsaddmore.js')}}"></script>
<script src="{{ asset('js/welcome.js')}}"></script>
<script src="{{ asset('js/custominfo.js')}}"></script>
@if(Route::current()->getName()  == 'staffinterview.addmore_staffinterview')
<script src="{{ asset('js/staffinterviewinfo.js')}}"></script>
@endif
@if(Route::current()->getName()  == 'user.working')
<script src="{{ asset('js/start_tour.js')}}"></script>

@endif
<script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script type="text/javascript">
   // $(".month-view-modal .modal-staff-block").mCustomScrollbar({
   //      axis:"x",
   //      theme:"light-3",
   //      advanced:{autoExpandHorizontalScroll:true},

   //  });
// $('.scroll-button button').click(function(){
//     var button_id = $(this).prop('id');
//     if(button_id = "next-btn"){
//         $('.tab-demo').animate({ //animate element that has scroll
//             scrollLeft: 50 //for scrolling
//         }, 1000);
//     }
//     else{
//         $('.tab-demo').animate({ scrollLeft: -50 }, 1000);
//     }


// });

var button = document.getElementById('next-btn');
button.onclick = function () {
    var container = document.getElementById('scroll-tab');
    sideScroll(container,'right',25,100,10);
};

var back = document.getElementById('pre-btn');
back.onclick = function () {
    var container = document.getElementById('scroll-tab');
    sideScroll(container,'left',25,100,10);
};

function sideScroll(element,direction,speed,distance,step){
    scrollAmount = 0;
    var slideTimer = setInterval(function(){
        if(direction == 'left'){
            element.scrollLeft -= step;
        } else {
            element.scrollLeft += step;
        }
        scrollAmount += step;
        if(scrollAmount >= distance){
            window.clearInterval(slideTimer);
        }
    }, speed);
}

</script>
<!-- END THEME  JS-->
<!-- BEGIN PAGE JS-->
@stack('js')

<!-- END PAGE JS-->
</body>
</html>
