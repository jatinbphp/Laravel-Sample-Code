<form id="form-start-interview" name="form-start-interview" class="display-flex flex-column h-100 justify-content-between" enctype="multipart/form-data">

    <div class="card-panel border-radius-6 card-with-header p-0 mt-0">
        <div class="card-header staff_question">
            <h4 class="k-h4">{{trans('message.model_data')}}</h4>
        </div>
        <div class="row">
            <div class="input-field col s4 k-input-text">
                <label for="name3">
                    {{trans('message.model_name')}} <span>*</span>
                </label>
                <input id="model_name" name="model_name" type="text" class="validate k-txt-box" value="{{$interview->model_name}}">
                <span class="error k-error" id="model_name_error">
                </span>
            </div>

            <div class="input-field  col s4 k-input-text">
                <label for="name3">
                    {{trans('message.phone')}} <span>*</span>
                </label>
                <input id="phone" name="model_phone" type="text" class="validate k-txt-box" value="{{$interview->model_phone}}">
                <span class="error k-error" id="model_phone_error">
                </span>
            </div>

            <div class="input-field  col s4 k-input-text">
                <label for="name3">
                    {{trans('message.email')}} <span>*</span>
                </label>
                <input id="model_email" name="model_email" type="email" class="validate k-txt-box" value="{{$interview->model_email}}">
                <span class="error k-error" id="model_email_error">
                </span>
            </div>
        </div>
    </div>

    <div class="card-panel border-radius-6 card-with-header p-0 mt-0">
        <div class="card-header staff_question">
            <h4 class="k-h4">{{trans('message.personalized_questions')}}</h4>
        </div>

        <div class="row">
            @foreach(getInterviewQuestion() as $questionId => $question)
                <div class="input-field col s4 k-input-text">
                    <label for="answer_{{$questionId}}">{{$question}} <span>*</span></label>
                    <input type="hidden" name="questions[]" value="{{$questionId}}">
                    <input id="answer_{{$questionId}}" name="answers[]" type="text"  class="validate k-txt-box">
                    <span class="error k-error" id="model_email_error">
                    </span>
                </div>
            @endforeach
        </div>
    </div>

    <div class="card-panel border-radius-6 card-with-header p-0 mt-0">
        <div class="card-header staff_question">
            <h4 class="k-h4">{{trans('message.general_questions')}}</h4>
        </div>
        <div class="row">
            <div class="input-field  col s4 k-input-text">
                <label for="name3">{{trans('message.where_else_did_he_work')}} <span>*</span></label>
                <input type="text" name="last_work" id="last_work" class="validate k-txt-box" />
                <span class="error k-error" id="last_work_error"></span>
            </div>
            <div class="input-field  col s4 k-input-text">
                <label for="name3">{{trans('message.details_old_studio')}} <span>*</span></label>
                <input type="text" name="details_last_studio" id="details_last_studio" class="validate k-txt-box" />
                <span class="error k-error" id="details_last_studio_error"></span>
            </div>

            <div class="input-field col s4 k-input-text">
                <label for="name3">{{trans('message.interview_notes')}} <span>*</span></label>
                <textarea class="interview-description materialize-textarea k-textarea" id="add_general_description" name="notice"></textarea>
                <span class="error k-error" id="notice_error"></span>
            </div>
        </div>
    </div>

    <div class="card-panel border-radius-6 card-with-header p-0 mt-0">
        <div class="card-header staff_question">
            <h4 class="k-h4">{{trans('message.create_a_new_account')}}</h4>
            <a class="action-btn  btn-small k-button-fill k-icon generate_name" id="generate_name">
                <img src="{{asset('img/plus-bl.png')}}">{{trans('message.generate_name')}}
            </a>
        </div>
        <div class="row">
            <div class="col s4">
                <div class="input-field k-input-text ">
                    <label for="user_name">{{trans('message.username')}}</label>
                    <input type="text" id="gen_user_name" name="username" class="validate k-txt-box"  />
                    <span class="error k-error" id="username_error"></span>
                </div>
            </div>
            <div class="col s4">
                <div class="input-field k-input-text">
                    <label for="get_password">
                        {{trans('message.password')}}
                        <img id="show_password" class="show_password" src="/img/icon-eye-purple.png" alt="">
                    </label>
                    <input type="password" name="password" id="get_password" class="validate k-txt-box" />
                    <span class="error k-error" id="password_error"></span>
                </div>
            </div>
            <div class="col s4">
                <div class="input-field k-input-text">
                    <label for="user_email">{{trans('message.email')}}</label>
                    <input type="text" id="gen_user_email" name="email"  class="validate k-txt-box" />
                    <span class="error k-error" id="email_error"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6 k-input-text">
                <label for="name3">
                    {{trans('message.upload_newsletter_photo')}}<span>*</span>
                </label>
                <input id="input-file-photo" name="photo_card" type="file" class="dropify-event center">
                <span class="error k-error" id="photo_card_error">
                </span>
            </div>

            <div class="input-field col s6 k-input-text">
                <label for="name3">
                    {{trans('message.upload_avatar_picture')}}<span>*</span>
                </label>
                <input id="input-file-photo" name="photo_face" type="file" class="dropify-event center">
                <span class="error k-error" id="photo_face_error">
                </span>
            </div>
        </div>
    </div>

    <div class="card-panel border-radius-6 card-with-header p-0 mt-0 interviewVideoSite">
        <div class="card-header staff_question mb-2">
            <h4 class="k-h4">{{trans('message.video_sites')}}</h4>
        </div>
        <div class="row">
            @foreach(getVideoSite() as $siteId => $site)
                <div class="input-field col s4 k-input-text">
                    <div class="video-site-box">
                        <div class="k-checkbox-warp highlited-block">
                            <label class="k-checkbox-fill ">
                                <input type="checkbox" name="site_name[]" class="filled-in" value="{{$siteId}}" />
                                <span  style="padding-right:10px;">{{$site}}</span>
                            </label>
                        </div>
                        <div class="video-site-inner-box">
                            <div class="k-checkbox-warp">
                                <label class="k-checkbox-fill">
                                    <input type="checkbox" name="site_block[]" class="filled-in" value="{{$siteId}}" />
                                    <span  style="padding-right:10px;">{{trans('message.blocked_account')}}</span>
                                </label>
                                <label class="k-checkbox-fill">
                                    <input type="checkbox" name="site_add[]" class="filled-in" value="{{$siteId}}" />
                                    <span>{{trans('message.add_account')}}</span>
                                </label>
                            </div>
                            <div class="input-field k-input-text">
                                <input type="text" name="site_notice[{{$siteId}}]" placeholder="{{trans('message.site_notice')}}" class="validate k-txt-box" value="" class="validate k-txt-box" />
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="card-panel border-radius-6 card-with-header p-0 mt-0">
        <div class="card-header staff_question">
            <h4 class="k-h4">{{trans('message.interview')}} {{trans('message.status')}}</h4>
        </div>
        <div class="row">
            <div class="input-field col s3 k-dropdown">
                <label>{{trans('message.status')}} <span>*</span> </label>
                <select name="interview_status" id="interview_status" class="browser-default interviewStatus">
                    <option value="" disabled selected>{{trans('message.select')}}</option>
                    @foreach(getInterviewSmsStatus() as $statusId => $status)
                        <option value="{{$statusId}}">{{ $status }}</option>
                    @endforeach
                </select>
                <span class="error k-error" id="interview_status_error"></span>
            </div>
            <div class="input-field col s3 k-dropdown hidden flowType">
                <label for="problem_flow_type_id">
                    {{trans('message.flow')}} {{trans('message.type')}} <span>*</span>
                </label>
                <select id="problem_flow_type_id" name="problem_flow_type_id" class="browser-default">
                    <option value="" disabled selected="">{{trans('message.select')}}</option>
                    @foreach(getProblemFlowType() as $problemId => $problem)
                        <option value="{{$problemId}}">{{$problem}}</option>
                    @endforeach
                </select>
                <span class="error k-error" id="problem_flow_type_id_error"></span>
            </div>
            <div class="col s3 input-field k-input-text">
                <label>{{trans('message.date')}} <span>*</span></label>
                <input type="text" name="sms_date" value="" class="validate k-txt-box futureDatePicker" />
                <span class="error k-error" id="sms_date_error"></span>
            </div>
            <div class="col s3 input-field k-input-text">
                <label>{{trans('message.hour')}} <span>*</span> </label>
                <input type="text" name="sms_hour" value="" class="validate timePicker k-txt-box" />
                <span class="error k-error" id="sms_hour_error"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
            <div class="modal_button_center">
                <button class="action-btn  btn k-button-fill k-icon acceptInterview" type="submit" data-id="{{$interview->id}}">
                    <img src="{{asset('img/plus-bl.png')}}">{{trans('message.finish')}} {{trans('message.interview')}}
                </button>
            </div>
        </div>
    </div>

</form>
