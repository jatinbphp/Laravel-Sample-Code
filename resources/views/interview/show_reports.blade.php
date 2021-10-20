@extends('layouts.app')
@section('content')
<div class="section interview-section">
    <div class="header-page">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h2 class="">{{trans('message.welcome')}} {{trans('message.back')}}, {{$user->name}}!</h2>
                    <p>{{trans('message.lets_get_started')}}.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="section users-edit">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <form action="{{route('interview.report',$report->id)}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        {!!$report->notice!!}
                        <h3 class="section-title">{{trans('message.report_completion')}}</h3>
                        <textarea class="description"  name="notice"></textarea>
                        <button class="action-model btn btn-info purple-btn"
                        type="submit">{{trans('message.completion')}}</button>
                    </form>
                    <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
                    <script>
                    $(document).ready(function(){
                    tinymce.init({
                    selector:'textarea.description',
                    width: 900,
                    height: 300
                    });
                    });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
