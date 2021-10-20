<div id="modal-create" class=" modalx bottom-sheet modal-custom modal-small hidden">
	<div class="modal-header">
		<h4>{{trans('message.add_expenses')}}</h4>
		<div class="buttons-group">
			<a class="modal-action modal-close close_cost">
				<img src="{{asset('img/icon-close.png')}}" alt="">
			</a>
		</div>
	</div>
	<form method="POST" id="form-add-cost" name="form-add-cost">
		<div class="modalx-content">
			@csrf
			<div class="input-field k-input-text">
				<label for="price">{{trans('message.price')}} <span>*</span></label>
				<input placeholder="{{trans('message.the_price_of_the_operation')}}" id="price" type="text" name="price" class="numeric validate k-txt-box">
				<span class="error k-error" id="price_error"></span>
			</div>
			<div class="input-field k-input-text">
				<label for="description">{{trans('message.description')}} <span>*</span></label>
				<input placeholder="{{trans('message.description')}} " class="validate k-txt-box" id="description" name="description" type="text"
				>
				<span class="error k-error" id="description_error"></span>
			</div>
			<div class="modalx-footer">
				<div class="modal_button_center">
					<button class="action-btn   btn k-button-fill k-icon btnAddCost" type="submit">  <img src="{{asset('img/plus-bl.png')}}"> {{trans('message.add_expenses')}}</button>
				</div>
			</div>
		</div>
	</form>
</div>
<div id="modal-edit" class=" modalx bottom-sheet modal-custom  modal-small  hidden">
	<div class="modal-header">
		<h4>{{trans('message.edit_expenses')}}</h4>
		<div class="buttons-group">
			<a href="#" class="modal-action modal-close  close_edit_cost"   >
				<img src="{{asset('img/icon-close.png')}}" alt="">
			</a>
		</div>
	</div>
	<form method="POST" id="form-edit-cost" name="form-edit-cost">
		<div class="modalx-content">
			@csrf
			<input id="edit_id" name="edit_id" value="" type="hidden" />
			<div class="input-field k-input-text">
				<label for="edit_price">{{trans('message.price')}} <span>*</span></label>
				<input class="validate k-txt-box" placeholder="{{trans('message.the_price_of_the_operation')}}" id="edit_price" type="text" name="edit_price"
				>
				<span class="error k-error" id="edit_price_error"></span>
			</div>
			<div class="input-field k-input-text">
				<label for="edit_description">{{trans('message.description')}} <span>*</span></label>
				<input placeholder="{{trans('message.description')}} " class="validate k-txt-box" id="edit_description" name="edit_description" type="text"
				>
				<span class="error k-error" id="edit_description_error"></span>
			</div>
			<div class="input-field k-input-text">
				<label for="edit_time">{{trans('message.hour')}} </label>
				<input placeholder="{{trans('message.hour')}}" id="edit_time" class="validate k-txt-box timePicker" type="text" name="edit_time" >
				<span class="error k-error" id="edit_time_error"></span>
			</div>
			<div class="input-field k-input-text">
				<label for="edit_date">{{trans('message.date')}}</label>
				<input placeholder="{{trans('message.date')}}" id="edit_date" type="text" class="validate k-txt-box futureDatePicker" name="edit_date" >
				<span class="error k-error" id="edit_date_error"></span>
			</div>
			<div class="input-field k-input-text">
				<label for="edit_reason">{{trans('message.reason_editing')}} <span>*</span></label>
				<input placeholder="{{trans('message.reason_editing')}}" class="validate k-txt-box" id="edit_reason" type="text" name="edit_reason"
				>
				<span class="error k-error" id="edit_reason_error"></span>
			</div>
			<div class="modalx-footer">
				<div class="modal_button_center">
					<button class=" btn k-button-fill k-btn action-btn btnEditCost" type="submit"><img src="{{asset('img/edit.png')}}" alt=""> {{trans('message.update')}} {{trans('message.expenses')}}</button>
				</div>
			</div>
		</div>
	</form>
</div>
<div class="screen-dashboard table-accounting">
	<div class="card-with-header " style="margin-bottom: 8px;">
		<div class="card-content  " style="margin: 15px;">
			<div class="row">
				<div class="col s12">
					<div class="heading-icons">
						<div class="budget">{{trans('message.total')}}
							<span>
								{{setting('site.bani_caserie')}} {{setting('site.valuta_caserie')}}
							</span>
						</div>
						<div class="spent">{{trans('message.spent')}}
							<span>
							{{$total_cost}} {{setting('site.valuta_caserie')}}</span>
						</div>
						<div class="difference">
							{{trans('message.remaining')}}
							<span>
								{{(setting('site.bani_caserie')-setting('site.valuta_caserie'))}}
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="card-with-header pt5">
		<div class="card-header filter-group_n all_cost">
			<h4>{{trans('message.accounting')}}</h4>
			<div class="model-block-row"></div>
			<div class="buttons-group">
				<a  id="add_cost" title="{{trans('message.add_expenses')}}" class=" btn k-button-fill k-icon right k-icon-small" href="javascript:void(0);"><img src="{{ asset('img/plus-bl.png')}}"></a>
			</div>
		</div>
		<div class="table-block table-block-new">

			<table class="striped highlight" id="all_cost" style="width:100%" >
				<thead>
					<tr>
						<th class="center">
							<label  class=" k-checkbox-fill">
								<input type="checkbox" class="filled-in main_checkbox" />
								<span class=""></span>
							</label>
						</th>
						<th class="center" >{{trans('message.time')}}</th>
						<th class="center" >{{trans('message.date')}}</th>
						<th class="center" >{{trans('message.price')}}</th>
						<th class="center" >{{trans('message.description')}}</th>
						<th class="center" >{{trans('message.actions')}}</th>
					</tr>
				</thead>
				<tbody > </tbody>
			</table>

		</div>
	</div>
</div>
