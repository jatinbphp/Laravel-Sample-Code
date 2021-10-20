<div class="table-block table-block-new">
    <table class="responsive-table" id="modelPayment" style="width:100%">
        <thead>
            <tr>
                <th class="center">
                    <label  class=" k-checkbox-fill">
                        <input type="checkbox" class="filled-in main_checkbox" />
                        <span class=""></span>
                    </label>
                </th>
                @foreach(getModelPaymentFields() as $fieldId => $val)
                    <th class="center">{{ $val }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<div id="model-payment" class="modalx bottom-sheet hidden modal-custom modal-small">
    <div class="modal-header">
        <h4>{{trans('message.income')}} {{trans('message.range')}}</h4>
        <div class="buttons-group">
            <a href="#" class="close-model-payment">
                <img src="{{asset('img/icon-close.png')}}" alt="">
            </a>
        </div>
    </div>
    <div class="modalx-content">
    </div>
</div>

<form id="model-payment-filter" name="model-payment-filter">
    <input type="hidden" name="model_payment_type" id="model_payment_type" class="resetModelPayment modelPaymentType">
    <input type="hidden" name="model_payment_value" id="model_payment_value" class="resetModelPayment modelPaymentValue">
    <input type="hidden" name="model_payment_income" id="model_payment_income" class="resetModelPayment modelPaymentIncome">
</form>
