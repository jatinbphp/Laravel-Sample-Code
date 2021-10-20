@extends('layouts.app')
@section('content')
<h3>Adauga cont  unui user</h3>
<form method="POST" id="technical-first-form" name="technical-first-form">
    @csrf
    <div class="row">
        <label>{{trans('message.model_name')}}</label>
        <select name="user_id" >
            @foreach($models as $model)
            <option value="{{$model->id}}">{{$model->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="row">
        <label>{{trans('message.video_site')}}</label>
        <select name="video_site">
            @foreach($video_site as $site)
            <option value="{{$site->id}}">{{$site->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="row">
        <label>{{trans('message.username')}}</label>
        <input type="text" name="username"/>
    </div>
    <div class="row">
        <label>{{trans('message.password')}}</label><p class="btn btn-success" id="generate_password">{{trans('message.generate_password')}}</p>
        <input type="text" id="password" value="" class="generate_password" name="password"/>
    </div>
    <button type="submit" class="btnTechnicalFirst">{{trans('message.add')}}</button>
</form>
<h3>{{trans('message.add_a_video_site')}}</h3>
<form method="POST" id="technical-second-form" name="technical-second-form">
    @csrf
    <div class="row">
        <label>{{trans('message.site_name')}}</label>
        <input type="text" name="site_name">
    </div>
    <div class="row">
        <label>{{trans('message.site')}} {{trans('message.link')}}</label>
        <input type="text" name="site_link">
    </div>
    <button type="submit" class="btnTechnicalSecond">{{trans('message.add')}}</button>
</form>
<h3>{{trans('message.view_model_accounts')}}</h3>
<div class="row">
    <label>{{trans('message.model_name')}}</label>
    <select id="model_id" >
        @foreach($models as $model)
            <option value="{{$model->id}}">{{$model->name}}</option>
        @endforeach
    </select>
</div>
<h3>{{trans('message.list_of_video_sites_for_the_selected_model')}}</h3>
<div id="show_video_site">
</div>
@endsection
