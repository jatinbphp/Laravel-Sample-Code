@extends('week_model.layout')
@section('model_content')
	@include("week_model.first",['rooms'=>$rooms,'shifts' => $shifts,'weekData' => $weekData])
@endsection
