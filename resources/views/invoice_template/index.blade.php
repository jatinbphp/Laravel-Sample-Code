<div class="card-panel border-radius-6 card-with-header p-0 mt-0">
    <div class="card-header invoiceTemplateList">
        <h4 class="k-h4">{{trans('message.invoice')}} {{trans('message.templates')}}</h4>
        @include("layouts.common.multiple_action",['type' =>'invoiceTemplate','ac'=>['delete','status']])
        <div class="model-block-row"></div>
    </div>

    <div class="table-block  table-block-new">
        <table class="striped table-loader highlight" id="invoiceTemplateList" style="width:100%">
            <thead>
                <tr>
                    <th class="center">
                        <label  class=" k-checkbox-fill">
                            <input type="checkbox" class="filled-in main_checkbox" />
                            <span class=""></span>
                        </label>
                    </th>
                    @foreach(getInvoiceTemplateFields($userType) as $fieldId => $val)
                        <th class="center">
                            {{$val}}
                            @if($val == trans('message.actions'))
                                <a id="" class="delete-icon showHelpQue" data-module="InvoiceTemplate" data-type="action-bar">
                                    <i class="material-icons">help</i>
                                </a>
                            @endif
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<div id="modal-invoice-template" class="modalx bottom-sheet hidden modal-custom">
    <div class="modal-header">
        <h4 class="k-h4 modalTitle">{{trans('message.add')}} {{trans('message.invoice')}} {{trans('message.template')}}</h4>
        <div class="buttons-group">
            <a id="" class="delete-icon showHelpQue" data-module="invoiceTemplate" data-type="add-update">
                <i class="material-icons">help</i>
            </a>

            <a href="#" class="close-invoice-template">
                <img src="{{asset('img/icon-close.png')}}" alt="">
            </a>
        </div>
    </div>
    <div class="modalx-content">
    </div>
</div>
<form id="form-invoice-template-filter" name="form-invoice-template-filter">
    <input type="hidden"  class="resetInvoiceTemplate agencyName" id="agencyName">
    <input type="hidden"  class="resetInvoiceTemplate studioName" id="studioName">
    <input type="hidden"  class="resetInvoiceTemplate roleName" id="roleName">
    <input type="hidden"  class="resetInvoiceTemplate templateName" id="templateName">
    <input type="hidden"  class="resetInvoiceTemplate templateStatus" id="templateStatus">
</form>

@push('js')
<script src="{{ asset('js/superadmin/invoice_template.js')}}"></script>
@endpush
