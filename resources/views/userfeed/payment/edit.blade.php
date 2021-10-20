<form  method="post"  name="form-edit-payment-request" id="form-edit-payment-request">
    <div class="row">
        <!-- <div class="input-field col s4 k-dropdown">
            <label for="admin_transfer_type" >
                {{trans('message.payment_type')}} <span>*</span>
            </label>
            <select name="admin_transfer_type" id="admin_transfer_type" class="editPaymentType browser-default">
                <option value="">{{trans('message.select')}}</option>
                <option @php if($payment->transfer_type == "full"){ echo "selected"; } @endphp value="full">{{trans('message.full')}}</option>
                <option @php if($payment->transfer_type == "partsial"){ echo "selected"; } @endphp  value="partsial">{{trans('message.partial')}}</option>
            </select>
            <span class="error p-0 k-error" id="admin_transfer_type_error">
            </span>
        </div> -->

        <div class="input-field col s6 k-input-text">
            <label for="admin_payment_date" >
                {{trans('message.payment_day')}} <span>*</span>
            </label>
            <input id="admin_payment_date" name="admin_payment_date" type="text" class="numeric validate k-txt-box futureDatePicker" value="{{$payment->date}}">
            <span class="error p-0 k-error" id="admin_payment_date_error">
            </span>
        </div>

        <div class="input-field col s6 k-input-text">
            <label for="admin_payment_amount">
                {{trans('message.amount')}}  <span>*</span>
            </label>
            <input id="admin_payment_amount" name="admin_payment_amount" type="text" class="numeric validate k-txt-box" value="{{ $payment->amount }}">
            <span class="error p-0 k-error" id="admin_payment_amount_error">
            </span>
        </div>

        <!-- <div class="input-field col s5 k-dropdown">
            <label for="admin_payment_date" >
                {{trans('message.payment_day')}} <span>*</span>
            </label>
            <select name="admin_payment_date" id="admin_payment_date" class="browser-default paymentDay">
                <option value="" selected>{{trans('message.select')}}</option>
                @foreach($paymentDay as $dayId => $day)
                <option value="{{$dayId}}" @if($day == $payment->date) selected='selected' @endif>{{$day}}</option>
                @endforeach
            </select>
            <span class="error p-0 k-error" id="admin_payment_date_error">
            </span>
        </div> -->
    </div>

    <div class="row">
        <div class="input-field col s12 k-input-text" >
            <label for="admin_payment_description" class="active" >
               {{trans('message.description')}} <span>*</span>
           </label>
           <textarea rows="6" class="materialize-textarea k-textarea validate" name="admin_payment_description" id="admin_payment_description">{{ $payment->payment_description }}</textarea>
           <span class="error p-0 k-error" id="admin_payment_description_error">
           </span>
       </div>
   </div>

   <div class="modal_button_center">
        <button class="action-btn  btn k-button-fill k-btn-normal k-icon  submit-edit-payment-request" id="submit-edit-payment-request" type="submit" data-id="{{$payment->id}}">
             <img src="{{asset('img/edit.png')}}"> {{trans('message.update')}} {{trans('message.payment')}}
        </button>
    </div>
</form>
