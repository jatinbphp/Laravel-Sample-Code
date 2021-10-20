<div class="table-block table-block-new">
    <table class="responsive-table" id="userfeedPayment" style="width:100%">
        <thead>
            <tr>
                <th class="center">
                    <label  class=" k-checkbox-fill">
                        <input type="checkbox" class="filled-in main_checkbox" />
                        <span class=""></span>
                    </label>
                </th>
                @foreach(getUserfeedPaymentFields() as $fieldId => $val)
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
            <a href="#" class="close-modal-payment-request"><img src="{{asset('img/icon-close.png')}}" alt=""></a>
        </div>
    </div>
    <div class="modalx-content">

    </div>
</div>

<form id="userfeed-payment-filter" name="userfeed-payment-filter">
    <input type="hidden"  class="resetPayment type" id="typeUserFeed">
    <input type="hidden"  class="resetPayment type" id="periodUserFeed">
    <input type="hidden"  class="resetPayment date" id="dateUserFeed">
    <input type="hidden"  class="resetPayment status" id="statusUserFeed">
    <input type="hidden"  class="resetPayment amount" id="amountUserFeed">
    <input type="hidden"  class="resetPayment from_date" id="fromUserfeedDropdown">
    <input type="hidden"  class="resetPayment to_date" id="toUserfeedDropdown">
    <input type="hidden" class="resetPayment emiAmountFilter" name="amount" id="emiAmountFilter">
    <input type="hidden" class="resetPayment totalAmountFilter" name="amount" id="totalAmountFilter">
</form>
