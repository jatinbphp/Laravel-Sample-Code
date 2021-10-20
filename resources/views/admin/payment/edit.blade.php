<form  method="post"  name="edit-admin-payment-request" id="edit-admin-payment-request">
    <div class="row">
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
            <input id="admin_payment_amount" name="admin_payment_amount" type="text" class="numeric validate k-txt-box" value="{{$payment->amount}}" @if($payment->transfer_type == 'full') readonly @endif>
            <span class="error p-0 k-error" id="admin_payment_amount_error" >
            </span>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12 k-input-text" >
            <label for="admin_payment_description">
                {{trans('message.description')}}  <span>*</span>
            </label>
            <textarea  class="materialize-textarea k-textarea" name="admin_payment_description" rows="2" id="admin_payment_description">
                {{$payment->payment_description}}
            </textarea>
            <span class="error p-0 k-error" id="admin_payment_description_error">
            </span>
        </div>
    </div>

    <div class="modal_button_center">
        <button class="action-btn  btn k-button-fill k-btn-normal k-icon updateAdminPayment" type="submit" data-id="{{$payment->id}}">
            <img src="{{asset('img/plus-bl.png')}}">  {{trans('message.update')}}
        </button>
    </div>
</form>
