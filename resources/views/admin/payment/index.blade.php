<div class="card-panel border-radius-6 card-with-header p-0 mt-0">
    <div class="card-header paymentAdmin">
        <h4 class="k-h4">{{trans('message.payment')}}</h4>
        <div class="model-block-row"></div>
    </div>
    <div class="table-block  table-block-new">
        <table class="striped highlight" id="paymentAdmin" style="width:100%">
            <thead>
                <tr>
                    <th class="center">
                        <label  class=" k-checkbox-fill">
                            <input type="checkbox" class="filled-in main_checkbox" />
                            <span class=""></span>
                        </label>
                    </th>
                    @foreach(getAdminPaymentFields() as $fieldId => $val)
                        <th class="center">{{$val}}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <div id="modal-admin_payment_request" class="modalx bottom-sheet hidden modal-custom modal-small">
        <div class="modal-header">
            <h4 class="k-h4">{{trans('message.payment')}} {{trans('message.request')}}</h4>
            <div class="buttons-group">
                <a href="#" class="close-modal_payment_request"><img src="{{asset('img/icon-close.png')}}" alt=""></a>
            </div>
        </div>
        <div class="modalx-content">

        </div>
    </div>
    <form id="form-payment-filter" name="form-payment-filter">
        <input type="hidden"  class="resetPayment name" id="paymentName">
        <input type="hidden" name="date"  class="resetPayment datePaymentFilter" id="date">
        <input type="hidden" name="status" class="resetPayment status" id="paymentStatus">
        <input type="hidden" name="from_date"  class="resetPayment from_date" id="from_datePayment">
        <input type="hidden" name="to_date"  class="resetPayment to_date" id="to_datePayment">
        <input type="hidden" class="resetPayment amountPaymentFilter" name="amount" id="paymentAmount">
        <input type="hidden" class="resetPayment emiAmountFilter" name="amount" id="paymentAmount">
        <input type="hidden" class="resetPayment totalAmountFilter" name="amount" id="paymentAmount">
        <input type="hidden" name="usertype"  class="resetPayment usertype" id="usertypePayment">
    </form>
</div>
