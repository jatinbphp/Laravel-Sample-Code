
@extends('layouts.app')
@section('content')

<div class="row">
    {{$user_sheet->username}}

</div>
<div class="row">

    {{$user_sheet->email}}
</div>
<div class="row">

    {!!$user_sheet->generaldescription!!}
</div>

@php
  $answers=json_decode($user_sheet->answers)
@endphp
<div class="row">
    @foreach($questions as $key=>$elem)
    <div class="row">

        {{$elem}} -> {{$answers[$key]}}
    </div>
    @endforeach
</div>
@endsection
