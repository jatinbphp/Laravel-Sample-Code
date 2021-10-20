<form name="form-send-mail" id="form-send-mail">
    <div class="input-group input-field k-input-text">
        <label for="to_email">{{trans('message.to_email')}} <span>*</span></label>
        <input type="text" name="to_email" id="to_email" class="validate k-txt-box" />
        <span class="error k-error" id="to_email_error"></span>
    </div>
    <div class="input-group input-field k-input-text">
        <label for="cc_email">{{trans('message.cc_email')}}</label>
        <input type="text" name="cc_email" id="cc_email" class="validate k-txt-box" />
        <span class="error k-error" id="cc_email_error"></span>
    </div>
    <div class="input-group input-field k-input-text">
        <label for="bcc_email">{{trans('message.bcc_email')}}</label>
        <input type="text" name="bcc_email" id="bcc_email" class="validate k-txt-box" />
        <span class="error k-error" id="bcc_email_error"></span>
    </div>
    <div class="input-group input-field k-input-text">
        <label for="subject">{{trans('message.subject')}} <span>*</span></label>
        <input type="text" name="subject" id="subject" class="validate k-txt-box" />
        <span class="error k-error" id="subject_error"></span>
    </div>
    <div class="input-group input-field k-input-text">
        <label for="subject">{{trans('message.message')}} <span>*</span></label>
        <div class="w-100">
            <div class="row">
                <div class="col s12">
                    <div id="full-wrapper">
                        <div id="full-container">
                            <div class="editor">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <textarea class="comment-container hidden mailContainer" name="mail_message">
        </textarea>
        <span class="error" id="mail_message_error"></span>
    </div>
    <div class="input-group input-field k-input-text">
        <label>{{trans('message.choose_pictures')}}</label>
        <input type="file" name="files[]" id="attach_files" multiple class="validate file-upload-block" />
        <div class="uploadFileList"> </div>
    </div>
    <div class="buttons-group">
        <button class=" btn k-button-fill k-btn-icon sendMail action-btn ml-4" type="submit">
        <i class="material-icons left">send</i>
        <span>{{trans('message.send')}}</span>
        </button>
    </div>
</form>
