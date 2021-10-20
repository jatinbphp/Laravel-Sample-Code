<div id="modal-add_interviu" class="modalx bottom-sheet hidden modal-custom modal-small">
    <div class="modal-header">
        <h4>{{trans('message.new_interview')}}</h4>
        <div class="buttons-group">
            <!-- <a href="#" class="close-modal_add_interviu"><img src="{{asset('img/icon/eye-icon.png')}}" alt=""></a> -->
            <a href="#" class="close-modal_add_interviu">
                <img src="{{asset('img/icon-close.png')}}" alt="">
            </a>
        </div>
    </div>
    <div class="modalx-content">
        <form name="form-add-interview" id="form-add-interview">
            <div class="row">
                <div class="input-field col s6 k-input-text">
                    <label for="model_name">{{trans('message.model_name')}} <span>*</span></label>
                    <input type="text" name="model_name" id="model_name" class="validate k-txt-box" />
                    <span class="error k-error" id="model_name_error"></span>
                </div>
                <div class="input-field col s6 k-input-text">
                    <label for="model_phone">{{trans('message.phone')}} <span>*</span></label>
                    <input type="text" name="model_phone" id="model_phone" class="numeric validate k-txt-box" />
                    <span class="error k-error" id="model_phone_error"></span>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6 k-input-text">
                    <label for="model_date">{{trans('message.interview_date')}} <span>*</span></label>
                    <input type="text" name="model_date"  id="model_date" class="futureDatePicker validate k-txt-box">
                    <span class="error k-error" id="model_date_error"></span>
                </div>
                <div class="input-field col s6 k-input-text">
                    <label for="model_hour">{{trans('message.time')}} <span>*</span></label>
                    <input type="text" name="model_hour" id="model_hour" class="validate k-txt-box timePicker" />
                    <span class="error k-error" id="model_hour_error"></span>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6 k-input-text">
                    <label for="location">{{trans('message.where_come')}} <span>*</span></label>
                    <input type="text" name="location" id="location" class="validate k-txt-box" />
                    <span class="error k-error" id="location_error"></span>
                </div>
            </div>

            <div class="modal_button_center">
                <button class="saveInterview action-btn   btn k-button-fill k-icon" type="submit">
                    <img src="{{asset('img/plus-bl.png')}}">{{trans('message.add')}} {{trans('message.interview')}}
                </button>
            </div>
        </form>
    </div>
</div>

<div id="modal-edit_interviu" class="modalx bottom-sheet hidden modal-custom modal-small">
    <div class="modal-header">
        <h4>{{trans('message.new_interview')}}</h4>
        <div class="buttons-group">
            <a href="#" class="close-modal_edit_interviu"><img src="{{asset('img/icon-close.png')}}" alt=""></a>
        </div>
    </div>
    <div class="modalx-content">
        <form name="form-edit-interview" id="form-edit-interview">
            <div class="row">
                <div class="input-field col s6 k-input-text">
                    <label for="model_name">{{trans('message.model_name')}} <span>*</span></label>
                    <input type="text" name="model_name" id="edit_model_name" class="validate k-txt-box"  />
                    <span class="error k-error" id="edit_model_name_error"></span>
                </div>
                <div class="input-field col s6 k-input-text">
                    <label for="model_phone">{{trans('message.phone')}} <span>*</span></label>
                    <input type="text" name="model_phone" id="edit_model_phone" class="numeric validate k-txt-box" />
                    <span class="error k-error" id="edit_model_phone_error"></span>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 k-input-text">
                    <label for="model_date">{{trans('message.interview_date')}} <span>*</span></label>
                    <input type="text" name="model_date"  id="edit_model_date" class="futureDatePicker validate k-txt-box">
                    <span class="error k-error" id="edit_model_date_error"></span>
                </div>
                <div class="input-field col s6 k-input-text">
                    <label for="model_hour">{{trans('message.now_interview')}} <span>*</span></label>
                    <input type="text" name="model_hour" id="edit_model_hour"  class="validate k-txt-box timePicker" />
                    <span class="error k-error" id="edit_model_hour_error"></span>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 k-input-text">
                    <label for="location">{{trans('message.where_come')}} <span>*</span></label>
                    <input type="text" name="location" id="edit_location" class="validate k-txt-box" />
                    <span class="error k-error" id="edit_location_error"></span>
                </div>
            </div>
            <div class="modal_button_center">
                <button class="ml-4  btn k-button-fill k-btn  updateInterview action-btn" type="submit">
                    <img src="{{asset('img/edit.png')}}" alt="">{{trans('message.update')}} {{trans('message.interview')}}
                </button>
            </div>
        </form>
    </div>
</div>

<div id="modal-start-interview" class="modalx bottom-sheet hidden modal-custom">
    <div class="modal-header">
        <h4 class="k-h4 modalTitle">{{trans('message.model')}} {{trans('message.interview')}}</h4>
        <div class="buttons-group">
            <a href="#" class="close-start-interview-modal"><img src="{{asset('img/icon-close.png')}}" alt=""></a>
        </div>
    </div>
    <div class="modalx-content">

    </div>
</div>
