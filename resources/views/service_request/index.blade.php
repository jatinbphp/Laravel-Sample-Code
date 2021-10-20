<div id="modal-service-request-list" class="modalx bottom-sheet hidden modal-custom newAgencyListModal">
    <div class="modalx-content">
        @include('service_request.list',['contractId'=>'0'])
    </div>
</div>

@include("service_request.modal")

<div id="modal-admin-service-request-accept" class="modalx bottom-sheet hidden modal-custom modal-small">
    <div class="modal-header">
        <h4 class="k-h4 modalTitle">
            {{trans('message.accept')}} {{trans('message.service')}} {{trans('message.order')}}
        </h4>
        <div class="buttons-group">
            <a id="" class="delete-icon showHelpQue" data-module="ServiceRequest" data-type="add-update">
                <i class="material-icons">help</i>
            </a>

            <a href="#" class="close-admin-service-request-accept">
                <img src="{{asset('img/icon-close.png')}}" alt="">
            </a>
        </div>
    </div>
    <div class="modalx-content">
        <form id="form-add-service-request" name="form-add-service-request" class="display-flex flex-column h-100 justify-content-between" enctype="multipart/form-data">
          <div class="row">
            <div class="input-field col s12 k-dropdown">
              <label for="name3">
                {{trans('message.super')}} {{trans('message.admin')}} <span>*</span>
              </label>
              <select id="over_by_user_id" name="over_by_user_id" class="overBySuperAdmin loadSelect">
                  @foreach(getAllUserByRole('1') as $adminId => $user)
                    <option value="{{$adminId}}" @if($adminId == $userId) selected='selected' @endif>{{$user}}</option>
                  @endforeach
              </select>
              <span class="error k-error" id="over_by_user_id_error">
              </span>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12">
              <div class="modal_button_center">
                <button class="ml-4  btn k-button-fill k-btn   action-btn acceptAdminServiceRequest" name="action" type="submit">
                  <img src="{{asset('img/edit.png')}}" alt="">
                  {{trans('message.accept')}} {{trans('message.service')}} {{trans('message.order')}}
                </button>
              </div>
            </div>
          </div>
        </form>
    </div>
</div>
