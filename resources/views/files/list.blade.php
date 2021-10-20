@forelse($items as $file)
    <div class="col xl3 l6 m3 s6 identifier" id="{{$file->id}}">
        <div class="card box-shadow-none mb-1 app-file-info">
            <div class="card-content">
                <div class="app-file-content-logo grey lighten-4">
                    <div class="fonticon" data-json='@json($file)'>
                        <i class="material-icons">more_vert</i>
                    </div>
                    <img class="recent-file" src="{{$file->type['icon']}}" height="38" width="30"
                    alt="Card image cap">
                </div>
                <div class="app-file-details">
                    <div class="app-file-name font-weight-700" style="height: 20px;overflow: hidden">{{$file->name}}</div>
                    <div class="app-file-size">{{formatSize($file->size)}}</div>
                    <div class="app-file-type">{{$file->type['type']}}</div>
                </div>
            </div>
        </div>
    </div>
@empty
    <div class="col xl3 l6 m3 s6 identifier">
       {{trans('message.there_are_no_files_in_this_folder')}}
    </div>
@endforelse
