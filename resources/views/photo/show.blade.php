@extends('layouts.app')
@section('content')

<div id="add_photo">

</div>



<script>
    $(document).ready(function(){
        $.ajax({
            url:"/photos/add",
            method:"get"
        }).done(function(response){

            $('#add_photo').html(response);
        });
    })
</script>
@endsection
