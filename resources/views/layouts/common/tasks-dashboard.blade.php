@if($type == 'tasks')
<div id="card-widgets" class="online-tasks app-todo tasks-dashboard">
	<div class="row">
		<div class="col s12">
			<div class="content-area content-right">
				<div class="app-wrapper">
					<div class="card-with-header">
						<div class="card-header">
							<label class="k-checkbox-fill ">
								<input type="checkbox" onClick="toggle(this)" class="filled-in" />
								<span class=""></span>
							</label>
							<h4 class="k-h4">{{trans('message.taks_uri')}}</h4>

							<div class="buttons-group">
								<a onclick="micsoreaza('astazi')"><img src="/img/icon-collapse.png"
								alt=""></a>
							</div>
						</div>
						<ul class="collection todo-collection astazi overflow-y-list"
							style="height:260px">
							<b class="task-header">{{trans('message.tasks_today')}}</b>
							@foreach($online_tasks as $task)
								<li class="collection-item todo-items">
									<div class="list-left">
										<label for="task{{$task->id}}" class="k-checkbox-fill">
											<input type="checkbox" name="task{{$task->id}}"
											data-status="{{$task->status}}" data-id="{{$task->id}}" value="1"
											id="task{{$task->id}}" class="take_task filled-in" @if($task->status=='1') checked="checked" @endif>
											<span></span>
										</label>
										<i class="material-icons favorite">star_border</i>
									</div>
									<div class="list-content">
										<div class="list-title-area">
											<div class="list-title tooltipped" data-position="left"
												data-tooltip="{{$task->label}}">
												{!!label_de_task($task->label)!!} {{ trim(trim($task->description))}}
											</div>
										</div>
										<div class="list-desc">{{trim(trim($task->description2))}}</div>
									</div>
									<div class="list-right">
										@if($task->hour) <div class="list-date">{{$task->hour}} </div>
										@endif
									</div>
								</li>
							@endforeach
							<b class="task-header">{{trans('message.personal_tasks')}}</b>
							@foreach($personal_tasks as $task)
								<li class="collection-item todo-items">
									<div class="list-left">
										<label for="task{{$task->id}}" class="k-checkbox-fill">
											<input type="checkbox" name="task{{$task->id}}"
											data-status="{{$task->status}}" data-id="{{$task->id}}" value="1"
											id="task{{$task->id}}" class="take_task filled-in" @if($task->status=='1') checked="checked" @endif>
											<span></span>
										</label>
										<i class="material-icons favorite">star_border</i>
									</div>
									<div class="list-content">
										<div class="list-title-area">
											<div class="list-title tooltipped" data-position="left"
												data-tooltip="{{$task->label}}">
												{!!label_de_task($task->label)!!} {{$task->description}}
											</div>
										</div>
										<div class="list-desc">{{$task->description2}}</div>
									</div>
									<div class="list-right">
										@if($task->hour) <div class="list-date">{{$task->hour}} </div>
										@endif
									</div>
								</li>
							@endforeach
							@if(count($online_tasks)==0 && count($personal_tasks)==0)
							<li class="collection-item todo-items"
								style="text-align: center;width: 100%;margin: 10px;">
								<div class="list-desc" style="text-align: center;width: 100%;">{{trans('message.not_are_tasks_on_the_agenda')}}</div>
							</li>
							@endif
							<b class="task-header">{{trans('message.expired_tasks')}}</b>
							@foreach($expired_tasks as $task)
							<li class="collection-item todo-items">
								<div class="list-left">
									<label for="task{{$task->id}}" class="k-checkbox-fill">
										<input type="checkbox" name="task{{$task->id}}"
										data-status="{{$task->status}}" data-id="{{$task->id}}" value="1"
										id="task{{$task->id}}" class="take_task filled-in" @if($task->status=='1') checked="checked" @endif>
										<span></span>
									</label>
									<i class="material-icons favorite">star_border</i>
								</div>
								<div class="list-content">
									<div class="list-title-area">
										<div class="list-title tooltipped" data-position="left"
											data-tooltip="{{$task->label}}">
											{!!label_de_task($task->label)!!} {{$task->description}}
										</div>
										<div class="list-desc">{{$task->description2}}</div>
									</div>

								</div>
								<div class="list-right">
									@if($task->hour) <div class="list-date">{{$task->hour}} </div>
									@endif
								</div>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endif

