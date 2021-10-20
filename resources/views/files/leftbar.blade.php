<div class="sidebar-left">
    <div class="app-file-sidebar display-flex">
        <div class="app-file-sidebar-left">
            <span class="app-file-sidebar-close hide-on-med-and-up"><i class="material-icons">close</i></span>
            <div class="app-file-sidebar-content">
                <!-- App File Left Sidebar - Drive Content Starts -->
                <span class="app-file-label">{{trans('message.my_drive')}}</span>
                <div class="collection file-manager-drive mt-3">
                    <a href="#" class="collection-item file-item-action active">
                        <div class="fonticon-wrap display-inline mr-3">
                            <i class="material-icons">folder_open</i>
                        </div>
                        <span>{{trans('message.folders')}}</span>
                        <span class="chip red lighten-5 float-right red-text">{{$folders_count}}</span>
                    </a>
                    <a href="#" class="collection-item file-item-action active">
                        <div class="fonticon-wrap display-inline mr-3">
                            <i class="material-icons">content_paste</i>
                        </div>
                        <span>{{trans('message.files')}}</span>
                        <span class="chip red lighten-5 float-right red-text">{{$files_count}}</span>
                    </a>
                </div>

                <span class="app-file-label">{{trans('message.disk_storage_space')}}</span>
                <div class="display-flex mb-1 mt-3">
                    <div class="fonticon-wrap mr-3">
                        <i class="material-icons storage-icon">sd_card</i>
                    </div>
                    <div class="file-manager-progress">
                        <small>{{$space['used']}} {{trans('message.busy_from')}} {{$space['total']}}</small>
                        <div class="progress pink lighten-5 mt-0">
                            <div class="determinate" style="width: {{$space['procent']}}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
