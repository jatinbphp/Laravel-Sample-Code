@foreach($chapters as $key => $chapter)
    <div class="chapter"> {{$key+1}}. {{$chapter->title}} </div>
    <div class="subchapters">
        @if (count($chapter->subchapters))
            @foreach($chapter->subchapters as $k => $subchapters)
                <a href="{{route('manual.read',['id'=>$subchapters->id])}}" class="btn-get-subchapter">
                    {{$subchapters->title}}
                </a>
            @endforeach
        @endif
    </div>
@endforeach
