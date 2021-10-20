<div id="card-widgets" class="online-tasks app-todo tasks-dashboard">
	<div class="row">
		<div class="col s12">
			<div class="content-area content-right">
				<div class="app-wrapper">
					<div class="card-with-header">
						<div class="card-header">
							<h4>{{trans('message.general_observations')}}</h4>
						</div>
						<div class="dataTables_wrapper widget widget-table-accounting mb-0" id="screenDashboard">
							<div class="card-content modele">
									 <div class="input-field col s12  ">
										<textarea id="trainer-textarea" name="report" class="trainer-textarea materialize-textarea k-textarea">
											{{user_observation_text($tourId)}}
										</textarea>
										<span class="error k-error" id="error_trainer_textarea">
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
