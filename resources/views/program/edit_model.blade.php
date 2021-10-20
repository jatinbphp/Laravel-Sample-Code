<form method="POST" id="form-program-edit" name="form-program-edit">
    <input type="hidden" name="program_id"value="{{$program->id}}"/>
    <div class="row">
        <label>Data</label>
        <input type="date" name="date" value="{{$program->date}}" />
    </div>
    <div class="row">
        <label>{{trans('message.tour')}}</label>
        <select name="tour" style="display:block">
            <option value="1" @php if($program->tour=='1') echo 'selected' ; @endphp>{{trans('message.tour')}} 1</option>
            <option value="2" @php if($program->tour=='2') echo 'selected' ; @endphp>{{trans('message.tour')}} 2</option>
            <option value="3" @php if($program->tour=='3') echo 'selected' ; @endphp>{{trans('message.tour')}} 3</option>
        </select>
    </div>
    <div class="row">
        <label>Camera</label>
        <select name="room" style="display:block">
            @foreach($room as $elm)
            <option value="{{$elm->id}}" @php if($elm->id==$program->room_id) echo 'selected' ; @endphp>{{$elm->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="row">
        <label>Model</label>
        <select name="model" style="display:block">
            @foreach($models as $key => $model)
            <option value="{{$key}}" @php if($key==$program->model_id) echo 'selected' ; @endphp>{{$model}}</option>
            @endforeach
        </select>
    </div>
    <div class="row">
        @if($trainer1 !=null)
        <label>Primul Trainer</label>
        <select name="first_trainer" style="display:block">
            @foreach($trainers as $trainer)
            <option value="{{$trainer->id}}" @php if($trainer->id==$trainer1->id) echo 'selected' ; @endphp>{{$trainer->name}}</option>
            @endforeach
        </select>
        @endif
        @if($trainer2 !=null)
        <label>Al Doilea Trainer</label>
        <select name="second_trainer"  style="display:block">
            @foreach($trainers as $trainer)
            <option value="{{$trainer->id}}" @php if($trainer->id==$trainer2->id) echo 'selected' ; @endphp>{{$trainer->name}}</option>
            @endforeach
        </select>
        @endif
    </div>
    <button type="submit" class="btnEditProgram">{{trans('message.edit')}}</button>
</form>
