<form  method="post"  name="form-payment-request" id="form-payment-request">
    <div class="row">
        <div class="input-field col s12 k-input-text">
            <label for="payment_amount">
                {{trans('message.amount')}}  <span>*</span>
            </label>
            <input id="payment_amount" name="payment_amount" type="text" class="numeric validate k-txt-box" maxlength="5" @if(isset($payment)) value="{{$payment->amount}}" @endif>
            <span class="error p-0 k-error" id="payment_amount_error">
            </span>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12  k-input-text" >
            <label for="payment_description">
                {{trans('message.description')}}  <span>*</span>
            </label>
            <textarea  class="materialize-textarea k-textarea" name="payment_description" rows="2" id="payment_description">
                @if(isset($payment))
                    {{$payment->payment_description}}
                @endif
            </textarea>
            <span class="error p-0 k-error" id="payment_description_error">
            </span>
        </div>
    </div>

    <div class="modal_button_center">
        @if(isset($payment))
            <button class="action-btn  btn k-button-fill k-btn-normal k-icon updateUserPayment" type="submit" data-id="{{$payment->id}}">
                <img src="{{asset('img/edit.png')}}" alt="">
                {{trans('message.update')}} {{trans('message.payment')}}
            </button>
        @else
            <button class="action-btn  btn k-button-fill k-btn-normal k-icon saveUserPayment" type="submit">
                <img src="{{asset('img/plus-bl.png')}}">
                {{trans('message.add')}} {{trans('message.payment')}
            </button>
        @endif
    </div>
</form>
