@extends('layouts.app')

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-todo.css')}}">
@endpush

@section('filter')
    @include("layouts.common.filter",['closeCls' => 'closeFileFilter','type' => 'file_list','cls' => 'fileTab'])
@endsection

@section('content')


<div class="row">
    <div class="col s12">
        <div class="container">

            <section class="tabs-vertical mt-0 section">
                <div class="row">
                    <div class="col left-content-panel">
                        <!-- tabs  -->
                        <div class="card-panel custom-panel">
                           <ul class="tabs">

                                  <li class="tab">
                                    <a href="#company" class="filterBar filesChange" data-type='company' data-filter="file_list" data-close="closeFileFilter" data-cls="fileTab">
                                        <i class="material-icons">playlist_add</i>
                                        <span>{{trans('message.company_files')}}</span>
                                    </a>
                                </li>

                                <li class="tab">
                                    <a href="#my" class="filterBar filesChange"  data-type='my' data-filter="my_file_list" data-close="closeMyFileFilter" data-cls="myFileTab">
                                        <i class="material-icons">list</i>
                                        <span> {{trans('message.my_files')}}</span>
                                    </a>
                                </li>

                                <li class="indicator" style="left: 0px; right: 0px;"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col right-content-block  ">
                        <div id="company">
                            <div class="content filesTab">

                            </div>
                        </div>

                        <div id="my">
                            <div class="content filesTab">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/flag-icon/css/flag-icon.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-file-manager.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/widget-timeline.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/sweetalert/sweetalert.css')}}">

@endpush

@push('js')
    <script src="{{asset('js/notify.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/advance-ui-modals.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/app-file-manager.js')}}"></script>
    <script src="{{asset('app-assets//js/custom/file-manager.js')}}"></script>
    <script src="{{asset('app-assets/vendors/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/extra-components-sweetalert.js')}}"></script>
    <script src="{{asset('js/files.js')}}"></script>
@endpush
