@extends('week_model.layout')
@section('model_content')
	@include("week_model.third",['rooms'=>$rooms,'shifts' => $shifts,'weekData' => $weekData])
@endsection
