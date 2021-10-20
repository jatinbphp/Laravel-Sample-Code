<form  method="post"  name="form-edit-staff-interview" id="form-edit-staff-interview">
    <input type="hidden" name="field_id" id="field_id" >
    <div class="row">
        <div class="input-field col s6 k-input-text" >
            <label>{{trans('message.interview')}} {{trans('message.date')}} <span>*</span></label>
            <input type="text" name="interview_date" class="futureDatePicker validate k-txt-box" id="interview_date" placeholder="{{trans('message.date')}}" @if(isset($staffInterview)) value="{{$staffInterview->date}}" @endif />
            <span class="error p-0 k-error" id="interview_date_error"> </span>
        </div>

        <div class="input-field col s6 k-dropdown">
            <label>{{trans('message.role')}} <span>*</span> </label>
            <select name="role_id" id="role_id"  class="browser-default getStaffRoleField">
                <option value=""> {{trans('message.select')}}</option>
                @foreach(array_diff(getRoles(),['Administrator','Model']) as $key=> $role)
                <option value="{{$key}}" @if(isset($staffInterview) && $staffInterview->role_id == $key) selected='selected' @endif>{{$role}}</option>
                @endforeach
            </select>
            <span class="k-error error" id="role_id_error"></span>
        </div>
    </div>
    <div class="staffRoleFields">
        @if($staffInterviewField)
            <div class="row">
                @foreach($staffInterviewField as $fieldId => $value)
                    @php
                    $fieldName = $value->name;
                    @endphp
                    <input  name="{{ $value->id }}" type="hidden">
                    @if($value->type =='text' || $value->type =='email' || $value->type =='time')
                        <div class="input-field col s6 k-input-text" >
                            <label for="{{ $value->name }}">{{ ucfirst($value->name) }}
                                @if($value->is_required == 1) <span>*</span> @endif
                            </label>
                            <input id="{{ $value->name }}" name="{{ $value->name }}" type="{{$value->type}}"  class="validate k-txt-box  @if($value->description == 'date') futureDatePicker @endif" @if(isset($staffinterviewData[$value->id])) value="{{$staffinterviewData[$value->id]}}" @endif>
                            <span class="error p-0 k-error" id="{{ str_replace(' ', '_', $value->name) }}_error">
                            </span>
                        </div>
                    @elseif($value->type =='textarea')
                        <div class="input-field col s6 k-input-text" >
                            <label for="{{ $value->name }}">{{  ucfirst($value->name) }}
                            </label>
                            <textarea rows="6" class="materialize-textarea  k-textarea" name="{{ $value->name }}" id="{{ $value->name }}">
                                @if(isset($staffinterviewData[$value->id]))
                                    {{$staffinterviewData[$value->id]}}
                                @endif
                            </textarea>
                            <span class="error p-0 k-error" id="{{ str_replace(' ', '_', $value->name) }}_error">
                            </span>
                        </div>
                    @elseif($value->type =='select' && isset($value->description))
                        @php  $selectdata = explode(',',$value->description); @endphp
                        <div class="input-fieldkcol s6 -dropdown" >
                            <label class="active"> {{  ucfirst($value->name) }}</label>
                            <select class="browser-default" name="{{ $value->name }}">
                                <option value="" selected>Choose your option</option>
                                @foreach($selectdata as $val)
                                    <option value="{{ $val}}" @if(isset($staffinterviewData[$value->id]) && $staffinterviewData[$value->id] == $val) selected='selected' @endif>{{ $val }}</option>
                                @endforeach
                            </select>
                            <span class="error p-0 k-error" id="{{ str_replace(' ', '_', $value->name) }}_error">
                            </span>
                        </div>
                    @elseif($value->type =='checkbox')
                        <div class="input-field col s6 k-checkbox">
                            <p>
                                <label>
                                    <input type="checkbox" name="{{ $value->name }}" class="filled-in"  />
                                    <span>{{ $value->name }}</span>
                                </label>
                            </p>
                            <span class="error p-0 k-error" id="{{ str_replace(' ', '_', $value->name) }}_error">
                            </span>
                        </div>
                    @elseif($value->type =='radio' && isset($value->description))
                        @php  $radiodata = explode(',',$value->description); @endphp
                        <div class="input-fieldkcol s6 -radio-fill" >
                            {{  ucfirst($value->name) }}
                                @foreach($radiodata as $val)
                                    <p>
                                        <label>
                                            <input class="with-gap" name="{{ $value->name }}" value="{{$val}}" type="radio" @if(isset($staffinterviewData[$value->id]) && $staffinterviewData[$value->id] == $val) checked='checked' @endif />
                                            <span>{{$val}}</span>
                                        </label>
                                    </p>
                                @endforeach
                                <span class="error p-0 k-error" id="{{ str_replace(' ', '_', $value->name) }}_error"> </span>
                            </div>
                        </div>
                    @endif
                @endforeach

                <div class="input-group input-field col s6 k-input-text">
                    <label for="location">{{trans('message.where_come')}} <span>*</span></label>
                    <input type="text" name="location" id="location" class="validate k-txt-box" @if(isset($staffInterview)) value="{{$staffInterview->location}}" @endif />
                    <span class="error k-error" id="location_error"></span>
                </div>
            </div>

            <div class="row">
                <div class="modal_button_center" >
                    <button type="submit" class="action-btn  btn k-button-fill k-btn-normal edit-staff-interview k-icon" data-id="{{ $staffInterview->id}}" ><img src="{{asset('img/edit.png')}}" alt="">{{trans('message.update')}} {{trans('message.staff')}} {{trans('message.interview')}}</button>
                </div>
            </div>
        @endif
    </div>
</form>
