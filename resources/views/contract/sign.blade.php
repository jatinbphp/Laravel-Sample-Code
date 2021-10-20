<form id="form-contract-sign" name="form-contract-sign" class="display-flex flex-column h-100 justify-content-between" enctype="multipart/form-data">
  <div class="input-field col s12 k-input-text">
    <canvas id="signature-pad" class="signature-pad" width="450" height="300">
    </canvas>
    <span class="error k-error" id="image_error"></span>
  </div>
  <div class="row">
    <div class="input-field col s6">
      <div class="modal_button_center">
        <button class="action-btn  btn k-button-fill k-icon saveSign" type="submit" id="saveSign" data-key="{{$contractKey}}">
          {{trans('message.sign')}} {{trans('message.contract')}}
        </button>
      </div>
    </div>
    <div class="input-field col s6">
      <div class="modal_button_center">
        <button class="action-btn  btn k-button-fill k-icon" id="clearSignature" type="button">
          {{trans('message.clear')}}
        </button>
      </div>
    </div>
  </div>
</form>
