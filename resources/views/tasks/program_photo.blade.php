<div id="modal-program_photo" class=" modalx bottom-sheet hidden">
    <div class="modalx-content">
        <h4>{{trans('message.schedule_the_photo_shoot')}}</h4>

        <form action="/set_program_photo" method="POST">
            @csrf
            <div class="row">
                <div class="input-field">
                    <input id="date" type="text" name="date" class="validate">
                    <label for="price">{{trans('message.date_of_meeting')}}</h4></label>
                </div>
                <div id="row" class="input-field">
                    <input id="date" type="text" name="hour" class="validate">
                    <label for="price">{{trans('message.hour')}}</label>
                </div>
                <input type="hidden" value="" id="task_id" name="task_id" />
                <input type="hidden" value="" id="element_id" name="element_id" />
            </div>

            <button class="btn btn-success">{{trans('message.schedule')}}</button>
        </form>
    </div>
</div>
