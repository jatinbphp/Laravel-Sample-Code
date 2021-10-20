<div class="table-block  table-block-new">
    <table class="striped highlight" id="flowTypeList" style="width:100%">
        <thead>
            <tr>
                <th class="center">
                    <label  class=" k-checkbox-fill">
                        <input type="checkbox" class="filled-in main_checkbox" />
                        <span class=""></span>
                    </label>
                </th>
                @foreach(getFlowTypeFields() as $fieldId => $val)
                    <th class="center">{{$val}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<div id="modal-flow-type-request" class="modalx bottom-sheet hidden modal-custom modal-small">
    <div class="modal-header">
        <h4 class="k-h4 modalTitle">{{trans('message.add')}} {{trans('message.flows_builder')}}</h4>
        <div class="buttons-group">
            <a href="#" class="close-flow-type-request"><img src="{{asset('img/icon-close.png')}}" alt=""></a>
        </div>
    </div>
    <div class="modalx-content">

    </div>
</div>
<form id="form-flow-type-filter" name="form-flow-type-filter">
    <input type="hidden"  class="resetFlowType probleName" id="probleName">
    <input type="hidden"  class="resetFlowType flowTypeName" id="flowTypeName">
</form>
