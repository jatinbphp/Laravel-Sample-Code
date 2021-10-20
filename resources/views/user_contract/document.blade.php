<form class="display-flex flex-column h-100 justify-content-between" enctype="multipart/form-data" id="form-add-user-contract-document" name="form-add-user-contract-document">
    <div class="row">
        <div class="uphead">
            <label for="name3">
            {{trans('message.legal')}} {{trans('message.document')}} <span class="redhastric">*</span>
            </label>
            <a class="udownloadbtn documentDownload" data-id="{{$contractId}}">
                <i class="material-icons">file_download</i>
            </a>
        </div>
        <div class="input-images-1 dumain" style="padding-top: .5rem;">
        </div>
        <span class="error k-error" id="images_error">
        </span>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <div class="modal_button_center">
                <button class="action-btn btn k-button-fill k-icon saveUserContractDocument" data-id="{{$contractId}}" type="submit">
                    <img src="{{asset('img/plus-bl.png')}}">
                        {{trans('message.upload')}} {{trans('message.document')}}
                    </img>
                </button>
            </div>
        </div>
    </div>
</form>
