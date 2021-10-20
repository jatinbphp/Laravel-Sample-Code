<div class="boking-filter-row">
    <div class="booking-filter-block">
        <a href="#" class="main-filter-btn">
            <span>
                <img src="{{asset('img/filter.png')}}">
            </span>
            {{trans('message.filter_by')}} :
        </a>
        <div class="filterNewData filterdate-block">

        </div>
        <!-- Dropdown Trigger -->
        <div class="button-triggle-parent">
            <a class="dropdown-trigger modal-filter-add-btn" href="#" data-target="filter-option">{{trans('message.add')}} {{trans('message.filter')}}!</a>
            <!-- Dropdown Structure -->

            <ul id="filter-option" class="dropdown-content modal-filter-dropdown saveFilterOption">
                @include("layouts.common.option")
            </ul>
        </div>
    </div>

    @include("layouts.common.action",['type' => $type])
</div>

<form id="form-filter-save" name="form-filter-save" class="filterDataSave">
</form>

<form id="form-filter-close" name="form-filter-close" class="filterCloseSave">
</form>
