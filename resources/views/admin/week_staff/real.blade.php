@extends('week_staff.layout')
@section('staff_content')
	@include("week_staff.third",['weekData' => $weekData])
@endsection
