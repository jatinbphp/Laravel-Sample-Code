@extends('layouts.app')
@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-todo.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-email.css')}}">
<link href="{{asset('app-assets/css/pages/app-email-content.css')}}" rel="stylesheet" type="text/css"/>

<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/quill/katex.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/quill/monokai-sublime.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/quill/quill.snow.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/quill/quill.bubble.css')}}">

<link href="{{ asset('app-assets/vendors/email-multiple/email.multiple.css')}}" rel="stylesheet"/>

@endpush

@section('content')
<div class="row">
    <div class="col s12">
        <div class="container">
            <section class="tabs-vertical mt-0 section">
                <div class="row">
                    <div class="col left-content-panel ">
                        <!-- tabs  -->
                        <div class="card-panel custom-panel">
                            <ul class="tabs">
                                <li class="tab">
                                    <a href="#email" class="active communiTab" data-type='email'>
                                        <i class="material-icons">email</i>
                                        <span>{{trans('message.email')}}</span>
                                    </a>
                                </li>
                                <li class="tab">
                                    <a href="{{url('chat/today')}}" target="_blank">
                                        <i class="material-icons">chat</i>
                                        <span>{{trans('message.chat')}}</span>
                                    </a>
                                </li>
                                <li class="tab">
                                    <a href="#forums" class="communiTab" data-type='forums'>
                                        <i class="material-icons">forum</i>
                                        <span>{{trans('message.forums')}}</span>
                                    </a>
                                </li>
                                <li class="tab">
                                    <a href="#announcements" class="communiTab" data-type='announcements'>
                                        <i class="material-icons">announcement</i>
                                        <span>{{trans('message.announcements')}}</span>
                                    </a>
                                </li>
                                <li class="tab">
                                    <a href="#questionaires"  class="communiTab" data-type='questionaires'>
                                        <i class="material-icons">question_answer</i>
                                        <span>{{trans('message.questionaires')}}</span>
                                    </a>
                                </li>
                                <li class="indicator" style="left: 0px; right: 0px;"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col right-content-block ">
                        <div id="email">
                            <div class="content communicationTab">

                            </div>
                        </div>
                        <div id="forums" style="display: none;">
                            <div class="content communicationTab">

                            </div>
                        </div>
                        <div id="announcements" style="display: none;">
                            <div class="content communicationTab">

                            </div>
                        </div>
                        <div id="questionaires" style="display: none;">
                            <div class="content communicationTab">

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('app-assets/vendors/quill/katex.min.js')}}"></script>
<script src="{{ asset('app-assets/vendors/quill/highlight.min.js')}}"></script>
<script src="{{ asset('app-assets/vendors/quill/quill.min.js')}}"></script>
<script src="{{ asset('js/communication.js')}}"></script>
<script src="{{ asset('js/email.js')}}"></script>
<script src="{{ asset('app-assets/vendors/email-multiple/jquery.email.multiple.js')}}" type="text/javascript"> </script>

@endpush