@if($type == 'leads')
<div id="card-widgets" class="online-tasks app-todo tasks-dashboard">
	<div class="row">
		<div class="col s12">
			<div class="content-area content-right">
				<div class="app-wrapper">
					<div class="card-with-header">
						<div class="card-header">

								<label class="k-checkbox-fill" >
									<input type="checkbox" onClick="toggle(this)" class="filled-in" />
									<span class=""></span>
								</label>
								<h4 class="k-h4">{{trans('message.lead_uri')}}</h4>

							<div class="buttons-group">
								<a onclick="micsoreaza('leaduri')"><img src="/img/icon-collapse.png"
								alt=""></a>
							</div>
						</div>
						<ul class="collection todo-collection leaduri overflow-y-list"
							style="height:255px;">
							@foreach(getLeadByUser($userId) as $lead)
							<li class="collection-item todo-items leadul{{$lead->id}}">
								<div class="list-left">
									<label for="lead{{$lead->id}}" class="k-checkbox-fill">
										<input type="checkbox" name="lead{{$lead->id}}"
										data-status="{{$lead->status}}" data-id="{{$lead->id}}" value="1"
										id="lead{{$lead->id}}" class="take_lead filled-in" @if($lead->status=='1') checked="checked" @endif>
										<span></span>
									</label>
								</div>
								<div class="list-content">
									<div class="list-title-area">
										<div class="list-title tooltipped" data-position="left"
										data-tooltip="{{$lead->nume}}"> {{$lead->nume}} </div>
									</div>
									<div class="list-desc">{!!$lead->descriere!!}</div>
								</div>
								<div class="list-right">
									<span class="label-puncte-k"><span
									class="puncte-kendra">k</span>{{$lead->valoare_puncte}}ptk</span>
								</div>
							</li>
							@endforeach
							@if(count(getLeadByUser($userId))==0 )
							<li class="collection-item todo-items"
								style="text-align: center;width: 100%;margin: 10px;">
								<div class="list-desc" style="text-align: center;width: 100%;">{{trans('message.not_are_leads')}}</h4> </div>
							</li>
							@endif
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endif

@if($type == 'future_tasks')
<div id="card-widgets" class="online-tasks app-todo tasks-dashboard">
	<div class="row">
		<div class="col s12">
			<div class="content-area content-right">
				<div class="app-wrapper">
					<div class="card-with-header">
						<div class="card-header">

								<label class="k-checkbox-fill">
									<input type="checkbox" onClick="toggle(this)"  class="filled-in" />
									<span class=""></span>
								</label>
								<h4 class="k-h4">{{trans('message.future_tasks')}}</h4>

							<div class="buttons-group">
								<a onclick="micsoreaza('viitor')"><img src="/img/icon-collapse.png"
								alt=""></a>
							</div>
						</div>
						<ul class="collection todo-collection overflow-y-list viitor">
							@foreach($offline_tasks as $task)
							<li class="collection-item todo-items">
								<div class="list-left">
									<label for="task{{$task->id}}" class="k-checkbox-fill">
										<input type="checkbox" name="task{{$task->id}}"
										data-status="{{$task->status}}" data-id="{{$task->id}}" value="1"
										id="task{{$task->id}}" class="take_task filled-in" @if($task->status=='1') checked="checked" @endif>
										<span></span>
									</label>
									<i class="material-icons favorite">star_border</i>
								</div>
								<div class="list-content">
									<div class="list-title-area">
										<div class="list-title tooltipped" data-position="left"
											data-tooltip="{{$task->label}}">
											{!!label_de_task($task->label)!!} {{$task->description}}
										</div>

									</div>
									<div class="list-desc">{{$task->description2}}</div>
								</div>
								<div class="list-right">
									<div class="delete-task">
										@if($task->hour) <div class="list-date list-date-cus">{{$task->hour}}
										</div>@endif
										<button class=" btn k-button-fill k-btn-small">{{trans('message.button')}} {{trans('message.task')}}</button>
									</div>
								</div>
							</li>
							@endforeach
							@if(count($offline_tasks) ==0)
							<li class="collection-item todo-items"
								style="text-align: center;width: 100%;margin: 10px;">
								<div class="list-desc" style="text-align: center;width: 100%;"> {{trans('message.there_are_no_tasks')}}</div>
							</li>
							@endif
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endif
