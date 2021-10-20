@if($type == '0')
  <div class="input-field col s3 k-dropdown">
      <label for="name3">
        {{trans('message.user')}}
      </label>
      <select id="user_id" name="user_id" class="contractUser loadSelect">
        <option value="">{{trans('message.select')}}</option>
        @foreach(getAllContractUserByRole($roleId,$studioId) as $userId => $user)
          <option value="{{$userId}}" data-badge="">{{$user}}</option>
        @endforeach
      </select>
      <span class="error k-error" id="user_id_error">
      </span>
  </div>
@endif

@if($type == '1')
  <div class="input-field col s3 k-input-text">
    <label for="name3">
      {{trans('message.password')}} <span>*</span> <a data-id="3" title="Edit" class="generatePassword edit-icon"> <i class="material-icons">refresh</i></a>
    </label>
    <input id="password" name="password" type="password" class="validate k-txt-box setGeneratePassword" maxlength="20">
    <span class="showBtn showBtn2">
      <i class="material-icons">visibility_off</i>
    </span>
    <span class="error k-error" id="password_error">
    </span>
    <div class="indicator">
      <span class="weak"></span>
      <span class="medium"></span>
      <span class="strong"></span>
    </div>
    <div class="text"></div>
  </div>
@endif
