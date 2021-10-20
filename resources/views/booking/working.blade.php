@extends('layouts.app')
@section('content')

<div class="section groups-container" id="user-profile">
    <div class="row">
        <div class="col s12">
            <div class="header-group">
                @php
                    $bgimage = $user->cover_photo;
                @endphp
                <div class="cover-group userCoverPhoto" style="background-image:url('{{$bgimage}}')">
                    <div class="logo-group">
                        <img src='{{$user->avatar}}' alt="avatar" class="userProfilePhoto" />
                    </div>
                    <div class="titlu-group">
                        <p class="user_name_N">{{$user->name}}</p>

                    </div>
                    <div class="statistica-group">
                        <ul>
                            <li><h6 class="white-text">{{trans('message.working_tour')}}</h6></li>
                            <li class="white-text">{{trans('message.date')}} : {{ date('d-m-Y') }}</li>
                        </ul>
                    </div>

                </div>
                <div class="nav-group row">

                    <div class="col s12 push-l7 l5">
                        <div class="buttons-group">

                        </div>
                    </div>
                    <div class="col s12 pull-l5 l7">
                        <ul class="tabs tabs-user-info nav-user-info">
                            <li class="tab">
                                <a href="#day-start-tab" class="active">
                                  {{trans('message.day_in_time')}}
                                </a>
                            </li>
                            <li class="tab">
                                <a href="#break-tab" class="date-generale">
                                    {{trans('message.break_time')}}
                                </a>
                            </li>
                            <li class="tab">
                                <a href="#day-end-tab">
                                  {{trans('message.day_out_time')}}
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col s12" id="day-start-tab">
                    <div class="col s12 m6">
                        <div class="row">
                            <div class="card card card-default scrollspy" id="prefixes">
                                <div class="card-content">
                                    <h4 class="k-h4">
                                        <i class="material-icons prefix">
                                        alarm_add
                                        </i>{{trans('message.day_in_time')}}
                                    </h4>
                                    <hr>
                                    <button class="bookign  btn k-button-fill k-btn-normal" id="day_in" name="submit" type="Button">{{trans('message.submit')}}</button> <span id="day_in_time">{{ isset($daytime['working_start_time']) ?  $daytime['working_start_time'] : '' }}</span><br>
                                    <span id="day_in_message"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                 <div class="col s12" id="break-tab">
                    <div class="col s12 m6">
                        <div class="row">
                            <div class="card card card-default scrollspy" id="prefixes">
                                <div class="card-content">
                                    <h4 class="k-h4">
                                        <i class="material-icons prefix">
                                         access_time
                                        </i>{{trans('message.break_time')}}
                                    </h4>
                                    <hr>
                                    <div id="break_time_div" @if(!isset($daytime['working_start_time'])) style='display:none' @endif>
                                        <div class="section groups-container" >
                                        <form id="form-addmorebreak" name="form-addmorebreak">
                                            <div class="input-field col s2 p-cus w-auto-width right">
                                                <div class="add-row-button">
                                                    <a href="#" class="breakAddRow">+</a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12">
                                                    <div class="rulesData addmore-break">
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                 <div class="col s12" id="day-end-tab">
                    <div class="col s12 m6">
                        <div class="row">
                            <div class="card card card-default scrollspy" id="prefixes">
                                <div class="card-content">
                                    <h4 class="k-h4">
                                        <i class="material-icons prefix">
                                        alarm_off
                                        </i>{{trans('message.day_out_time')}}
                                    </h4>
                                    <hr>
                                    <div id="day_out_div" @if(!isset($daytime['working_start_time'])) style='display:none' @endif>
                                        {{trans('message.day_out_time')}} <br>
                                        <button class="bookign  btn k-button-fill k-btn-normal" id="day_out" name="submit" type="Button">{{trans('message.submit')}}</button>  <span id="day_out_time">{{ isset($daytime['working_end_time']) ?  $daytime['working_end_time'] : '' }}</span><br>
                                        <span id="day_out_message"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
</div>

<script id="addmore-break" type="text/template">
    @include('booking.addmore_list')
</script>
@endsection
@push('js')
<script type="text/javascript">

</script>
@endpush
