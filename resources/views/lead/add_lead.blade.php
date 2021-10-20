<form method="POST" id="form-general-lead" name="form-general-lead">
    @csrf
    <input type="hidden" name="key" id="key" value="-1" />

        <div class="input-group  input-field k-input-text">
            <label for="nume">{{trans('message.title')}} <span>*</span></label>
            <input type="text" name="nume" id="nume" class="validate k-txt-box" id="nume" />
            <span class="error k-error" id="nume_error"></span>
        </div>
        <div class="input-group  input-field k-input-text">
            <label for="descriere">{{trans('message.description')}} <span>*</span></label>
            <input type="text" name="descriere" id="descriere" class="validate k-txt-box" id="descriere" />
            <span class="error k-error" id="descriere_error"></span>
        </div>
        <div class="input-group  input-field k-input-text">
            <label for="puncte">{{trans('message.number_of_points')}} <span>*</span></label>
            <input type="text" name="puncte" id="puncte"  class="validate k-txt-box" id="puncte" />
            <span class="error k-error" id="puncte_error"></span>
        </div>

            <div class="input-field  k-dropdown">
                <label>{{trans('message.select_the_user')}}  </label>
                 <select name="user_id" id="user_id"  class="browser-default validate">
                    <option value="" selected>{{trans('message.select')}}</option>
                    @foreach($roles as $roleId => $role)
                        <optgroup label="{{$role}}">
                            @foreach($roleUsers[$role] as $key => $roleUser)
                                <option value="{{$key}}"  >{{$roleUser}}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>

            </div>
        <div class="row">
    <div class="modal_button_center" >
            <button class="action-btn  btn k-button-fill k-btn-normal k-icon saveGenerallead " type="button"><img src="{{asset('img/plus-bl.png')}}"> {{trans('message.add')}} {{trans('message.leads')}}</button>
        </div></div>
</form>
