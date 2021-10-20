@extends('layouts.app')

@section('filter')
    @include("layouts.common.filter",['closeCls' => 'closeStaffQuestionFilter','type' => 'staff_report_question','cls'=>'staffQuestionTab'])
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/quill/quill.snow.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/custom/jquery.mCustomScrollbar.min.css')}}">

<style>
  #sortable1, #sortable2 {
    border: 1px solid rgb(204, 204, 204) !important;
    width: calc(50% - 10px);
    min-height: 20px;
    list-style-type: none;
    margin: 0;
    padding: 5px 0 0 0;
    float: left;
    margin-right: 10px;
    border-radius: 3px;
    min-height: 170px;
}
  #sortable1 li, #sortable2 li {
    margin: 0 5px 5px 5px;
    padding: 5px;
    font-size: 1.2em;
    width: calc(100% - 10px);
}
</style>

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

                                <li class="tab">
                                    <a href="#staff_report_question" class=" staffQuestionTab filterBar active" data-filter="staff_report_question" data-close="closeStaffQuestionFilter" data-cls="staffQuestionTab">
                                        <i class="material-icons">art_track</i>
                                        <span>{{trans('message.staff')}}
                                        {{trans('message.report')}} {{trans('message.question')}}</span>
                                    </a>
                                </li>

                                <li class="tab">
                                    <a href="#staff_fields_list" class="active filterBar staffInterviewFieldTab" data-cls="staffInterviewFieldTab" data-filter="staff_interview_fields" data-close="closeStaffFieldFilter" >
                                    <i class="material-icons">vignette</i>
                                    <span>{{ trans('message.staff_interview_fields')}}</span>
                                    </a>
                                </li>

                                <li class="tab">
                                    <a href="#problem_list" class="active filterBar problemTab" data-cls="problemTab" data-filter="admin_problem" data-close="closeAdminProblemFilter" >
                                    <i class="material-icons">sync_problem</i>
                                    <span>{{ trans('message.flows')}}</span>
                                    </a>
                                </li>

                                <li class="tab">
                                    <a href="#problem_type_list" class="active filterBar flowTypeTab" data-cls="flowTypeTab" data-filter="admin_flow_type" data-close="closeFlowTypeFilter" >
                                    <i class="material-icons">format_color_fill</i>
                                    <span>{{ trans('message.flows_builder')}}</span>
                                    </a>
                                </li>

                                <li class="indicator" style="left: 0px; right: 0px;"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col right-content-block">

                        <!--Tab 1 -->
                        <div id="staff_report_question" style="display: none;">
                            <div class="content">
                                <div class="card-panel border-radius-6 card-with-header p-0 mt-0">
                                    <div class="card-header staff_question">
                                        <h4 class="k-h4">{{ trans('message.staff')}} {{ trans('message.report')}} {{ trans('message.question')}}</h4>
                                        <div class="model-block-row">
                                        </div>
                                    </div>
                                    @include("admin.question.index")
                                </div>
                            </div>
                        </div>

                        <div id="staff_fields_list" style="display: none;">
                            <div class="content">
                                <div class="card-panel border-radius-6 card-with-header p-0 mt-0">
                                    <div class="card-header all_staff_fields">
                                        <h4 class="k-h4">{{ trans('message.staff_interview_fields')}}</h4>
                                        <div class="model-block-row">
                                        </div>
                                    </div>
                                    @include("admin.staff_interview_field.index")
                                </div>
                            </div>
                        </div>

                        <div id="problem_list" style="display: none;">
                            <div class="content">
                                <div class="card-panel border-radius-6 card-with-header p-0 mt-0">
                                    <div class="card-header problemList">
                                        <h4 class="k-h4">{{ trans('message.flows')}}</h4>
                                        <div class="model-block-row">
                                        </div>
                                    </div>
                                    @include("admin.problem.index")
                                </div>
                            </div>
                        </div>

                        <div id="problem_type_list" style="display: none;">
                            <div class="content">
                                <div class="card-panel border-radius-6 card-with-header p-0 mt-0">
                                    <div class="card-header problemList">
                                        <h4 class="k-h4">{{ trans('message.flows_builder')}}</h4>
                                        <div class="model-block-row">
                                        </div>
                                    </div>
                                    @include("admin.flow_type.index")
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<form id="form-staff-question-filter" name="form-staff-question-filter">
    <input type="hidden"  class="resetStaffQuestion status" id="staffQuestion">
    <input type="hidden"  class="resetStaffQuestion date" id="roleStaffQuestion">

    <input type="hidden"  class="resetSatffInterviewField roles" id="rolesSatffInterviewField">
    <input type="hidden"  class="resetSatffInterviewField types" id="typesSatffInterviewField">
</form>



<!-- END: Page Main-->
@endsection

@push('js')
<script src="{{ asset('js/jquery-ui-new.js')}}"></script>
<script src="{{ asset('app-assets/vendors/quill/quill.min.js')}}"></script>
<script src="{{ asset('js/admin/staff_question.js')}}"></script>
<script src="{{ asset('js/admin/problem_flow.js')}}"></script>
<script src="{{ asset('js/admin/flow_type.js')}}"></script>
<script src="{{ asset('js/admin/staffinterview_fields.js')}}"></script>
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
