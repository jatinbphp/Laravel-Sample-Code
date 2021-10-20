<form method="POST" id="form-edit-lead_request" name="form-edit-lead_request">
    @csrf
    <input type="hidden" name="key" id="key" value="-1" />
  <input type="hidden" name="lead_id" id="lead_id" value="{{$lead->id}}" />

        <div class="input-group  input-field k-input-text">
            <label for="nume">{{trans('message.title')}} <span>*</span></label>
            <input type="text" name="nume" id="nume"  value="{{$lead->nume}}" class="validate k-txt-box" id="nume" />
            <span class="k-error error" id="nume_error"></span>
        </div>
        <div class="input-group  input-field k-input-text">
            <label for="descriere">{{trans('message.description')}} <span>*</span></label>
            <input type="text" name="descriere" id="descriere" value="{{$lead->descriere}}" class="validate k-txt-box" id="descriere" />
            <span class="k-error error" id="edit_descriere_error"></span>
        </div>
        <div class="input-group  input-field k-input-text">
            <label for="puncte">{{trans('message.number_of_points')}} <span>*</span></label>
            <input type="number" name="puncte" id="puncte" value="{{$lead->valoare_puncte}}"  class="validate k-txt-box" id="puncte" />
            <span class="k-error error" id="edit_puncte_error"></span>
        </div>

            <div class="input-field  k-dropdown">
                <label>{{trans('message.select_the_user')}}  </label>
                <select name="user_id" id="user_id"  class="browser-default">
                    <option value="" selected>{{trans('message.select')}}</option>
                    @foreach($roles as $roleId => $role)
                        <optgroup label="{{$role}}">
                            @foreach($roleUsers[$role] as $key => $roleUser)
                                <option value="{{$key}}" @if($key==$lead->user_id) selected @endif>{{$roleUser}}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>

                <span class="k-error error" id="edit_user_id_error"></span>
            </div>

<div class="row">
    <div class="modal_button_center" >
        <button data-id="{{$lead->id}}" class="action-btn  btn k-button-fill k-btn-normal k-icon submit-edit_lead_request" type="button"><img src="{{asset('img/edit.png')}}">  {{trans('message.update')}} {{trans('message.lead')}}</button>
        </div>
</div>

</form>
