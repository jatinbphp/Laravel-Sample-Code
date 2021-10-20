@extends('week_staff.layout')
@section('staff_content')
	@include("week_staff.second",['weekData' => $weekData])
@endsection
