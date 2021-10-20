<!-- userpayment filter -->
@if($type == "date")
  <div class="button-triggle-parent">
    <a href="#" class="chip main-filter-component-btn k-button-border dropdown-trigger btn" data-target='dateDropdown'>
      <i class="m-left-icon material-icons">today</i>
      {{ trans('message.date') }}
      <i class="closeIncomeFilter material-icons" data-area="user" data-type="date">close</i>
    </a>

  </div>
@elseif($type == "time")
<div class="button-triggle-parent">
  <a href="#" class="chip main-filter-component-btn k-button-border dropdown-trigger btn" data-target='timeDropdown'>
    <i class="m-left-icon material-icons">add</i>
    {{ trans('message.time') }}
    <i class="closeIncomeFilter material-icons" data-area="user" data-type="time">close</i>
  </a>
</div>

@elseif($type == "status")
<div class="button-triggle-parent">
  <a href="#" class="chip main-filter-component-btn k-button-border dropdown-trigger btn" data-target='statusDropdown'>
    <i class="m-left-icon material-icons">invert_colors</i>
    {{ trans('message.status') }}
    <i class="closeIncomeFilter material-icons" data-area="user" data-type="status">close</i>
  </a>
</div>
@elseif($type == "period")
<div class="button-triggle-parent">
  <a href="#" class="chip main-filter-component-btn k-button-border dropdown-trigger btn" data-target='periodDropdown'>
   <i class="m-left-icon material-icons">event_available</i>
     {{ trans('message.period') }}
    <i class="closeIncomeFilter material-icons" data-area="user" data-type="period">close</i>
  </a>
</div>
@else
<div class="button-triggle-parent">
  <a href="#" class="chip main-filter-component-btn k-button-border dropdown-trigger amount" data-target='amountDropdown'>
   <i class="m-left-icon material-icons">attach_money</i>
      {{ trans('message.amount') }}
    <i class="closeIncomeFilter material-icons" data-area="user" data-type="amount">close</i>
  </a>
</div>
@endif
