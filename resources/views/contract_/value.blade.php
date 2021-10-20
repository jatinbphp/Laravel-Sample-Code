<!-- usercontract filter -->

@if($type == "name")
<div class="button-triggle-parent">
  <a href="#" class="chip main-filter-component-btn k-button-border dropdown-trigger btn" data-target='nameDropdown'>
    <i class="m-left-icon material-icons">add</i>
    {{ trans('message.name') }}
    <i class="closeContractFilter material-icons" data-area="user" data-type="name">close</i>
  </a>
</div>
@endif
