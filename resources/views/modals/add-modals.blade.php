@include("interview.modal")

@include("task.modal")

<div id="show-general-lead-modal" class="modalx bottom-sheet modal-custom hidden modal-small">
    <div class="modal-header">
        <h4>{{trans('message.add')}} {{trans('message.leads')}}</h4>
        <div class="buttons-group">
            <a href="#" class="close-lead_modal"><img src="{{asset('img/icon-close.png')}}" alt=""></a>
        </div>
    </div>
    <div class="modalx-content">
        <div class="lead-info"></div>
    </div>
</div>
<div id="modal-edit_lead_request" class="modalx bottom-sheet hidden modal-custom modal-small">
    <div class="modal-header">
        <h4>{{trans('message.edit_lead')}}</h4>
        <div class="buttons-group">
            <a href="#" class="close-modal_edit_lead_request">
                <img src="{{asset('img/icon-close.png')}}" alt="">
            </a>
        </div>
    </div>
    <div class="modalx-content " id="edit_lead_request">
    </div>
</div>
<div class="overlay-layer hidden"></div>
<div id="modal-show_models" class="modalx bottom-sheet  modal-custom  hidden ">
    <div class="modal-header">
        <h4>{{trans('message.program_models')}}  </h4>
        <div class="buttons-group">
            <a href="#" class="close-modal_show_models">
                <img src="{{asset('img/icon-close.png')}}" alt="">
            </a>
        </div>
    </div>
    <div class="modalx-content">
        <div id="show_models_in_modal">
        </div>
    </div>
</div>
<div id="modal-add_lead" class="modalx bottom-sheet modal-custom  hidden modal-small">
    <div class="modal-header">
        <h4>{{trans('message.add_lead')}}</h4>
        <div class="buttons-group">
            <a href="#" class="close-modal_add_lead"><img src="{{asset('img/icon-close.png')}}" alt=""></a>
        </div>
    </div>
    <div class="modalx-content">
        <form method="post" id="lead-add-form" name="lead-add-form">
            <div class="col s12 input-field k-input-text">
                <label for="nume">{{trans('message.title')}} <span>*</span></label>
                <input type="text" name="nume" id="nume" class="k-txt-box" />
                <span class="error k-error" id="nume_error"></span>
            </div>
            <div class="col s12 input-field k-input-text">
                <label for="descriere">{{trans('message.description')}} <span>*</span></label>
                <input type="text" name="descriere" id="descriere" class="k-txt-box" />
                <span class="error k-error" id="descriere_error"></span>
            </div>
            <div class="col s12 input-field k-input-text">
                <label for="puncte">{{trans('message.number_of_points')}} <span>*</span></label>
                <input type="text" name="puncte" id="puncte" class="numeric k-txt-box" />
                <span class="error k-error" id="puncte_error"></span>
            </div>
            <div class="col s12 ">
                <div class="modal_button_center" >
                    <button class="action-btn  btn k-button-fill k-btn-normal k-icon submit-lead " type="submit">
                        <img src="{{asset('img/plus-bl.png')}}"> {{trans('message.add_lead')}}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="modal-all_breaks_views" class="modalx bottom-sheet hidden modal-custom modal-small">
    <div class="modal-header">
        <h4>{{trans('message.today_breaks')}}</h4>
        <div class="buttons-group">
            <a href="#" class="close-all_breaks_views ">
                <img src="{{asset('img/icon-close.png')}}" alt="">
            </a>
        </div>
    </div>
    <div class="modalx-content " id="show_all_breaks">
    </div>
</div>

<div id="modal-add_files" class="modalx bottom-sheet modal-custom  hidden modal-small">
    <div class="modal-header">
        <h4>{{trans('message.upload_files')}}</h4>
        <div class="buttons-group">
            <a href="#" class="close-modal_add_files">
                <img src="/img/icon-close.png" alt="">
            </a>
        </div>
    </div>
    <div class="modalx-content">
        <div id="show_files_in_modal">
        </div>
    </div>
</div>

<div id="modal-upload_photos" class="modalx bottom-sheet modal-custom  hidden modal-small">
    <div class="modal-header">
        <h4>{{trans('message.photos')}}</h4>
        <div class="buttons-group">
            <a href="#" class="close-modal_upload_photos">
                <img src="{{asset('img/icon-close.png')}}" alt="">
            </a>
        </div>
    </div>
    <div class="modalx-content">
        <div id="show_upload_photos_in_modal">
        </div>
    </div>
</div>

<div id="show-daily-report-modal" class="modalx bottom-sheet modal-custom  hidden modal-small">
    <div class="modal-header">
        <h4>{{trans('message.add')}} {{trans('message.daily_report')}}</h4>
        <div class="buttons-group">
            <a href="#" class="close-daily-report-modal">
                <img src="{{asset('img/icon-close.png')}}" alt="">
            </a>
        </div>
    </div>
    <div class="modalx-content">
    </div>
</div>

<div id="add-gmail-config-modal" class="modalx bottom-sheet modal-custom hidden modal-small">
    <div class="modal-header">
        <h4>{{trans('message.add')}} {{trans('message.gmail_config')}}</h4>
        <div class="buttons-group">
            <a href="#" class="close-gmail-config-modal">
                <img src="{{asset('img/icon-close.png')}}" alt="" />
            </a>
        </div>
    </div>
    <div class="modalx-content">
        <form name="form-interview" id="form-add-gmail-config">
            <div class="input-group input-field k-input-text">
                <label for="project_id">{{trans('message.project_id')}} <span>*</span></label>
                <input type="text" name="project_id" id="project_id" class="validate k-txt-box" />
                <span class="error k-error" id="project_id_error"></span>
            </div>
            <div class="input-group input-field k-input-text">
                <label for="client_id">{{trans('message.client_id')}} <span>*</span></label>
                <input type="text" name="client_id" id="client_id" class="validate k-txt-box" />
                <span class="error k-error" id="client_id_error"></span>
            </div>
            <div class="input-group input-field k-input-text">
                <label for="client_secret">{{trans('message.client_secret')}} <span>*</span></label>
                <input type="text" name="client_secret" id="client_secret" class="validate k-txt-box" />
                <span class="error k-error" id="client_secret_error"></span>
            </div>
            <div class="authHtml">
                <div class="buttons-group">
                    <button class=" btn k-button-fill k-btn-icon saveAuth action-btn ml-4" type="submit">
                        <img src="/img/icon-tick-white.png" alt="">{{trans('message.add')}}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="modal-add-help" class="modalx bottom-sheet hidden modal-custom">
    <div class="modal-header">
        <h4 class="k-h4 modalTitle">
            {{trans('message.help')}}
        </h4>
        <div class="buttons-group">
            <a href="#" class="close-add-help">
                <img src="{{asset('img/icon-close.png')}}" alt="">
            </a>
        </div>
    </div>
    <div class="modalx-content">

    </div>
</div>
