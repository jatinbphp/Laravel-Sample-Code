<!-- holiday filter -->
@if($type == "date")
  <div class="button-triggle-parent">
    <a href="#" class="chip main-filter-component-btn k-button-border dropdown-trigger btn" data-target='dateDropdown'>
      <i class="m-left-icon material-icons">today</i>
      {{ trans('message.date') }}
      <i class="closeHolidayFilter material-icons" data-area="user" data-type="date">close</i>
    </a>
  </div>
@elseif($type == "name")
<div class="button-triggle-parent">
  <a href="#" class="chip main-filter-component-btn k-button-border dropdown-trigger btn" data-target='nameDropdown'>
    <i class="m-left-icon material-icons">add</i>
    {{ trans('message.name') }}
    <i class="closeHolidayFilter material-icons" data-area="user" data-type="name">close</i>
  </a>
</div>
@elseif($type == "usertype")
<div class="button-triggle-parent">
  <a href="#" class="chip main-filter-component-btn k-button-border dropdown-trigger btn" data-target='usertypeDropdown'>
    <i class="m-left-icon material-icons">group</i>
    {{ trans('message.user_type') }}
    <i class="closeHolidayFilter material-icons" data-area="user" data-type="usertype">close</i>
  </a>
</div>
@elseif($type == "period")
<div class="button-triggle-parent">
  <a href="#" class="chip main-filter-component-btn k-button-border dropdown-trigger btn" data-target='periodDropdown'>
   <i class="m-left-icon material-icons">event_available</i>
     {{ trans('message.period') }}
    <i class="closeHolidayFilter material-icons" data-area="user" data-type="period">close</i>
  </a>
</div>
@endif
