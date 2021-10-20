<div class="card box-shadow-none m-0 pb-1">
    <div class="card-header display-flex justify-content-between align-items-center">
        <h6 class="m-0" id="infoName"></h6>
        <div class="app-file-action-icons display-flex align-items-center">
            <a href="#" data-url="{{route('file.delete')}}" class="delete" style="color: #e26060;"> <i class="material-icons mr-10">delete</i></a>
            <i class="material-icons close-icon">close</i>
        </div>
    </div>
    <div class="card-content">
        <ul class="tabs tabs-fixed-width mb-1">
            <li class="tab mr-1 pr-1">
                <a class="active display-flex align-items-center" id="details-tab" href="#details">
                    <i class="material-icons mr-1">content_paste</i>
                    <span>{{trans('message.details')}}</span>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="details-tab active" id="details">
                <div class="display-flex align-items-center flex-column pb-2 pt-4">
                    <span id="infoIcon"></span>
                    <p class="mt-4" id="infoSize2"></p>
                </div>
                <div class="divider mt-5 mb-5"></div>

                <span class="app-file-label">{{trans('message.info')}}</span>
                <div class="display-flex justify-content-between align-items-center mt-6">
                    <p>{{trans('message.type')}}</p>
                    <p class="font-weight-700" id="infoType"></p>
                </div>
                <div class="display-flex justify-content-between align-items-center mt-6">
                    <p>{{trans('message.size')}}</p>
                    <p class="font-weight-700" id="infoSize"></p>
                </div>
                <div class="display-flex justify-content-between align-items-center mt-6">
                    <p>{{trans('message.location')}}</p>
                    <p class="font-weight-700" id="infoLocation"></p>
                </div>

                <div class="display-flex justify-content-between align-items-center mt-6">
                    <p>{{trans('message.created')}}</p>
                    <p class="font-weight-700" id="infoDate"></p>
                </div>
                <div class="display-flex justify-content-between align-items-center mt-6">
                    <p>{{trans('message.link')}}</p>
                    <p class="font-weight-700" id="infoDowload"></p>
                </div>
            </div>
        </div>
    </div>
</div>
