<div class="card-panel border-radius-6 card-with-header p-0 mt-0">
    <div class="card-header agencyStudioList_{{$iTableCounter}}">
        <h4 class="k-h4">{{trans('message.studio')}}</h4>
        <div class="model-block-row"></div>
    </div>
    <div class="table-block  table-block-new">
        <table class="striped highlight" id="agencyStudioList_{{$iTableCounter}}" style="width:100%">
            <thead>
                <tr>
                    <th class="center">
                        <label  class=" k-checkbox-fill">
                            <input type="checkbox" class="filled-in main_checkbox" />
                            <span class=""></span>
                        </label>
                    </th>
                    @foreach(getStudioFields("superAdmin") as $fieldId => $val)
                        @if($val != trans('message.admin'))
                            <th class="center">{{$val}}</th>
                        @endif
                    @endforeach
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
