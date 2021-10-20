<div class="table-block table-block-new">
    <table class="striped highlight" id="staff_question" class="display" style="width:100%">
        <thead>
            <tr>
                <th class="center">
                    <label  class="k-checkbox-fill">
                        <input type="checkbox" class="filled-in main_checkbox" name="check_all" id="check_all" />
                        <span class=""></span>
                    </label>
                </th>
                @foreach(getStaffReportQuestionFields() as $fieldId => $val)
                    <th class="center">{{$val}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<div id="show-staff-report-question" class="modalx bottom-sheet modal-custom hidden modal-small">
    <div class="modal-header">
        <h4>{{trans('message.staff')}} {{trans('message.question')}}</h4>
        <div class="buttons-group">
            <a href="#" class="close-staff-report-question">
                <img src="{{asset('img/icon-close.png')}}" alt="">
            </a>
        </div>
    </div>
    <div class="modalx-content">

    </div>
</div>
