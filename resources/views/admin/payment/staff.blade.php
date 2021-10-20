<form  method="post"  name="form-admin-payment-request" id="form-admin-payment-request">
    <div class="row">
        <div class="input-field col s8 k-dropdown">
            <label for="admin_user_id" >
                {{trans('message.staff')}} <span>*</span>
            </label>
            <select class="browser-default staffUser" id="admin_user_id" name="admin_user_id">
              <option value="">{{trans('message.select')}}</option>
              @foreach(array_diff(getRoles(),['Model','Administrator']) as $roleId => $role)
                <optgroup label="{{$role}}">
                    @foreach(getAllUserByRole($roleId) as $userId => $user)
                      <option value="{{$userId}}" data-badge="">{{$user}}</option>
                    @endforeach
                </optgroup>
              @endforeach
            </select>
            <span class="error p-0 k-error" id="admin_user_id_error">
            </span>
        </div>
        <div class="input-field col s4 k-input-text">
            <label for="total_amout">
                {{trans('message.total')}} {{trans('message.amount')}}  <span>*</span>
            </label>
            <input id="total_amout" name="total_amout" type="text" class="numeric validate k-txt-box" readonly="readonly">
            <span class="error p-0 k-error" id="total_amout_error">
            </span>
        </div>
    </div>

    <div class="row">

        <div class="input-field col s8 k-dropdown">
            <label for="admin_payment_date" >
                {{trans('message.payment_day')}} <span>*</span>
            </label>
            <select name="admin_payment_date" id="admin_payment_date" class="browser-default paymentDay">
                <option value="" selected>{{trans('message.select')}}</option>
            </select>
            <span class="error p-0 k-error" id="admin_payment_date_error">
            </span>
        </div>

        <div class="input-field col s4 k-input-text">
            <label for="admin_payment_amount">
                {{trans('message.amount')}}  <span>*</span>
            </label>
            <input id="admin_payment_amount" name="admin_payment_amount" type="text" class="numeric validate k-txt-box" readonly="readonly">
            <span class="error p-0 k-error" id="admin_payment_amount_error">
            </span>
        </div>

    </div>

    <div class="row">
        <div class="input-field col s12  k-input-text" >
            <label for="admin_payment_description">
                {{trans('message.description')}}  <span>*</span>
            </label>
            <textarea class="materialize-textarea k-textarea" name="admin_payment_description" rows="2" id="admin_payment_description"></textarea>
            <span class="error p-0 k-error" id="admin_payment_description_error">
            </span>
        </div>
    </div>

    <div class="modal_button_center">
        <button class="action-btn  btn k-button-fill k-btn-normal k-icon saveAdminPayment" type="submit">
            <img src="{{asset('img/plus-bl.png')}}">  {{trans('message.add_request')}}
        </button>
    </div>
</form>
