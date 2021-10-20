<form name="form-save-filter" id="form-save-filter">
    <a class="round-border-button filterSaveClear cleare-popup" href="#">
        <i class="material-icons">clear</i>
    </a>
    <div class="input-group input-field k-input-text">
        <input type="text" name="filter_name" id="filter_name" class="validate k-txt-box myFilterName" required="required" @if(isset($filterName)) value="{{$filterName}}" @endif/>
        <span class="error k-error" id="filter_name_error">
            </span>
    </div>
    <div class="modal_button_center">
        @if(isset($filterName))
            <a class="submitFilterUpdate dropdown-trigger round-border-button setting-icon" href="#" data-id="{{$filterId}}">
                <i class="material-icons">edit</i>
            </a>
        @else
            <a class="submitFilterSave dropdown-trigger round-border-button setting-icon" href="#">
                <i class="material-icons">add_circle_outline</i>
            </a>
        @endif
    </div>
</form>
