@extends('layouts.app')
@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-todo.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/custom/jquery.mCustomScrollbar.min.css')}}">
@endpush

@section('filter')
   	@include("layouts.common.filter",['closeCls' => 'closeProfileTaskFilter','type' => 'profile_task','cls' => 'profileTask'])
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
                                    <a href="#task-list"  class="active filterBar profileTask" data-filter='profile_task' data-close="closeProfileTaskFilter" data-cls="profileTask">
                                        <i class="material-icons">chrome_reader_mode</i>
                                        <span>{{trans('message.tasks')}}</span>
                                    </a>
                                </li>

                                <li class="tab">
                                    <a href="#lead-list" class="filterBar profileLead" data-filter='profile_leads' data-close="closeProfileLeadsFilter" data-cls="profileLead">
                                    <i class="material-icons">assistant</i>
                                    <span>{{trans('message.leads')}}</span>
                                    </a>
                                </li>

								<li class="tab">
									<a href="#task-boards" class="filterBar allTask" data-filter='list_task' data-close="closeListTaskFilter" data-cls="allTask">
										<i class="material-icons">developer_board</i>
										<span>{{trans('message.task')}} {{trans('message.boards')}}</span>
									</a>
								</li>

								<li class="tab">
									<a href="#lead-boards" class="filterBar allLead" data-filter='list_leads' data-close="closeListLeadsFilter" data-cls="allLead">
										<i class="material-icons">date_range</i>
										<span>{{trans('message.lead')}} {{trans('message.boards')}}</span>
									</a>
								</li>

								<li class="indicator" style="left: 0px; right: 0px;"></li>
							</ul>
	                    </div>
	                </div>
	                <div class="col right-content-block  ">

						 <div id="task-list" class="active">
                            <div class="content">
                                <div class="card-panel border-radius-6 card-with-header p-0 mt-0">
                                    <div class="card-header my_tasks">
                                        <h4 class="k-h4">{{trans('message.tasks')}}</h4>
                                        <div class="model-block-row">
                                        </div>
                                    </div>
                                    @include("profile.my_tasks")
                                </div>
                            </div>
                        </div>

                        <div id="lead-list" style="display: none;">
                            <div class="content">
                                <div class="card-panel border-radius-6 card-with-header p-0 mt-0">
                                    <div class="card-header my_leads">
                                        <h4 class="k-h4">{{trans('message.leads')}}</h4>
                                        <div class="model-block-row">
                                        </div>
                                    </div>
                                    @include("profile.my_leads")
                                </div>
                            </div>
                        </div>

						<div id="task-boards" style="display: none;">
							<div class="content">
								<div class="card-panel border-radius-6 card-with-header p-0 mt-0">
									<div class="card-header all_tasks">
										<h4 class="k-h4">{{trans('message.task')}} {{trans('message.boards')}}</h4>
										<div class="model-block-row">
                                        </div>
									</div>
									@include("task.index")
								</div>
							</div>
						</div>

						<div id="lead-boards" style="display: none;">
							<div class="content">
								<div class="card-panel border-radius-6 card-with-header p-0 mt-0">
									<div class="card-header all_leads">
										<h4 class="k-h4">{{trans('message.lead')}} {{trans('message.boards')}}</h4>
										<div class="model-block-row">
                                        </div>
									</div>
									@include("lead.lead")
								</div>
							</div>
						</div>

						<form id="profile-leads-filter" name="profile-leads-filter">
							<input type="hidden" class="resetProfileLead user" id="userLeads" name="user_lead">
						    <input type="hidden" class="resetProfileLead title" id="titleLeads" name="title_lead">
						    <input type="hidden" class="resetProfileLead points" id="pointsLeads" name="points_lead">
						</form>

					</div>
				</div>
			</section>
		</div>
	</div>
</div>
@endsection

@push('js')
<script src="{{ asset('js/task/tasks_list.js')}}"></script>
<script src="{{ asset('js/task/leads_list.js')}}"></script>
<script src="{{ asset('js/task/task_list.js')}}"></script>
<script src="{{ asset('js/task/lead_list.js')}}"></script>
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
