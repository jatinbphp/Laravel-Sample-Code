<div class="scheduleRow rowId" data-value="key">
    <div class="row block-row-relative">
         <div class="input-field col s3 p-cus  k-input-text">
            <label for="start_time"> {{trans('message.break_start')}} </label>
              <button class=" btn k-button-fill k-btn-normal right start_time" name="break[key][start_time]" id="key" type="button"  > key {{trans('message.break_start')}}  </button>

        <span class="error k-error" id="start_time_key_name_error">
        </div>

        <div class="input-field col s3 p-cus  k-input-text">
            <label for="end_time"> {{trans('message.break_end')}}  </label>
             <button class=" btn k-button-fill k-btn-normal right end_time" name="break[key][end_time]" id="key" type="button"  > key {{trans('message.break_end')}}  </button>

        <span class="error k-error" id="end_time_key_name_error">
        </div>

        <div class="input-field col s2 p-cus w-auto-width">
            <div class="add-row-button">
                <a href="#" data-rowid="key" class="breakDeleteRow">-</a>
            </div>
        </div>
    </div>
    <hr>
</div>
