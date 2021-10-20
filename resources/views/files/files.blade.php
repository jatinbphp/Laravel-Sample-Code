<h6 class="font-weight-700 mb-3">
    <a href="#" class="upLvlRoot" style="letter-spacing: 1px;padding-right: 10px; color: #ff4081" data-folder="root">/Root</a>
    @foreach($breadcrumbs as $k => $breadcrumb)
        @if (($k+1)===count($breadcrumbs))
            <span style="letter-spacing: 1px;color: #888">/{{$breadcrumb['name']}}</span>
        @else
            <a href="#" style="letter-spacing: 1px;padding-right: 10px; color: #ff4081" class="{{($k+1)===count($breadcrumbs)?'current':'upLvL'}}"
               data-location="{{$breadcrumb['path']}}" data-name="{{$breadcrumb['name']}}">/{{$breadcrumb['name']}}</a>
        @endif
    @endforeach
</h6>

<!-- App File - Folder Section Starts -->
<div class="row">
    <div class="col xl3 l6 m3 s6">
        <span class="app-file-label">{{trans('message.folders')}}</span>
    </div>
    <div class="col xl3 l6 m3 s6">
        <div class="input-field add-new-file mt-0">
            <!-- Add File Button -->
            <button class=" btn k-button-fill k-btn-icon mb-10 addFolder">
                <i class="material-icons">add</i>
                <span>{{trans('message.create_folder')}}</span>
            </button>
        </div>
    </div>
    <div class="col xl l6 m6 s6">
        <div class="header-group add-folder-btn" style="display: none;" id="addFolderForm">
            <form action="{{route('file.add_folder')}}" >
                <div class="row">
                    <div class="input-field col  s7 k-input-text">
                        <label for="icon_prefix1">{{trans('message.folder_name')}}</label>
                        <input id="icon_prefix1" type="text" class="validate name k-txt-box" name="name">
                        <input type="hidden" name="location" value="{{$currentLocation}}">
                    </div>
                    <div class="input-field col s5">
                        <div class="input-field">
                            <button class=" btn k-button-fill" type="submit" name="action">
                                {{trans('message.save')}}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row app-file-folder mb-3" style="word-break: break-all">
    @forelse($items['folders'] as $folder)
        <div class="col xl3 l6 m4 s6 identifier" id="{{$folder->id}}">
            <div class="card box-shadow-none mb-1 app-file-info">
                <div class="card-content">
                    <div class="app-file-folder-content cursor-pointer display-flex align-items-center">
                        <div class="fonticon" data-json='@json($folder)'>
                            <i class="material-icons">more_vert</i>
                        </div>
                        <div class="app-file-folder-logo mr-3">
                            <i class="material-icons">folder_open</i>
                        </div>
                        <div class="app-file-folder-details" data-name="{{$folder->name}}" data-location="{{$folder->location}}">
                            <div class="app-file-folder-name font-weight-700" style="height: 20px;overflow: hidden">{{$folder->name}}</div>
                            <div class="app-file-folder-size">{{$folder->files_count}} files, size: {{$folder->size}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col xl3 l6 m4 s6 identifier">
            {{trans('message.the_folder_does_not_contain_other_subfolders')}}
        </div>
    @endforelse
</div>
<!-- App File - Folder Section Ends -->


<!-- App File - Files Section Starts -->
<div class="row">
    <div class="col xl3 l6 m3 s6">
        <label class="app-file-label">{{trans('message.search')}}</label>
    </div>
    <div class="col xl3 l6 m3 s6">
        <div class="input-field add-new-file mt-0">
            <!-- Add File Button -->
            <button class=" btn k-button-fill k-btn-icon mb-10 addFile">
                <i class="material-icons">add</i>
                <span>{{trans('message.upload_file')}}</span>
            </button>
            <!-- file input  -->
            <div class="getfileInput" hidden>
                <input type="file" id="getFile" name="file">
            </div>
        </div>
    </div>
    <div class="col xl l6 m6 s6">
        <div class="header-group add-file-btn" style="display: none;" id="addFileForm">
            <form action="{{route('file.add_file')}}" id="addFileForms" name="addFileForm" enctype="multipart/form-data" method="post" >
                @csrf
                <!-- <input type="file" id="input-file-now" class="dropify" name="file[]" data-default-file="" multiple="multiple" />
                <input type="hidden" name="location" value="{{$currentLocation}}">
                <button class=" btn k-button-fill btnFileManagerSave" type="submit" name="action" >
                    {{trans('message.save')}}
                </button> -->
                <div class="file-field input-field">
                  <div class="btn k-button-fill">
                    <span>{{trans('message.new')}}</span>
                    <input type="file" id="file" class="dropify" name="file[]" data-default-file="" multiple="multiple">
                      <input type="hidden" name="location" value="{{$currentLocation}}">
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                  </div>
                        <span class="error k-error" id="file_error"> </span>
                </div>
                 <button class=" btn k-button-fill btnFileManagerSave right" type="submit" name="action" >
                    {{trans('message.save')}}
                </button>
            </form>
        </div>
    </div>
</div>

<div class="row app-file-files" style="word-break: break-all">
    @include("files.list",['items' => $items['files']])
</div>
