<form name="form-add-staff-interview-field" id="form-add-staff-interview-field">
    <div class="row">
        <div class="col s6 input-group k-dropdown">
            <label for="role_id">{{trans('message.role')}} <span>*</span></label>
            <select name="role_id" id="role_id"  class="browser-default">
                <option value=""> {{trans('message.select')}}</option>
                @foreach(array_diff(getRoles(),['Administrator','Model']) as $key=> $role)
                    <option value="{{$key}}" @if(isset($staffInterviewField) && $staffInterviewField->role_id==$key) selected='selected' @endif>{{$role}}</option>
                @endforeach
            </select>
            <span class="error k-error" id="role_id_error"></span>
        </div>

        <div class="col s6 input-group k-dropdown">
            <label for="type">{{trans('message.fields')}} <span>*</span></label>
            <select name="type" id="type"  class="browser-default">
                <option value=""> {{trans('message.select')}}</option>
                @foreach(getFieldsList() as $fieldId => $val)
                    <option value="{{$fieldId}}" @if(isset($staffInterviewField) && $staffInterviewField->type==$fieldId) selected='selected' @endif>{{$val}}</option>
                @endforeach
            </select>
            <span class="error k-error" id="type_error"></span>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6 k-input-text">
          <label for="name3">
            {{trans('message.name')}} <span>*</span>
          </label>
          <input id="name" name="name" type="text" class="validate k-txt-box" @if(isset($staffInterviewField)) value="{{$staffInterviewField->name}}" @endif>
          <span class="error k-error" id="name_error">
          </span>
        </div>

        <div class="col s6 input-group k-dropdown">
            <label for="type">{{trans('message.is_required')}} <span>*</span></label>
            <select name="is_required" id="is_required"  class="browser-default">
                <option value=""> {{trans('message.select')}}</option>
                @foreach(['0' => 'No','1' => 'Yes'] as $fieldId => $val)
                    <option value="{{$fieldId}}" @if(isset($staffInterviewField) && $staffInterviewField->is_required == $fieldId) selected='selected' @endif>{{$val}}</option>
                @endforeach
            </select>
            <span class="error k-error" id="type_error"></span>
        </div>
    </div>
    <div class="row">
        <div class="col s12 input-field k-input-text">
            <label for="description">{{trans('message.description')}} <span>*</span></label>
            <textarea name="description" id="description" class="k-textarea">
                @if(isset($staffInterviewField))
                    {{$staffInterviewField->description}}
                @endif
            </textarea>
            <span class="error k-error" id="description_error"></span>
        </div>
    </div>

    <div class="modal_button_center">
        @if(isset($staffInterviewField))
            <button class="ml-4  btn k-button-fill k-btn  updateStaffInterviewField action-btn" type="submit" data-id="{{$staffInterviewField->id}}">
            <img src="{{asset('img/edit.png')}}" alt="">{{trans('message.update')}}
            </button>
        @else
            <button class="action-btn  btn k-button-fill k-icon saveStaffInterviewField" type="submit">
              <img src="{{asset('img/plus-bl.png')}}">{{trans('message.add')}}
            </button>
        @endif
    </div>
</form>
