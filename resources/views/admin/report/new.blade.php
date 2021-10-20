@extends('layouts.app')
@section('content')
<div class="section groups-container" id="user-profile">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
    <div class="row">
        <div class="col s12">
            <div class="top-profile-content-block newsfeeds-profile">
                <div class="sidebar-left sidebar-fixed">
                    <div class="sidebar">
                        <div class="breadcrumbs-dark p-0 mt-0 only-breadcrumbs" id="breadcrumbs-wrapper">
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span> {{trans('message.reports')}}</span></h5>
                            <ol class="breadcrumbs mb-0 mt-2">
                                <li class="breadcrumb-item">
                                    <a href="{{url('/')}}"> {{trans('message.dashboard')}}</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    {{trans('message.reports')}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="right-new-filter">
                    <div class="top-filter-block-main-new">
                        <div class="boking-filter-row">
                            <div class="booking-filter-block">
                                <a href="#" class="main-filter-btn">
                                    <span>
                                        <img src="{{ asset('img/filter.png')}}">
                                    </span>
                                    {{trans('message.filter_by')}} :
                                </a>

                                <div class="filterNewsFeedData filterdate-block">

                                </div>

                                <!-- Dropdown Trigger -->
                                <div class="button-triggle-parent">
                                  <a class="dropdown-trigger modal-filter-add-btn" href="#" data-target="filter-option"> {{trans('message.add')}}  {{trans('message.filter')}}!</a>
                                  <!-- Dropdown Structure -->
                                  <ul id="filter-option" class="dropdown-content modal-filter-dropdown  ">
                                     <li class="li-date_filter">
                                        <a href="#" class="filterAdminReportValue" data-type="date_filter">
                                            {{trans('message.date')}}  {{trans('message.filter')}}
                                        </a>
                                    </li>
                                    <li class="li-staff_member">
                                        <a href="#" class="filterAdminReportValue" data-type="staff_member">
                                            {{trans('message.staff_member')}}
                                        </a>
                                    </li>
                                    <li class="li-staff_type">
                                        <a href="#" class="filterAdminReportValue" data-type="staff_type" >    {{trans('message.staff_type')}}
                                        </a>
                                    </li>
                                    <li class="li-model_name">
                                        <a href="#" class="filterAdminReportValue" data-type="model_name" >
                                            {{trans('message.model_name')}}
                                        </a>
                                    </li>
                                    <li class="li-post_type">
                                        <a href="#" class="filterAdminReportValue" data-type="post_type" >
                                            {{trans('message.post_type')}}
                                        </a>
                                    </li>
                                  </ul>
                                </div>
                            </div>
                        </div>



                        <ul id='dateFilter'  class='dropdown-content dropdown-with-checkbox modal-filter-dropdown'>
                            <div class="drop-inner-content k-input-text p-0">
                                <input type="text" name="date"  class="form-control futureDatePicker Date k-txt-box">
                            </div>
                        </ul>

                        <!-- Dropdown Structure -->
                        <ul id='staffMemberDropDown' class='dropdown-content dropdown-with-checkbox modal-filter-dropdown'>
                            @foreach($users as $key => $usr)
                                <li>
                                    <label class="k-checkbox-fill">
                                        <input type="checkbox" data-id="{{$key}}" value="{{$key}}" class="filled-in staffMemberDropdown" name="staffMemberCheckbox" id="staffMemberCheckbox_{{$key}}" multiple="multiple" />
                                        <span>{{$usr}}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>

                        <!-- Dropdown Structure -->
                        <ul id='staffTypeDropDown' class='dropdown-content dropdown-with-checkbox modal-filter-dropdown'>
                            @foreach($roles as $key => $role)
                                <li>
                                    <label class="k-checkbox-fill">
                                        <input type="checkbox" data-id="{{$key}}" value="{{$key}}" class="filled-in staffTypeDropdown" name="staffTypeCheckbox" id="staffTypeCheckbox_{{$key}}" multiple="multiple" />
                                        <span>{{$role}}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>

                        <!-- Dropdown Structure -->
                        <ul id='modelNameDropDown' class='dropdown-content dropdown-with-checkbox modal-filter-dropdown'>
                            @foreach($modelUser as $key => $usr)
                                <li>
                                    <label class="k-checkbox-fill">
                                        <input type="checkbox" data-id="{{$key}}" value="{{$key}}" class="filled-in modelNameDropdown" name="modelNameCheckbox" id="modelNameCheckbox_{{$key}}" multiple="multiple" />
                                        <span>{{$usr}}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>

                        <!-- Dropdown Structure -->
                        <ul id='postTypeDropDown' class='dropdown-content dropdown-with-checkbox modal-filter-dropdown'>
                            <li>
                                <label class="k-checkbox-fill">
                                    <input type="checkbox" value="task_post" class="filled-in postTypeDropdown" name="postTypeCheckbox" id="postTypeCheckbox_{{$key}}" multiple="multiple" />
                                    <span>{{trans('message.tasks')}}</span>
                                </label>
                            </li>
                            <li>
                                <label class="k-checkbox-fill">
                                    <input type="checkbox" value="task_end_post" class="filled-in postTypeDropdown" name="postTypeCheckbox" id="postTypeCheckbox_{{$key}}" multiple="multiple" />
                                    <span>{{trans('message.closed_tasks')}}</span>
                                </label>
                            </li>
                            <li>
                                <label class="k-checkbox-fill">
                                    <input type="checkbox" value="model_report" class="filled-in postTypeDropdown" name="postTypeCheckbox" id="postTypeCheckbox_{{$key}}" multiple="multiple" />
                                    <span>{{trans('message.model_report')}}</span>
                                </label>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <div id="feed" class="adminReport newsFeedResult">
                        @include("admin.report.filter",['finalData' => $finalData])
                    </div>
                </div>
            </div>


            <form id="admin-report-filter" name="admin-report-filter">
                    <input type="hidden" name="staff_member" id="staff_member" class="staffMember">
                    <input type="hidden" name="staff_type" id="staff_type" class="staffType">
                    <input type="hidden" name="date" id="date" class="reportDate">
                    <input type="hidden" name="model_idmodel_name" id="model_name" class="modelName">
                    <input type="hidden" name="trainer_idpost_type" id="post_type" class="postType">
                </form>

        </div>
    </div>
</div>

@endsection

@push('js')

<script src="{{ asset('js/admin_reports.js')}}"></script>

@endpush
