<div class="card-panel border-radius-6 card-with-header p-0 mt-0">
    <div class="card-header studioList">
        <h4 class="k-h4">
            @if($userType == 'superAdmin')
                <span class="multiBread hidden">
                    <a id="breadAgencyName">
                        {{trans('message.agency')}}
                    </a>
                    <i class="material-icons materialIcons">keyboard_arrow_right</i>
                    <a id="breadStudioName">
                        {{trans('message.studios')}}
                    </a>
                </span>
                <span class="singleBread">
                    {{trans('message.studios')}}
                </span>
            @else
                {{trans('message.studios')}}
            @endif
        </h4>
        @include("layouts.common.multiple_action",['type' =>'studio','ac'=>['delete','status']])
        <div class="model-block-row"></div>
    </div>
    <div class="table-block table-block-new">
        <table class="striped table-loader highlight" id="studioList" style="width:100%">
            <thead>
                <tr>
                    <th class="center">
                        <label  class=" k-checkbox-fill">
                            <input type="checkbox" class="filled-in main_checkbox" />
                            <span class=""></span>
                        </label>
                    </th>
                    @foreach(getStudioFields($userType) as $fieldId => $val)
                        <th class="center">
                            {{$val}}
                            @if($val == trans('message.actions'))
                                <a id="" class="delete-icon showHelpQue" data-module="Studio" data-type="action-bar">
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

<div id="modal-admin-studio" class="modalx bottom-sheet hidden modal-custom modal-small">
    <div class="modal-header">
        <h4 class="k-h4 modalTitle">{{trans('message.add')}} {{trans('message.studio')}}</h4>
        <div class="buttons-group">
            <a id="" class="delete-icon showHelpQue" data-module="Studio" data-type="add-update">
                <i class="material-icons">help</i>
            </a>

            <a href="#" class="close-admin-studio">
                <img src="{{asset('img/icon-close.png')}}" alt="">
            </a>
        </div>
    </div>
    <div class="modalx-content">

    </div>
</div>

<div id="modal-studio-admin-list" class="modalx bottom-sheet hidden modal-custom newAgencyListModal">
    <div class="modalx-content">
        <div class="card-panel border-radius-6 card-with-header p-0 mt-0">
            <div class="card-header agencyStudioAdminList">
                <h4 class="k-h4">{{trans('message.users')}} {{trans('message.list')}}</h4>
                @include("layouts.common.multiple_action",['modalType' =>'studioAdmin'])
                <div class="model-block-row"></div>
            </div>

            <div class="table-block  table-block-new">
                <table class="striped table-loader highlight" id="agencyStudioAdminList" style="width:100%">
                    <thead>
                        <tr>
                            <th class="center">
                                <label  class=" k-checkbox-fill">
                                    <input type="checkbox" class="filled-in main_checkbox" />
                                    <span class=""></span>
                                </label>
                            </th>
                            @foreach(getStudioAdminFields($userType) as $fieldId => $val)
                                <th class="center">
                                    {{$val}}
                                    @if($val == trans('message.actions'))
                                        <a id="" class="delete-icon showHelpQue" data-module="StudioAdmin" data-type="action-bar">
                                            <i class="material-icons">help</i>
                                        </a>
                                    @endif
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include("studio_admin.modal")

<form id="form-studio-filter" name="form-studio-filter">
    <input type="hidden"  class="resetStudioFilter agencyName" id="agencyName">
    <input type="hidden"  class="resetStudioFilter studioName" id="studioName">
    <input type="hidden"  class="resetStudioFilter studioEmail" id="studioEmail">
    <input type="hidden"  class="resetStudioFilter studioCity" id="studioCity">
    <input type="hidden"  class="resetStudioFilter studioState" id="studioState">
    <input type="hidden"  class="resetStudioFilter studioCountry" id="studioCountry">
    <input type="hidden"  class="resetStudioFilter studioPinCode" id="studioPinCode">
    <input type="hidden"  class="resetStudioFilter studioStatus" id="studioStatus">
    <input type="hidden"  class="resetStudioFilter studioPhoneNo" id="studioPhoneNo">
</form>

@push('js')
<script src="{{ asset('js/superadmin/studio.js')}}"></script>
<script src="{{ asset('js/superadmin/studio_admin.js')}}"></script>
@endpush
