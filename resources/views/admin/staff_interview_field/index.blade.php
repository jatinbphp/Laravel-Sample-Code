<div class="table-block table-block-new">
	<table class="striped highlight" id="all_staff_fields" style="width:100%">
		<thead>
			<tr>
				<th class="center">
					<label  class=" k-checkbox-fill">
						<input type="checkbox" class="filled-in main_checkbox" />
						<span class=""></span>
					</label>
				</th>
				@foreach(getStaffInterviewListFields() as $fieldId => $val)
					<th class="center">{{ $val }}</th>
				@endforeach
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>

<div id="modal-add-staff-field" class="modalx bottom-sheet modal-custom hidden modal-small">
    <div class="modal-header">
        <h4>{{trans('message.add')}} {{trans('message.staff_interview_fields')}}</h4>
        <div class="buttons-group">
            <a href="#" class="closeStaffInterviewField"><img src="/img/icon-close.png" alt=""></a>
        </div>
    </div>
    <div class="modalx-content">

    </div>
</div>
