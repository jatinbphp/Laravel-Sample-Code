@if(isset($type))
    <div class="action-button-filter-add right-filter-button-group multiple-buttons hidden">

        @if(isset($ac) && in_array("delete",$ac))
            {!! getDeleteClsByType($type) !!}
        @endif

        @if(isset($ac) && in_array("status",$ac))
            {!! getStatusClsByType($type) !!}
        @endif

        @if(isset($ac) && in_array("send",$ac))
            @can('user-contract-send')
                <a class="round-border-button plus-add-icon {{$type}}SendSelect multipleSend plus-r" href="#" title="{{trans('message.send')}}">
                    <i class="material-icons">send</i>
                </a>
            @endcan
        @endif

        @if(isset($ac) && in_array("download",$ac))
            <a id="" class="delete-icon round-border-button plus-add-icon multipleDownload {{$type}}DownloadSelect" href="#" title="{{trans('message.download')}}">
                <i class="material-icons">file_download</i>
            </a>
        @endif

        @if(isset($ac) && in_array("download_all_UC",$ac))
            @canany(['user-contract-download', 'service-request-download-training','service-request-download-spaces'])
                <a data-target="dropdownUCDAll" data-beloworigin="true" data-position="top" class="delete-icon round-border-button plus-add-icon multipleDownload dropdown-trigger" title="{{trans('message.download')}}">
                    <i class="material-icons">file_download</i>
                </a>

                <ul id='dropdownUCDAll' class='dropdown-content modal-filter-dropdown actionDropDown'>
                    @can(['user-contract-download', 'service-request-download-training','service-request-download-spaces'])
                        <li>
                            <a class="delete {{$type}}DownloadAll" title="Download All">
                                <i class="material-icons">file_download</i>
                                {{ trans('message.download') }} {{ trans('message.all') }}
                            </a>
                        </li>
                    @endcan

                    @can('user-contract-download')
                        <li>
                            <a class="delete {{$type}}DownloadSelect" title="Download Contract">
                                <i class="material-icons">file_download</i>
                                {{ trans('message.download') }} {{ trans('message.contract') }}
                            </a>
                        </li>
                    @endcan

                    @can('service-request-download-training')
                        <li>
                            <a class="delete {{$type}}DownloadTSR" title="Download Training Service Order">
                                <i class="material-icons">file_download</i>
                                {{ trans('message.download') }} T. S. R.
                            </a>
                        </li>
                    @endcan

                    @can('service-request-download-spaces')
                        <li>
                            <a class="delete {{$type}}DownloadSSR" title="Download Spaces Service Order">
                                <i class="material-icons">file_download</i>
                                {{ trans('message.download') }} S. S. R.
                            </a>
                        </li>
                    @endcan

                </ul>
            @endcan
        @endif

        @if(isset($ac) && in_array("print_all_UC",$ac))
            @canany(['user-contract-print', 'service-request-print-training','service-request-print-spaces'])
                <a data-target="dropdownUCPAll" data-beloworigin="true" data-position="top" class="delete-icon round-border-button plus-add-icon multipleDownload dropdown-trigger" title="{{trans('message.print')}}">
                    <i class="material-icons">print</i>
                </a>

                <ul id='dropdownUCPAll' class='dropdown-content modal-filter-dropdown actionDropDown'>
                    @can(['user-contract-print', 'service-request-print-training','service-request-print-spaces'])
                        <li>
                            <a class="delete {{$type}}PrintAll" title="Print All">
                                <i class="material-icons">print</i>
                                {{ trans('message.print') }} {{ trans('message.all') }}
                            </a>
                        </li>
                    @endcan

                    @can('user-contract-print')
                        <li>
                            <a class="delete {{$type}}PrintContract" title="Print Contract">
                                <i class="material-icons">print</i>
                                {{ trans('message.print') }} {{ trans('message.contract') }}
                            </a>
                        </li>
                    @endcan

                    @can('service-request-print-training')
                        <li>
                            <a class="delete {{$type}}PrintTSR" title="Print Training Service Order">
                                <i class="material-icons">print</i>
                                {{ trans('message.print') }} T. S. R.
                            </a>
                        </li>
                    @endcan

                    @can('service-request-print-spaces')
                        <li>
                            <a class="delete {{$type}}PrintSSR" title="Print Spaces Service Order">
                                <i class="material-icons">print</i>
                                {{ trans('message.print') }} S. S. R.
                            </a>
                        </li>
                    @endcan
                </ul>
            @endcan
        @endif

        @if(isset($ac) && in_array("download_all_AR",$ac))
            @can('activity-report-download')
                <a data-target="dropdownARDAll" data-beloworigin="true" data-position="top" class="delete-icon round-border-button plus-add-icon multipleDownload dropdown-trigger" title="{{trans('message.download')}}">
                    <i class="material-icons">file_download</i>
                </a>

                <ul id='dropdownARDAll' class='dropdown-content modal-filter-dropdown actionDropDown'>
                    <li>
                        <a class="delete {{$type}}DownloadAll" title="Download All">
                            <i class="material-icons">file_download</i>
                            {{ trans('message.download') }} {{ trans('message.all') }}
                        </a>
                    </li>

                    <li>
                        <a class="delete {{$type}}DownloadAR" title="Download Activity Reports">
                            <i class="material-icons">file_download</i>
                            {{ trans('message.download') }} Activity Reports
                        </a>
                    </li>

                    <li>
                        <a class="delete {{$type}}DownloadAI" title="Download Invoices">
                            <i class="material-icons">file_download</i>
                            {{ trans('message.download') }} Invoices.
                        </a>
                    </li>
                </ul>
            @endcan
        @endif

        @if(isset($ac) && in_array("print_all_AR",$ac))
            @can('activity-report-print')
                <a data-target="dropdownARPAll" data-beloworigin="true" data-position="top" class="delete-icon round-border-button plus-add-icon multipleDownload dropdown-trigger" title="{{trans('message.print')}}">
                    <i class="material-icons">print</i>
                </a>

                <ul id='dropdownARPAll' class='dropdown-content modal-filter-dropdown actionDropDown'>
                    <li>
                        <a class="delete {{$type}}PrintAll" title="Print All">
                            <i class="material-icons">print</i>
                            {{ trans('message.print') }} {{ trans('message.all') }}
                        </a>
                    </li>

                    <li>
                        <a class="delete {{$type}}PrintAR" title="Print Activity Reports">
                            <i class="material-icons">print</i>
                            {{ trans('message.print') }} Activity Reports
                        </a>
                    </li>

                    <li>
                        <a class="delete {{$type}}PrintAI" title="Print Invoices">
                            <i class="material-icons">print</i>
                            {{ trans('message.print') }} Invoices
                        </a>
                    </li>
                </ul>
            @endcan
        @endif

        @if(isset($ac) && in_array("accept",$ac))
            <a id="" class="delete-icon round-border-button plus-add-icon multipleStatus {{$type}}AcceptSelect" href="#" title="{{trans('message.accept')}}">
                <i class="material-icons">assignment_turned_in</i>
            </a>
        @endif

        @if(isset($ac) && in_array("activity_accept",$ac) && $userType == 'superAdmin')
            <a id="" class="delete-icon round-border-button plus-add-icon multipleStatus {{$type}}AcceptSelect" href="#" title="{{trans('message.accept')}}">
                <i class="material-icons">assignment_turned_in</i>
            </a>
        @endif
    </div>
