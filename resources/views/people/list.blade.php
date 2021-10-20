<div class="card-panel border-radius-6 card-with-header p-0 mt-0">
    <div class="card-header tabNoPadding">
        <div class="model-block-row"></div>
        <div class="head-tab-horizontal">
            @if($op == 'first')
                <ul id="menu-2" class="tabs peopleAdminTab">
                    <li class="tab">
                        <a href="#agency-admin-tab" data-name='first' class="agencyAdminTab filterBar peopelFirstTabSave active" data-filter='agency_admin' data-close="closeAgencyAdminFilter" data-cls="agencyAdminTab">
                            <span>{{trans('message.agency')}} {{trans('message.admin')}}</span>
                        </a>
                    </li>
                    <li class="tab">
                        <a href="#studio-admin-tab" data-name='first' class="agencyStudioAdminTab filterBar peopelFirstTabSave active" data-filter='studio_admin' data-close="closeStudioAdminFilter" data-cls="agencyStudioAdminTab">
                            <span>{{trans('message.studio')}} {{trans('message.admin')}}</span>
                        </a>
                    </li>
                </ul>
            @endif

            @if($op == 'second')
                <!-- <ul id="menu-3" class="tabs">
                    <li class="tab">
                        <a href="#model-user-tab" class="peopleModelTab filterBar peopelSecondTabSave active" data-filter='peopel_model' data-close="closePeopleModelFilter" data-cls="peopleModelTab">
                            <span>{{trans('message.model')}}</span>
                        </a>
                    </li>
                </ul> -->
            @endif
        </div>
    </div>
</div>
