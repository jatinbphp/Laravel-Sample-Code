<div class="card-panel border-radius-6 card-with-header p-0 mt-0">
    <div class="card-header {{$op}}">
        <h4 class="k-h4">
            @if($op == 'userContractList')
                <span class="multiBread hidden">
                    @if($userType == 'superAdmin')
                        <a id="breadAgencyName">
                            {{trans('message.agency')}}
                        </a>
                        <i class="material-icons materialIcons">keyboard_arrow_right</i>
                    @endif
                    @if($userType == 'superAdmin' || $userType == 'agencyAdmin')
                        <a id="breadStudioName">
                            {{trans('message.studio')}}
                        </a>
                        <i class="material-icons materialIcons">keyboard_arrow_right</i>
                    @endif
                </span>
            @endif
            {{trans('message.contracts')}}
        </h4>

        @include("layouts.common.multiple_action",['type' =>'userContract','ac'=>['delete','status','send','download_all_UC','print_all_UC']])
    </div>
    <div class="table-block table-block-new">
        <table class="striped highlight table-loader userContractTable" id="{{$op}}" style="width:100%">
            <thead>
                <tr>
                    <th class="center">
                        <label  class=" k-checkbox-fill">
                            <input type="checkbox" class="filled-in main_checkbox" />
                            <span class=""></span>
                        </label>
                    </th>
                    @foreach(getUserContractFields($userType) as $fieldId => $val)
                        <th class="center">
                            {{$val}}
                            @if($val == trans('message.actions'))
                                <a id="" class="delete-icon showHelpQue" data-module="UserContract" data-type="action-bar">
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