@endif

@if(isset($modalType))
    <div class="action-button-filter-add right-filter-button-group">
        @if($modalType == 'agencyAdmin')
            {!! getAddCls('agency_admin') !!}

            {!! getDeleteClsByType('agencyAdmin') !!}

            {!! getStatusClsByType('agencyAdmin') !!}

            <a id="" class="delete-icon round-border-button plus-add-icon showHelpQuestion" data-module="{{getModuleByType('agency_admin')}}" data-type="filter-bar">
                <i class="material-icons">help</i>
            </a>

            {!! getViewColumnHtml('agency_admin',$userType) !!}

            <a href="#" class="delete-icon round-border-button setting-icon plus-r close-agency-admin-list">
                <img src="{{asset('img/image.png')}}" alt="">
            </a>
        @endif

        @if($modalType == 'studioAdmin')

                {!! getAddCls('studio_admin') !!}

                {!! getDeleteClsByType('studioAdmin') !!}

                {!! getStatusClsByType('studioAdmin') !!}


                <a id="" class="delete-icon round-border-button plus-add-icon showHelpQuestion" data-module="{{getModuleByType('studio_admin')}}" data-type="filter-bar">
                    <i class="material-icons">help</i>
                </a>

                {!! getViewColumnHtml('studio_admin',$userType) !!}

                <a href="#" class="delete-icon round-border-button setting-icon plus-r close-studio-admin-list">
                    <img src="{{asset('img/image.png')}}" alt="">
                </a>
        @endif

        @if($modalType == 'serviceRequest')
            {!! getAddCls('service_request') !!}

            {!! getDeleteClsByType('serviceRequest') !!}

            {!! getStatusClsByType('serviceRequest') !!}

            @can('service-request-accept-admin')
                <a id="" class="delete-icon round-border-button plus-add-icon multiple-buttons hidden multipleSend {{$modalType}}AdminAccept" href="#" title="{{trans('message.accept')}}">
                    <i class="material-icons">assignment_turned_in</i>
                </a>
            @endcan

            @can('service-request-download')
                <a id="" class="delete-icon round-border-button plus-add-icon multiple-buttons hidden multipleDownload {{$modalType}}DownloadSelect" href="#" title="{{trans('message.download')}}">
                    <i class="material-icons">file_download</i>
                </a>
            @endcan

            <a id="" class="delete-icon round-border-button plus-add-icon showHelpQuestion" data-module="{{getModuleByType('service_request')}}" data-type="filter-bar">
                <i class="material-icons">help</i>
            </a>

            {!! getViewColumnHtml('service_request',$userType) !!}

            <a href="#" class="delete-icon round-border-button setting-icon plus-r close-service-request-list">
                <img src="{{asset('img/image.png')}}" alt="">
            </a>
        @endif
    </div>
@endif
