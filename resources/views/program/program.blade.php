@extends('layouts.app')
@section('content')
@if($user->role_id==5)
    <div id="program-modal1" class=" modalx bottom-sheet hidden">
        <div class="modalx-content">
            <h4>{{trans('message.add_turn')}}</h4>
            <form method="POST" id="form-program-add" name="form-program-add">
                <input type="hidden" name="tour_id" id="tour_id" value="" />
                <input type="hidden" name="room_id"  id="room_id" value="" />
                <input type="hidden" name="date"  id="hour" value="" />
                <select name="user" style="display:block">
                    @foreach($models as $key => $model)
                        <option value="{{$key}}">{{$model}}</option>
                    @endforeach
                </select>
                <span class="error" id="user_error"></span>
                <button type="submit" class="btnAddProgram">{{trans('message.add')}}</button>
            </form>
        </div>
        <div class="modalx-footer">
            <a class=" btn purple-btn" id="close-program-modal1">Close</a>
        </div>
    </div>
    <div id="program-modal2" class=" modalx bottom-sheet hidden">
        <div class="modalx-content">
            <h4>{{trans('message.edit_this_template')}}</h4>
            <div id="edit_this_model">

            </div>
        </div>
        <div class="modalx-footer">
            <a class=" btn purple-btn" id="close-program-modal2">Close</a>
        </div>
    </div>
@endif
<div class="screen-dashboard">
    <div class="row">
        <div class="col s12">
            <div class="row">
                <div class="col s12">
                    <div class="  dataTables_wrapper widget widget-table-rooms">
                        <div class="widget-heading">
                            <div class="heading-title hour" data-value="{{$date}}">
                                {{$date}}
                                <input type="date" id="change_date" value="" />
                            </div>
                            <table class="centered display responsive-table  striped highlight" role="grid">
                                <tbody id="roomList">
                                    @php
                                    $key=0;
                                    $value=0;
                                    if($user->role_id==5) $value=1;
                                    @endphp
                                    @foreach($rooms as $room)
                                    @if($key==0)
                                    <tr role="row"> @endif
                                        <td class="" data-value="{{$room->id}}" id="{{$room->id}}">{{$room->name}}
                                            <div  data-value="1" data-free="0" class="sh-wrap take_room tour1" data_program_id="" data-check="{{$value}}"> 1</div>
                                            <div data-value="2" data-free="0" class="sh-wrap take_room tour2" data_program_id="" data-check="{{$value}}"> 2</div>
                                            <div data-value="3" data-free="0" class="sh-wrap take_room tour3" data_program_id="" data-check="{{$value}}"> 3</div>
                                        </td>
                                        @php $key++ ;@endphp
                                        @if($key==8)
                                        @php $key=0; @endphp
                                    </tr>
                                    @endif
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function(){
        var date=$(".hour").attr('data-value');
        get_programs(date);
    });
</script>
@endpush
