@if(count($programs) > 0)
    @foreach($programs as $program)
        <tr>
            <td>{{$program->real_name}}</td>
            <td>{{$program->tour}}</td>
            <td>{{$program->date}}</td>
            <td>{{$program->room_name}}</td>
            <td>
                <button data-model="{{$program->id}}" class="show-manager-modal   btn k-button-fill k-btn-normal">{{trans('message.add_receipts')}}</button>
            </td>
            @if($program->status ==1)
                <td>{{trans('message.complete_tour')}}</td>
            @elseif($program->status==2)
                <td>{{trans('message.incomplete_tour')}}</td>
            @elseif($program->stauts==3)
                <td>{{trans('message.absence_tour')}}</td>
            @else
                <td id="programText{{$program->id}}">
                    <button data-model="{{$program->id}}" data-value="1" class="  btn k-button-fill k-btn-normal finish_tour" type="button">{{trans('message.complete_tour')}}</button>
                    <button data-model="{{$program->id}}" data-value="2" class="  btn k-button-fill k-btn-normal finish_tour" type="button"> {{trans('message.incomplete_tour')}}</button>
                    <button data-model="{{$program->id}}" data-value="3" class="  btn k-button-fill k-btn-normal finish_tour" type="button"> {{trans('message.absence_tour')}}</button>
                </td>
                @if($program->trainer_id ==null)
                    <td id="trainerText{{$program->id}}">
                        <button data-model="{{$program->id}}" class="vezi_trainer action-btn  btn k-button-fill k-btn-normal " type="button">{{trans('message.associate_with_a_trainer')}}</button>
                    </td>
                @else
                    <td>
                        <span id="trainer_name{{$program->id}}"></span>
                    </td>
                    <td>
                        <script> trainer({{$program->id}}) </script>
                    </td>
                @endif
            @endif
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="5">
            There are no result was found
        </td>
    </tr>
@endif
