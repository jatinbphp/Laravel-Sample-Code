<div class="table-new-v1 table-block table-block-new">
	<table class="responsive-table striped highlight" id="all_leads" style="width:100%">
		<thead>
			<tr>
				<th class="center">
					<label  class=" k-checkbox-fill">
						<input type="checkbox" class="filled-in main_checkbox" />
						<span class=""></span>
					</label>
				</th>
				@foreach(getListLeadFields() as $fieldId => $val)
					<th class="center">{{ $val }}</th>
				@endforeach
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>
