@extends('layouts.app')
@section('content')
<div  id="body_start" class="section interview-section">
    <div class="header-page">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h2 class="">{{trans('message.welcome_to_the_interview')}}, {{$user->name}}!</h2>
                    <p>{{trans('message.lets_get_started')}}.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Tasks -->
    <div id="modal-show_task" style="width:100%" class="modalx bottom-sheet modal-custom hidden  modal-small">
        <div class="container">
                    <div class="modal-header">
                        <h4>{{trans('message.add_tasks')}}</h4>
                        <div class="buttons-group">
                            <a href="#" class="close-modal_task">
                                <img src="{{asset('img/icon-close.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="modalx-content">
            <div class="row">
                <div class="col s12">
                        <div class="row">
                              <input type="hidden" id="modelname" value=""/>
                            <div class="col s4">
                                <h6>{{trans('message.photo_shoot')}}</h6>
                                <div class="input-field k-input-text">
                                <label>{{trans('message.date')}}</label>
                                <input type="hidden" class="value" data-type="photo_sedinta" value="6"/>
                                <input type="text"   class="value_date validate k-txt-box futureDatePicker" name="val1" id="val1" value="" />
                            <a onclick="check_task(this)" class="task_check  btn k-button-fill k-btn-normal" style="margin-top:20px;">{{trans('message.add_task')}}</a>
                                </div>
                            </div>

                        <div class="col s4">
                                <h6>{{trans('message.first_round')}}</h6>
                            <div class="input-field k-input-text">
                                <label>{{trans('message.date')}}</label>
                                <input type="hidden"  class="value" data-type="first_tour" value="8"/>
                                <input type="text" class="value_date validate k-txt-box futureDatePicker" id="val2" name="val2" value="" />
                                <a  onclick="check_task(this)" class="task_check  btn k-button-fill k-btn-normal" style="margin-top:20px;">{{trans('message.add_task')}}</a>
                            </div>
                        </div>
                        <div class="col s4">
                                <h6>{{trans('message.initial_training')}}</h6>
                            <div class="input-field k-input-text">
                                <label>{{trans('message.date')}}</label>
                                <input type="hidden"  class="value" data-type="training_initiere" value="8"/>
                                <input type="text"  value="" class="value_date validate k-txt-box futureDatePicker" id="val3"  name="val3" />
                                <a onclick="check_task(this)" class="task_check  btn k-button-fill k-btn-normal" style="margin-top:20px;">{{trans('message.add_task')}}</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--modal end -->
    <div class="section users-edit">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <form action="{{route('interview.accept',$id)}}" enctype="multipart/form-data" method="POST">
                        <!--modal start -->
                        <div id="modal-show_video" style="width:100%" class="modalx bottom-sheet modal-custom hidden ">
                            <div class="modal-header">
                                <h4>{{trans('message.video_sites')}}</h4>
                                <div class="buttons-group">
                                    <a href="#" class="close-modal_video"><img src="{{asset('img/icon-close.png')}}" alt=""></a>
                                </div>
                            </div>
                            <div class="modalx-content">
                                <div class="col s6">
                                        <h4>{{trans('message.sites_available')}}</h4>
                                        @foreach($video_sites as $site)
                                    <div class="input-field k-input-text">
                                        <input type="text" name="site_name[{{$site->id}}]" value="{{$site->name}}" class="validate k-txt-box" readonly />
                                    </div>
                                    <div class="k-checkbox-warp">
                                        <label class="k-checkbox-fill">
                                            <input type="checkbox" name="site_block[{{$site->id}}]" class="filled-in" value="1" />
                                            <span  style="padding-right:10px;">{{trans('message.blocked_account')}}</span>
                                        </label>
                                        <label class="k-checkbox-fill">
                                            <input type="checkbox" name="site_add[{{$site->id}}]" class="filled-in" value="1" />
                                            <span>Vrea Cont</span>
                                        </label>
                                    </div>
                                     <div class="input-field k-input-text">
                                        <input type="text" name="site_notice[{{$site->id}}]" placeholder="{{trans('message.site_notice')}}" class="validate k-txt-box" value="" class="validate k-txt-box" />
                                    </div>
                                    <hr style="height: 5px;background: #565656;margin-top: -8px; margin-bottom:10px;">
                                    @endforeach
                                </div>
                                <div class="col s6">
                                    <h4>{{trans('message.other_sites')}}</h4>
                                    <div id="new_elements" data-value="0"></div>
                                    <a id="add_element" class=" btn k-button-fill k-btn-normal" style="margin-top:20px;">{{trans('message.add_new_site')}}</a>
                                </div>
                            </div>
                        </div>
                        <!--modal end -->
                        @csrf
                        <h3 class="section-title">{{trans('message.model_data')}}</h3>
                        <div class="row">
                            <div class="col s4">
                                <div class="input-field k-input-text">
                                    <label for="model_name">{{trans('message.model_name')}}</label>
                                    <input type="text" name="model_name" class="validate k-txt-box" id="task_model_name" value="{{$model->model_name}}" />
                                </div>
                            </div>
                            <div class="col s4">
                                <div class="input-field k-input-text">
                                    <label for="model_phone">{{trans('message.phone')}}</label>
                                    <input type="text" class="validate k-txt-box" name="model_phone" id="model_phone" value="{{$model->model_phone}}" />
                                </div>
                            </div>
                            <div class="col s4">
                                <div class="input-field k-input-text">
                                    <label for="model_email">{{trans('message.email')}}</label>
                                    <input type="text" name="model_email" id="model_email" value="" class="validate k-txt-box" />
                                </div>
                            </div>
                        </div>
                        <h3 class="section-title">{{trans('message.general_questions')}}</h3>
                        <div class="row">
                            <div class="col s6">
                                <div class="input-field k-input-text">
                                    <label for="last_work">{{trans('message.where_else_did_he_work')}}</label>
                                    <input type="text" name="last_work" id="last_work" class="validate k-txt-box" />
                                </div>
                            </div>
                            <div class="col s6">
                                <div class="input-field k-input-text">
                                    <label for="details_last_studio">{{trans('message.details_old_studio')}}</label>
                                    <input type="text" name="details_last_studio" id="details_last_studio" class="validate k-txt-box" />
                                </div>
                            </div>
                        </div>
                        <div class="input-field k-input-text">
                            <button type="button" id="video_show" class=" btn k-button-fill k-btn-normal">{{trans('message.video_sites')}}</button>
                        </div>
                        <h3 class="section-title">{{trans('message.personalized_questions')}}</h3>
                        @php $nr=0 @endphp
                        @foreach($interview_questions as $question)
                        <div class="input-field k-input-text">
                            <label for="answer_{{$question->id}}">{{$question->title}}:</label>
                            <input type="hidden" name="questions[]" value="{{$question->id}}">
                            <input id="answer_{{$question->id}}" name="answers[]" type="text"  class="validate k-txt-box">
                        </div>
                        @endforeach
                        <h3 class="section-title">{{trans('message.interview_notes')}}</h3>
                        <div class="input-field   k-input-text">
                            <textarea class="interview-description materialize-textarea k-textarea" id="add_general_description" name="notice"></textarea>
                        </div>

                        <div class="row">
                            <div class="col s6">
                                <h3 class="section-title">{{trans('message.upload_newsletter_photo')}}</h3>
                                <input type="file" id="photo_card" name="photo_card" class="dropify"
                                data-allowed-file-extensions="png jpeg jpg" />
                            </div>
                            <div class="col s6">
                                <h3 class="section-title">{{trans('message.upload_avatar_picture')}}</h3>
                                <input type="file" id="photo_face" name="photo_face" class="dropify"
                                data-allowed-file-extensions="png jpeg jpg" />
                            </div>
                        </div>
                        <h3 class="section-title">{{trans('message.create_a_new_account')}}</h3>
                        <div class="row username-generate">
                            <div class="col s12">
                            <a id="generate_name" class=" btn k-button-fill k-btn-normal generate_name">{{trans('message.generate_name')}}</a>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col s4">
                                <div class="input-field k-input-text ">
                                    <label for="user_name">{{trans('message.username')}}</label>
                                    <input type="text" id="gen_user_name" name="username" class="validate k-txt-box"  />
                                </div>
                            </div>
                            <div class="col s4">
                                <div class="input-field k-input-text">
                                    <label for="get_password">{{trans('message.password')}}</label>
                                    <img id="show_password" class="show_password" src="/img/icon-eye-purple.png" alt="">
                                    <input type="password" name="password" id="get_password" class="validate k-txt-box" />
                                </div>
                            </div>
                            <div class="col s4">
                                <div class="input-field k-input-text">
                                    <label for="user_email">{{trans('message.email')}}</label>
                                    <input type="text" id="gen_user_email" name="email"  class="validate k-txt-box" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                        <div class="input-field k-input-text">
                            <a id="task_show" class=" btn k-button-fill k-btn-normal">{{trans('message.schedule_tasks')}}</a>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                           <h3 class="section-title">{{trans('message.sms_sone')}}</h3>
                            <div class="input-field col s4 k-dropdown">
                                <label>{{trans('message.message')}}</label>
                                <select name="sms_title">
                                    @foreach($sms as $elem)
                                    <option value="{{$elem->id}}">{!!$elem->title!!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col s4 input-field k-input-text">
                                <label>{{trans('message.date')}}</label>
                                <input type="text" name="sms_date" value="" placeholder="{{trans('message.data')}} sms"  class="validate k-txt-box futureDatePicker" />
                            </div>
                            <div class="col s4 input-field k-input-text">
                                <label>{{trans('message.hour')}}</label>
                                <input type="text" name="sms_hour" value="" placeholder="{{trans('message.hour')}} sms"  class="validate timePicker k-txt-box" />
                            </div>
                        </div>
                        <div class="actions-interview">
                            <button class=" btn k-button-fill k-btn-normal" value="2" name="interwie_status"
                            type="submit">{{trans('message.model_accepted')}}</button>
                            <button class=" btn k-button-fill k-btn-normal  " value="6" name="interwie_status">{{trans('message.model_undecided')}}</button>
                            <button class=" btn k-button-fill k-btn-normal " value="4" name="interwie_status">{{trans('message.model_rejected')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
