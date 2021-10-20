<div class="table-block table-block-new">
	<table class="striped highlight" id="paymentProfile" style="width:100%">
		<thead>
			<tr>
				<th class="center">
					<label  class=" k-checkbox-fill">
						<input type="checkbox" class="filled-in main_checkbox" />
						<span class=""></span>
					</label>
				</th>
				@foreach(getProfilePaymentFields() as $fieldId => $val)
					<th class="center">{{ $val }}</th>
				@endforeach
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>

<div id="modal-payment-request" class="modalx bottom-sheet hidden modal-custom modal-small">
    <div class="modal-header">
        <h4 class="k-h4 modalTitle">{{trans('message.payment')}} {{trans('message.request')}}</h4>
        <div class="buttons-group">
            <a href="#" class="close-payment-request"><img src="{{asset('img/icon-close.png')}}" alt=""></a>
        </div>
    </div>
    <div class="modalx-content">

    </div>
</div>
