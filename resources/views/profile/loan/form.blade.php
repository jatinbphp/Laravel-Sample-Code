<form id="form-add-salary-loan" name="form-add-salary-loan" class="display-flex flex-column h-100 justify-content-between" enctype="multipart/form-data">
  <div class="row">
    <div class="input-field col s4 k-input-text">
      <label for="name3">
        {{trans('message.loan')}} {{trans('message.amount')}} <span>*</span>
      </label>
      <input id="name" name="loan_amount" type="text" class="validate numeric loanAmout k-txt-box" @if(isset($salaryLoan)) value="{{$salaryLoan->loan_amount}}" @endif maxlength="5">
      <span class="error k-error" id="loan_amount_error">
      </span>
    </div>

    <div class="input-field col s4 k-dropdown">
      <label for="name3">
        {{trans('message.period')}} <span>*</span>
      </label>
      <select id="period" name="period" class="loanPeriod">
          <option value="">{{trans('message.select')}}</option>
          @for($i=1;$i<=36;$i++)
              <option value="{{$i}}" @if(isset($salaryLoan) && $salaryLoan->period == $i) selected='selected' @endif >{{$i}} {{trans('message.month')}}</option>
          @endfor
      </select>
      <span class="error k-error" id="period_error">
      </span>
    </div>

    <div class="input-field col s4 k-input-text">
      <label for="name3">
        {{trans('message.emi')}} {{trans('message.amount')}} <span>*</span>
      </label>
      <input id="name" name="emi_amount" type="text" class="validate numeric emiAmout k-txt-box" @if(isset($salaryLoan)) value="{{$salaryLoan->emi_amount}}" @endif maxlength="5" readonly>
      <span class="error k-error" id="emi_amount_error">
      </span>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s12 k-input-text">
      <label for="name3">
        {{trans('message.loan')}} {{trans('message.notes')}}
      </label>
      <textarea class="materialize-textarea k-textarea" name="notes" rows="2" id="notes">
        @if(isset($salaryLoan))
          {{$salaryLoan->notes}}
        @endif
      </textarea>
      <span class="error p-0 k-error" id="notes_error">
      </span>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s12">
      <div class="modal_button_center">
        @if(isset($salaryLoan))
          <button class="ml-4  btn k-button-fill k-btn  submit-edit-interview action-btn updateUserSalaryLoan" name="action" type="submit" data-id="{{$salaryLoan->id}}">
            <img src="{{asset('img/edit.png')}}" alt="">
            {{trans('message.update')}} {{trans('message.salary')}} {{trans('message.loan')}}
          </button>
        @else
          <button class="action-btn  btn k-button-fill k-icon submitUserSalaryLoan" type="submit">
            <img src="{{asset('img/plus-bl.png')}}">{{trans('message.add')}} {{trans('message.salary')}} {{trans('message.loan')}}
          </button>
        @endif
      </div>
    </div>
  </div>
</form>
