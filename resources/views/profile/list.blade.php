<div class="card-panel border-radius-6 card-with-header p-0 mt-0">
    <div class="card-header tabNoPadding">
        <div class="model-block-row"></div>
        <div class="head-tab-horizontal">
            @if($op == 'first')
                <ul id="menu-2" class="tabs profileTab">
                    <li class="tab">
                        <a href="#profile-tab" class="filterBar profileFirstTabSave active">
                            <span>{{trans('message.user')}} {{trans('message.profile')}}</span>
                        </a>
                    </li>

                    @if(Session::has('impersonate'))
                        <li class="tab">
                            <a href="#profile-permission-tab" class="filterBar profileFirstTabSave active">
                                <span>{{trans('message.user')}} {{trans('message.permission')}}</span>
                            </a>
                        </li>
                    @endif
                </ul>
            @endif
        </div>
    </div>
</div>
