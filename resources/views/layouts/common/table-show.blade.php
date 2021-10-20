<form name="form-datatable-custom" id="form-datatable-custom">
    <a class="round-border-button dataTableClear cleare-popup tooltipped" href="#" data-tooltip="{{trans('message.clear_all_filter')}}" data-type="{{$dataTable}}">
        <i class="material-icons">clear</i>
    </a>
    <input type="hidden" name="datatable_name" id="datatableName" class="datatableName" value="{{$dataTable}}">
    <div class="input-group input-field k-input-text">
        <input type="text" name="number" id="number" class="validate k-txt-box numeric customShow" maxlength="5" />
    </div>
    <div class="modal_button_center">
        <a class="submitCustomShow dropdown-trigger round-border-button setting-icon" href="#">
            <i class="material-icons">visibility</i>
        </a>
    </div>
</form>
