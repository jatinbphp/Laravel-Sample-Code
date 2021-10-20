@extends('layouts.app')
@section('content')
@foreach($gallery as $photos)
    @php $photo=json_decode($photos->photos) @endphp

    @for($i=0;$i<count($photo);$i++)
    <img class="responsive-img" src="/storage/uploads/{{$photo[$i]}}" ></img>
    <button  value="{{$photo[$i]}}" class="btn btn-info download_photo">Download</button>
    @endfor

@endforeach

<script>
$(document).ready(function(){
    $(".download_photo").click(function(){

        var url=$(this).attr("value");
        window.location="/download/"+url;



    });

});

</script>
@endsection
