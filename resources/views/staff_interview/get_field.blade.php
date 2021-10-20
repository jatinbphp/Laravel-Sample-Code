@if($staffinterview_field)
    <div class="row">
        @foreach($staffinterview_field as $key => $value)
            <input  name="{{ $value->id }}" type="hidden">
            @if($value->type =='text' || $value->type =='email')
                <div class="input-field col s6 k-input-text" >
                    <label for="{{ $value->name }}">{{ ucfirst($value->name) }}
                        @if($value->is_required == 1) <span>*</span> @endif
                    </label>
                    <input id="{{ $value->name }}" name="{{ $value->name }}" type="{{$value->type}}"  class="validate k-txt-box  @if($value->description == 'date') futureDatePicker @endif">
                    <span class="error p-0 k-error" id="{{ str_replace(' ', '_', $value->name) }}_error">
                    </span>
                </div>
            @elseif($value->type =='time')
                <div class="input-field col s6 k-input-text" >
                    <label for="{{ $value->name }}">{{ ucfirst($value->name) }}
                        @if($value->is_required == 1) <span>*</span> @endif
                    </label>
                    <input id="{{ $value->name }}" name="{{ $value->name }}" type="text"  class="validate k-txt-box @if($value->type == 'time') timePicker @endif">
                    <span class="error p-0 k-error" id="{{ str_replace(' ', '_', $value->name) }}_error">
                    </span>
                </div>
            @elseif($value->type =='textarea')
                <div class="input-field col s6 k-input-text" >
                    <label for="{{ $value->name }}">{{  ucfirst($value->name) }}
                    </label>
                    <textarea rows="6" class="materialize-textarea  k-textarea" name="{{ $value->name }}" id="{{ $value->name }}"></textarea>
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
                        <option value="{{ $val}}">{{ $val }}</option>
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
                                    <input class="with-gap" name="{{ $value->name }}" value="{{$val}}" type="radio" />
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
            <input type="text" name="location" id="location" class="validate k-txt-box" />
            <span class="error k-error" id="location_error"></span>
        </div>
    </div>

    <div class="row">
        <div class="modal_button_center" >
            <button type="submit" class="action-btn  btn k-button-fill k-btn-normal submit-staff-interview k-icon" ><img src="{{asset('img/plus-bl.png')}}"> {{trans('message.add')}} {{trans('message.staff')}} {{trans('message.interview')}}</button>
        </div>
    </div>
@endif
