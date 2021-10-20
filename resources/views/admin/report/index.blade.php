@extends('layouts.app')

@section('filter')
    @include("layouts.common.filter",['closeCls' => 'closeAdminFilter','type' => 'admin_report','cls'=>'adminReportTab','clear'=>'clearAdminReportFilter'])
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/quill/quill.snow.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/custom/jquery.mCustomScrollbar.min.css')}}">
@endpush

@section('content')
<!-- BEGIN: Page Main-->
<div class="container">
    <div class="row">
        <div class="col s12">
            <section class="tabs-vertical mt-0 section">
                <div class="row">
                    <div class="col left-content-panel">
                        <!-- tabs  -->
                        <div class="card-panel custom-panel">
                            <ul class="tabs">
                                <li class="tab" class="active">
                                    <a href="#admin-report" class="active filterBar adminReportTab" data-filter='admin_report' data-close='closeAdminFilter'>
                                    <i class="material-icons">reorder</i>
                                    <span>{{trans('message.reports')}} </span>
                                    </a>
                                </li>

                                <li class="tab">
                                    <a href="#activity_log" class=" activityLogTab filterBar" data-filter="activity_log" data-close="closeActivityFilter" data-cls="activityLogTab">
                                        <i class="material-icons">art_track</i>
                                        <span>{{trans('message.activity_log')}}</span>
                                    </a>
                                </li>


                                <li class="indicator" style="left: 0px; right: 0px;"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col right-content-block">
                        <!--Tab 1 -->
                        <div id="admin-report">
                            <div class="content">
                                <div class="card-panel border-radius-6 card-with-header p-0 mt-0">
                                    @include("admin.report.cronologie")
                                </div>
                            </div>
                        </div>
                        <!--Tab 1 -->

                        <div id="activity_log" style="display: none;">
                            <div class="content">
                                <div class="card-panel border-radius-6 card-with-header p-0 mt-0">
                                    <div class="card-header admin_activity">
                                        <h4 class="k-h4">{{ trans('message.activity_log')}}</h4>
                                        <div class="model-block-row">
                                        </div>
                                    </div>
                                    @include("admin.activity")
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<form id="admin-report-filter" name="admin-report-filter">
    <input type="hidden" name="staff_member" id="staff_member" class="staffMember resetAdminReport">
    <input type="hidden" name="staff_type" id="staff_type" class="staffType resetAdminReport">
    <input type="hidden" name="date_filter" id="date" class="dateAdminFilter resetAdminReport">
    <input type="hidden" name="model_name" id="model_name" class="modelName resetAdminReport">
    <input type="hidden" name="post_type" id="post_type" class="postType resetAdminReport">
</form>

<form id="form-activity-filter" name="form-activity-filter">
    <input type="hidden" class="resetActivitLog name" id="name">
    <input type="hidden" class="resetActivitLog dateActivityFilter" id="date">
    <input type="hidden" class="resetActivitLog period" id="period">
    <input type="hidden" class="resetActivitLog subject" id="subject">
    <input type="hidden" class="resetActivitLog type" id="type">
    <input type="hidden" class="resetActivitLog from_date" id="from_date">
    <input type="hidden" class="resetActivitLog to_date" id="to_date">
    <input type="hidden" class="resetActivitLog url" id="url">
</form>

<!-- END: Page Main-->
@endsection

@push('js')

<script src="{{ asset('app-assets/vendors/quill/quill.min.js')}}"></script>
<script src="{{ asset('js/feed.js')}}"></script>
<script src="{{ asset('js/admin_reports.js')}}"></script>
<script src="{{ asset('js/activity.js')}}"></script>
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
@endpush
