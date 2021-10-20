<div class="card-panel border-radius-6 card-with-header p-0 mt-0">
    <div class="card-header contractModel">
        <h4 class="k-h4">{{trans('message.contract')}} {{trans('message.model')}}</h4>
        <div class="model-block-row"></div>
    </div>

    <div class="table-block  table-block-new">
        <table class="striped highlight" id="contractModel" style="width:100%">
            <thead>
                <tr>
                    <th class="center">
                        <label  class=" k-checkbox-fill">
                            <input type="checkbox" class="filled-in main_checkbox" />
                            <span class=""></span>
                        </label>
                    </th>
                    @foreach(getContractModelFields() as $fieldId => $val)
                        <th class="center">
                            {{$val}}
                            @if($val == trans('message.actions'))
                                <a id="" class="delete-icon showHelpQue" data-module="ServiceRequest" data-type="action-bar">
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

<form id="form-space-model-filter" name="form-space-model-filter">
    <input type="hidden"  class="resetContractModel name" id="nameModel">
    <input type="hidden"  class="resetContractModel email" id="emailModel">
    <input type="hidden"  class="resetContractModel realName" id="realNameModel">
    <input type="hidden"  class="resetContractModel phone" id="phoneModel">
    <input type="hidden"  class="resetContractModel model_status" id="modelStatus">
</form>

@push('js')
    <script src="{{ asset('js/superadmin/model.js')}}"></script>
@endpush
