<form id="daily-staff-report" name="daily-staff-report">
    @foreach(getStaffQuestion($user->role_id) as $questionId => $question)
        <div class="input-group k-input-text">
            <label for="model_name">{{$question}}<span>*</span></label>
            <input type="text" name="txt_question_{{$questionId}}" id="txt_question_{{$questionId}}" class="validate k-txt-box"  />
            <span class="error k-error" id="txt_question_{{$questionId}}_error"></span>
        </div>
    @endforeach
    <div class="modal_button_center">
        <button class=" btnSaveDailyStaffQuestion action-btn   btn k-button-fill k-icon" type="submit">
            <img src="{{asset('img/plus-bl.png')}}">{{trans('message.add')}} {{trans('message.answer')}}
        </button>
    </div>
</form>
