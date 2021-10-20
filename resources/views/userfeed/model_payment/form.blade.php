<form id="form-add-model-payment" name="form-add-model-payment" class="display-flex flex-column h-100 justify-content-between">
    <div class="row">
        <div class="input-field  col s6 k-input-text">
            <label for="name3">
                {{trans('message.start_range')}} <span>*</span>
            </label>
            <input id="start_range" name="start_range" type="text" class="validate numeric k-txt-box" @if(isset($modelPayment)) value="{{$modelPayment->start_range}}" @endif maxlength="5">
            <span class="error k-error" id="start_range_error">
            </span>
        </div>

        <div class="input-field col s6 k-input-text">
            <label for="name3" class="label-form-control-block">
                <p>{{trans('message.end_range')}} <span>*</span></p>

                <div class="label-with-checkbox">
                    <label  class=" k-checkbox-fill">
                        <input type="hidden" name="is_infinite" id="is_infinite" value="0">
                        <input type="checkbox" class="filled-in infiniteRange" value="1" name="is_infinite" @if(isset($modelPayment) && $modelPayment->end_range == 'infinite') checked='checked' @endif />
                        <span class=""> {{trans('message.infinite')}}</span>
                    </label>
                </div>
            </label>
            <input id="end_range" name="end_range" type="text" class="validate numeric k-txt-box endRange" @if(isset($modelPayment)) value="{{$modelPayment->end_range}}" @endif maxlength="5" @if(isset($modelPayment) && $modelPayment->end_range == 'infinite') readonly='readonly'  @endif>
            <span class="error k-error" id="end_range_error">
            </span>
        </div>
    </div>

    <div class="row">

        <div class="input-field col s6 k-dropdown">
            <label for="transfer_type" >
                {{trans('message.payment_type')}} <span>*</span>
            </label>
            <select name="type" id="typeModelPayment" class="browser-default">
                <option value="">{{trans('message.select')}}</option>
                @foreach(getModelPaymentType() as $fieldId => $val)
                <option value="{{$fieldId}}" @if(isset($modelPayment) && $modelPayment->type == $fieldId) selected='selected'  @endif >{{$val}}</option>
                @endforeach
            </select>
            <span class="error p-0 k-error" id="type_error">
            </span>
        </div>

        <div class="input-field  col s6 k-input-text">
            <label for="name3">
                {{trans('message.value')}} <span>*</span>
            </label>
            <input id="valueModelPayment" name="value" type="text" class="numeric k-txt-box" @if(isset($modelPayment)) value="{{$modelPayment->value}}" @endif maxlength="5">
            <span class="error k-error" id="value_error">
            </span>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
            <div class="modal_button_center">
                @if(isset($modelPayment))
                <button class="ml-4  btn k-button-fill k-btn  submit-edit-interview action-btn btnModelPaymentUpdate" name="action" type="submit" data-id="{{$modelPayment->id}}">
                    <img src="{{asset('img/edit.png')}}" alt="">
                    {{trans('message.update')}} {{trans('message.range')}}
                </button>
                @else
                <button class="action-btn  btn k-button-fill k-icon btnModelPaymentSave" type="submit">
                    <img src="{{asset('img/plus-bl.png')}}">{{trans('message.add')}} {{trans('message.range')}}
                </button>
                @endif
            </div>
        </div>
    </div>
</form>
