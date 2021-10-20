<div class="scheduleRow rowId-{{$key}}" data-value="{{$key}}">
    <div class="row block-row-relative">
         <input name="tour_hour_id" id="tour_hour_id" value="{{isset($tour_hour_id) ? $tour_hour_id:''}}" type="hidden">

        <div class="input-field col s3 p-cus  k-input-text">
            <label for="start_time"> {{trans('message.break_start')}} </label>

              <button class=" btn k-button-fill k-btn-normal right {{isset($addmore->start_time) ? $addmore->start_time:'start_time'}} " name="break[{{$key}}][start_time]" id="{{$key}}" type="button"  > {{$key}} {{trans('message.break_start')}}  </button>
              <span>{{isset($addmore->start_time) ? $addmore->start_time:''}}</span>


        <span class="error k-error" id="start_time_key_name_error">
        </div>

        <div class="input-field col s3 p-cus  k-input-text">
            <label for="end_time"> {{trans('message.break_end')}}  </label>
             <button data-break-id="{{isset($addmore->id) ? $addmore->id:''}}" class=" btn k-button-fill k-btn-normal right {{isset($addmore->end_time) ? $addmore->end_time: 'end_time' }}" name="break[{{$key}}][end_time]" id="{{$key}}" type="button"  > {{$key}} {{trans('message.break_start')}}  </button>
              <span>{{isset($addmore->end_time) ? $addmore->end_time:''}}</span>


        <span class="error k-error" id="end_time_key_name_error">
        </div>

        <div class="input-field col s2 p-cus w-auto-width">
            <div class="add-row-button">
                <a href="#" data-rowid="{{$key}}" class="reakDeleteRow" data-url="booking/field_delete/" data-id="{{isset($addmore->id) ? $addmore->id:''}}">-</a>
            </div>
        </div>
    </div>
    <hr>
</div>
