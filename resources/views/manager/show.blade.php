@extends('layouts.app')
@section('content')

<h4>{{trans('message.scheduled_models')}} <input type="date" id="date" value="" /></h4>
<div id="show_models">

</div>

<h4>{{trans('message.daily_report')}}</h4>
<div id="toolbar"></div>
<div id="editor"></div>


<h4>{{trans('message.targeted_applies_daily')}}</h4>
<div id="target">

</div>

<script>

    function test(program_id)
        {
            $.ajax({
                url:"manager/trainer_name/"+ program_id,
                method:"get"

            }).done(function(response){

                $("#trainer_name"+program_id).html(response);
            });
        }

    $(document).ready(function(){

  var date="@php echo date('Y-m-d') @endphp";





    function target()
    {
        $.ajax({
            url:"/target/show",
            method:"get"

        }).done(function(response){
           $("#target").html(response);

        });
    }
    //target();





});
</script>
@endsection
