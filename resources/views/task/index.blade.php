<div class="table-block table-block-new">
	<table class="striped highlight" id="all_tasks" style="width:100%">
		<thead>
			<tr>
				<th class="center">
					<label  class=" k-checkbox-fill">
						<input type="checkbox" class="filled-in main_checkbox" />
						<span class=""></span>
					</label>
				</th>
				@foreach(getListTaskFields() as $fieldId => $val)
				<th class="center">{{ $val }}</th>
				@endforeach
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>

@include("task.modal")

<form id="profile-task-filter" name="profile-task-filter">
	<input type="hidden"  class="resetProfileTask title" id="titleTask">
	<input type="hidden"  class="resetProfileTask user" id="userTask" name="user_task" id="user_task">
	<input type="hidden"  class="resetProfileTask dateTaskFilter" id="dateTask">
	<input type="hidden"  class="resetProfileTask status" id="statusTask">
	<input type="hidden"  class="resetProfileTask type" id="typeTask">
	<input type="hidden"  class="resetProfileTask priority" id="priorityTask">
	<input type="hidden"  class="resetProfileTask priority" id="groupTask">
</form>
