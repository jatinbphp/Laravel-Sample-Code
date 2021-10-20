<div class="row">
	<div class="col s12">
		<div class="container">
			<section class="tabs-vertical mt-70 section">
				<div class="row">
					<div class="col left-content-panel">
						<!-- tabs  -->
						<div class="card-panel custom-panel">
							<ul class="tabs">
								<li class="tab">
									<a href="#tasks-tab" class="active dashboardTab">
										<i class="material-icons">account_circle</i>
										<span>{{trans('message.tasks')}}</span>
									</a>
								</li>
								<li class="tab">
									<a href="#leads-tab" class="dashboardTab">
										<i class="material-icons">account_circle</i>
										<span>{{trans('message.leads')}}</span>
									</a>
								</li>
								<li class="tab">
									<a href="#future-tab" class="dashboardTab">
										<i class="material-icons">list</i>
										<span>{{trans('message.future_tasks')}}</span>
									</a>
								</li>
								<li class="tab">
									<a href="#models_under_observation-tab" class="dashboardTab">
										<i class="material-icons">art_track</i>
										<span>{{trans('message.models_under_observation')}}</span>
									</a>
								</li>
								<li class="tab">
									<a href="#general_observations-tab" class="observationsTab dashboardTab">
										<i class="material-icons">assistant</i>
										<span>{{trans('message.general_observations')}}</span>
									</a>
								</li>

								<li class="indicator" style="left: 0px; right: 0px;"></li>
							</ul>
						</div>
					</div>
					<div class="col right-content-block" style="margin-top:0px;">
						<div id="tasks-tab" class="dashboardContentTab active">
							<div class="content">
								@include("layouts.common.tasks-dashboard",['online_tasks' => $online_tasks,'personal_tasks' => $personal_tasks,'expired_tasks' => $expired_tasks,'offline_tasks' => $offline_tasks,'type'=>'tasks'])
							</div>
						</div>
						<div id="leads-tab" class="dashboardContentTab" style="display: none;">
							<div class="content">
								@include("layouts.common.tasks-dashboard",['online_tasks' => $online_tasks,'personal_tasks' => $personal_tasks,'expired_tasks' => $expired_tasks,'offline_tasks' => $offline_tasks,'type'=>'leads'])
							</div>
						</div>
						<div id="future-tab" class="dashboardContentTab" style="display: none;">
							<div class="content">
								@include("layouts.common.tasks-dashboard",['online_tasks' => $online_tasks,'personal_tasks' => $personal_tasks,'expired_tasks' => $expired_tasks,'offline_tasks' => $offline_tasks,'type'=>'future_tasks'])
							</div>
						</div>
						<div id="models_under_observation-tab" style="display: none;" class="dashboardContentTab">
							<div class="content">
								@include("layouts.common.model-under-observation")
							</div>
						</div>
						<div id="general_observations-tab" style="display: none;" class="dashboardContentTab observationsContentTab">
							<div class="content">
								@include("layouts.common.observation")
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
