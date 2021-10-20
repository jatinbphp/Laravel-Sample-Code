
<div class="card-panel card-with-header p-0 border-radius-6 pt-2 mt-0">
    <div class="row ml-0 mr-0 flex-wrap">
        <form id="form-user-permission" name="form-user-permission">
            <div class="row ml-0 mr-0 flex-wrap">
                <div class="col s12 mb-2">
                    <div class="card-panel card-with-header p-0 border-radius-6 mt-0 mb-0 h-100">
                        <div class="card-header">
                            <h4 class="k-h4"> {{trans('message.user')}} {{trans('message.role')}}</h4>
                        </div>
                        <div class="card-inner-continer">
                            <div class="row">
                                <div class="input-field col s4 k-dropdown">
                                    <label for="name3">
                                        {{trans('message.role')}} <span>*</span>
                                    </label>
                                    <select id="role_id" name="role_id" class="loadSelect">
                                        <option value="">{{trans('message.select')}}</option>
                                        @foreach(getRoles() as $roleId => $role)
                                          <option value="{{$roleId}}" data-badge="" @if(isset($user) && $roleId == $user->role_id) selected='selected' @endif>{{$role}}</option>
                                        @endforeach
                                    </select>
                                    <span class="error k-error" id="agency_id_error">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col s12 mb-2">
                <div class="card-panel card-with-header p-0 border-radius-6 mt-0 mb-0 h-100">
                    <div class="card-header">
                        <h4 class="k-h4"> {{trans('message.user')}} {{trans('message.permission')}}</h4>
                    </div>
                    <div class="card-inner-continer">
                            @php
                                $permission = getUserPermission();
                            @endphp

                            <div class="row ml-0 mr-0 flex-wrap">
                                @foreach(getRoleModule($userRoleName) as $moduleId => $module)
                                    @php
                                        $html = userModulePermission($moduleId);
                                    @endphp
                                    <div class="col s6 mb-2">
                                        <div class="card-panel card-with-header p-0 border-radius-6 mt-0 mb-0 h-100">
                                            <div class="card-header">
                                                <label class="permissionCheckBox k-checkbox-fill">
                                                    <input type="checkbox" class="filled-in module_{{$moduleId}} permissionModule" name="{{$moduleId}}" id="{{$moduleId}}" data-id="{{$moduleId}}" value="{{$moduleId}}" {{$html}}/>
                                                    <span> <h4 class="k-h4"> {{$module}}</h4> </span>
                                                </label>
                                            </div>
                                            <div class="card-inner-continer permissionList" data-id="{{$moduleId}}">
                                                <div class="row">
                                                    @foreach(getModuleAction($moduleId) as $actionId => $action)
                                                        <div class="col s6 mb-2">
                                                            <label class="permissionCheckBox k-checkbox-fill">
                                                                <input type="checkbox" class="filled-in permissionCheck permission_{{$moduleId}}" name="permission[{{$actionId}}]" value="{{$actionId}}" id="{{$actionId}}" id="{{$actionId}}" @if(in_array($actionId,$permission)) checked="checked" @endif/><span class="">
                                                                    <h5 class="k-h4">{{$action}} </h5>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="input-field col s12">
                                <button class="action-btn  btn k-button-fill k-btn-normal k-btn-icon right btnPermissionUpdate" name="action" type="submit"><img src="{{asset('img/edit.png')}}" alt="">  {{trans('message.update')}} </button>
                            </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
