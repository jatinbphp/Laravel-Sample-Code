<form  method="post"  name="form-admin-payment-request" id="form-admin-payment-request">
    <div class="row">
        <div class="input-field col s8 k-dropdown">
            <label>{{ trans('message.staff') }}<span>*</span></label>
            <select name="admin_user_id" id="admin_user_id" class="staffUser browser-default">
                <option value="" selected>{{trans('message.select')}}</option>
                @foreach(getRoles() as $roleId => $role)
                    <optgroup label="{{$role}}">
                        @foreach(getAllUserByRole($roleId) as $key => $roleUser)
                        <option value="{{$key}}">{{$roleUser}}  </option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
            <span class="k-error error" id="admin_user_id_error"></span>
        </div>
        <div class="input-field col s4 k-dropdown">
            <label for="admin_transfer_type" >
                {{trans('message.payment_type')}} <span>*</span>
            </label>
            <select name="admin_transfer_type" id="admin_transfer_type" class="paymentType browser-default">
                <option value="">{{trans('message.select')}}</option>
                <option value="full"> {{trans('message.full')}}</option>
                <option value="partsial"> {{trans('message.partsial')}}</option>
            </select>
            <span class="error p-0 k-error" id="admin_transfer_type_error">
            </span>
        </div>
    </div>

    <div class="paymentForm">
    </div>

    <div class="modal_button_center">
        <button class="action-btn  btn k-button-fill k-btn-normal k-icon submit-payment-request  " type="submit">
            <img src="{{asset('img/plus-bl.png')}}">  {{trans('message.add_request')}}
        </button>
    </div>
</form>
