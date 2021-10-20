<form name="form-edit-video-site" id="form-edit-video-site">
    <div class="input-group input-field k-input-text">
        <label for="model_username">{{trans('message.user')}} <span>*</span></label>
        <input type="text" name="username" id="username" class="validate k-txt-box" value="{{$site->username}}" />
        <span class="error k-error" id="username_error"></span>
    </div>
    <div class="input-group input-field k-input-text">
        <label for="model_password">{{trans('message.password')}} <span>*</span></label>
        <input type="text" name="password" id="pwd" class="validate k-txt-box" value="{{$site->password}}" />
        <span class="error k-error" id="password_error"></span>
    </div>

    <div class="input-field input-field k-dropdown">
        <label for="website_type">{{trans('message.website_type')}} <span>*</span></label>
        <select name="video_site_id" class="browser-default" data-type="userfeed" id="video_site_id">
            <option value="" disabled selected>{{trans('message.website_type')}}</option>
            @foreach(getVideoSite() as $siteId => $videoSite)
                <option value="{{$siteId}}" @if($site->video_site_id == $siteId) selected='selected' @endif>{{$videoSite}}</option>
            @endforeach
        </select>
        <span class="error k-error" id="video_site_id_error"></span>
    </div>

    <div class="input-group input-field k-input-text">
        <label for="token">{{trans('message.token')}} <span>*</span></label>
        <input type="text" name="token" id="token" class="validate k-txt-box" value="{{$site->token}}" />
        <span class="error k-error" id="token_error"></span>
    </div>

    <div class="input-field input-field k-dropdown">
        <label for="website_type">{{trans('message.status')}} <span>*</span></label>
        <select name="status" class="browser-default" data-type="userfeed" id="status">
            <option value="" disabled selected>{{trans('message.status')}}</option>
            @foreach(getVideoSiteStatus() as $statusId => $status)
                <option value="{{$statusId}}" @if($site->status == $statusId) selected='selected' @endif>{{$status}}</option>
            @endforeach
        </select>
        <span class="error k-error" id="satus_error"></span>
    </div>

    <div class="modal_button_center">
        <button class=" btn k-button-fill k-btn   submitEditSite action-btn" type="submit" data-id="{{$site->id}}"><img src="{{asset('img/edit.png')}}" alt="">
        {{trans('message.update')}} {{trans('message.video_sites')}}
        </button>
    </div>
</form>
