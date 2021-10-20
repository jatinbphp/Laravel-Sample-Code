<div class="table-block table-block-new">
    <table class="striped highlight" id="all_staff_interviews" class="display" style="width:100%">
        <thead>
            <tr>
                <th class="center">
                    <label  class=" k-checkbox-fill">
                        <input type="checkbox" class="filled-in main_checkbox" name="check_all" id="check_all" />
                        <span class=""></span>
                    </label>
                </th>
                @foreach(getStaffInterviewFields() as $fieldId => $val)
                    <th class="center">{{ $val }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<div id="modal-add_staff_interviu" class="modalx bottom-sheet hidden modal-custom modal-small">
    <div class="modal-header">
        <h4>{{trans('message.staff')}} {{trans('message.add')}} {{trans('message.interview')}}</h4>
        <div class="buttons-group">
            <a href="#" class="close-modal_add_staff_interviu"><img src="/img/icon-close.png" alt=""></a>
        </div>
    </div>
    <div class="modalx-content">
        <form  method="post"  name="form-staff-interview" id="form-staff-interview">
            <div class="row">
                <div class="input-field col s6 k-input-text" >
                    <label>{{trans('message.interview')}} {{trans('message.date')}} <span>*</span></label>
                    <input type="text" name="interview_date" class="futureDatePicker validate k-txt-box" id="interview_date" value="" placeholder="{{trans('message.date')}}" />
                    <span class="error p-0 k-error" id="interview_date_error"> </span>
                </div>

                <div class="input-field col s6 k-dropdown">
                    <label>{{trans('message.role')}} <span>*</span> </label>
                    <select name="role_id" id="role_id"  class="browser-default getStaffRoleField">
                        <option value=""> {{trans('message.select')}}</option>
                        @foreach(array_diff(getRoles(),['Administrator','Model']) as $key=> $role)
                        <option value="{{$key}}">{{$role}}</option>
                        @endforeach
                    </select>
                    <span class="k-error error" id="role_id_error"></span>
                </div>
            </div>
            <div class="staffRoleFields">
            </div>
        </form>
    </div>
</div>

<div id="modal-edit_staff_interviu" class="modalx bottom-sheet hidden modal-custom modal-small">
    <div class="modal-header">
        <h4>{{trans('message.staff')}} {{trans('message.edit')}} {{trans('message.interview')}}</h4>
        <div class="buttons-group">
            <a href="#" class="close-modal_edit_staff_interviu">
                <img src="{{asset('img/icon-close.png')}}" alt="">
            </a>
        </div>
    </div>
    <div class="modalx-content " id="edit_staff_interviu">
    </div>
</div>

<div id="modal-start-staff-interview" class="modalx bottom-sheet hidden modal-custom">
    <div class="modal-header">
        <h4 class="k-h4 modalTitle">{{trans('message.staff')}} {{trans('message.interview')}}</h4>
        <div class="buttons-group">
            <a href="#" class="close-start-staff-interview-modal"><img src="{{asset('img/icon-close.png')}}" alt=""></a>
        </div>
    </div>
    <div class="modalx-content">

    </div>
</div>
