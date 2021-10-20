<div class="card-panel border-radius-6 card-with-header p-0 mt-0">
    <div class="card-header adminUserList">
        <h4 class="k-h4">
            {{trans('message.users')}}
        </h4>
        @include("layouts.common.multiple_action",['type' =>'adminUser','ac'=>['delete','status']])
        <div class="model-block-row"></div>
    </div>

    <div class="table-block  table-block-new">
        <table class="striped highlight" id="adminUserList" style="width:100%">
            <thead>
                <tr>
                    <th class="center">
                        <label  class=" k-checkbox-fill">
                            <input type="checkbox" class="filled-in main_checkbox" />
                            <span class=""></span>
                        </label>
                    </th>
                    @foreach(getAdminUserFields($userType) as $fieldId => $val)
                        <th class="center">
                            {{$val}}
                            @if($val == trans('message.actions'))
                                <a id="" class="delete-icon showHelpQue" data-module="AdminUser" data-type="action-bar">
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

<div id="modal-admin-user" class="modalx bottom-sheet hidden modal-custom modal-small">
    <div class="modal-header">
        <h4 class="k-h4 modalTitle">{{trans('message.add')}} {{trans('message.admin')}} {{trans('message.user')}}</h4>
        <div class="buttons-group">
            <a id="" class="delete-icon showHelpQue" data-module="AdminUser" data-type="add-update">
                <i class="material-icons">help</i>
            </a>

            <a href="#" class="close-admin-user">
                <img src="{{asset('img/icon-close.png')}}" alt="">
            </a>
        </div>
    </div>
    <div class="modalx-content">

    </div>
</div>

<form id="form-admin-user-filter" name="form-admin-user-filter">
    <input type="hidden"  class="resetAdminUserFilter studioName" id="studioName">
    <input type="hidden"  class="resetAdminUserFilter agencyName" id="agencyName">
    <input type="hidden"  class="resetAdminUserFilter roleName" id="roleName">
    <input type="hidden"  class="resetAdminUserFilter adminUserName" id="adminUserName">
    <input type="hidden"  class="resetAdminUserFilter adminUserEmail" id="adminUserEmail">
    <input type="hidden"  class="resetAdminUserFilter adminUserPhone" id="adminUserPhone">
    <input type="hidden"  class="resetAdminUserFilter adminUserStatus" id="adminUserStatus">
</form>

@push('js')
<script src="{{ asset('js/superadmin/admin_user.js')}}"></script>
@endpush
