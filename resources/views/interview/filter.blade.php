@if(count($interviews) > 0)
    @foreach($interviews as $interview)
        <tr class="interviewRow{{$interview->id}}">
            <td>{{$interview->model_name}}</td>
            <td>{{$interview->model_phone}}</td>
            <td>{{$interview->model_date}}</td>
            <td class="status-clumn">
                <div class="m-0 status-selection input-field col s12 k-dropdown k-dropdown-small k-not-label">
                    <select class="browser-default" id="model_status">
                        <option value="1" @if($interview->status=='1') selected='selected' @endif>{{trans('message.progress')}}</option>
                        <option value="2" @if($interview->status=='2') selected='selected' @endif>{{trans('message.completed')}}</option>
                        <option value="3" @if($interview->status=='3') selected='selected' @endif>{{trans('message.canceled')}}</option>
                    </select>
                </div>
            </td>
            <td class="action-clumn">
                @if($interview->status==0)
                    <div class="interviewText{{$interview->id}} {{date('Y-m-d')}} {{date('Y-m-d',strtotime($interview->model_date))}}">
                        @if((date('Y-m-d',strtotime($interview->model_date)) == date('Y-m-d')))
                            <button class=" btn k-button-fill k-btn-small start_interview" value="{{$interview->id}}" type="submit">{{trans('message.start_the_interview')}}</button>
                        @endif
                        <button class=" btn k-button-fill k-btn-small edit_interview" value="{{$interview->id}}" type="submit">{{trans('message.reschedule_the_interview')}}</button>
                        <button class=" btn k-button-fill k-btn-small closeInterview" value="{{$interview->id}}" type="submit">{{trans('message.cancel_the_interview')}}</button>
                    </div>
                @endif
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="5">
            There are not result was found
        </td>
    </tr>
@endif
