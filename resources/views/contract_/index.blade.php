@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col s12">
        <div class="container">
                <div class="section users-edit">
                    <div id="button-trigger" class="card scrollspy border-radius-6 pt-1">
                        <div class="table-block table-block-new">
                            <div class="boking-filter-row">
                                <div class="booking-filter-block " >
                                    <a href="#" class="main-filter-btn">
                                        <span>
                                            <img src="{{ asset('img/filter.png')}}">
                                        </span>
                                        {{ trans('message.filter_by') }} :
                                    </a>
                                    <div class="filterData filterdate-block">
                                    </div>
                                    <!-- Dropdown Trigger -->
                                    <div class="button-triggle-parent">
                                        <a class='dropdown-trigger modal-filter-add-btn' href='#' data-target='filter-option'>{{ trans('message.add_filter') }}!</a>
                                        <!-- Dropdown Structure -->
                                        <ul id='filter-option' class='dropdown-content  modal-filter-dropdown'>
                                            <li class="li-name">
                                                <a href="#" class="filterValue" data-type="name" data-area="user">{{ trans('message.name') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Dropdown Structure -->
                                    <ul id='nameDropdown' class=' dropdown-with-checkbox dropdown-content  modal-filter-dropdown'>
                                        @foreach($users['roles'] as $roleId => $role)
                                        <li>
                                            <h6>{{$role}}</h6>
                                            @foreach($users['rolesusers'][$role] as $key => $roleUser)
                                            <div class="list-block-checkbox">
                                                <label class="k-checkbox-fill">
                                                    <input type="checkbox" data-id={{$key}} data-type="admin" value="{{$key}}" class="filled-in nameDropdown" name="userCheckbox" id="userCheckbox_{{$key}}" multiple="multiple" />
                                                    <span>{{$roleUser}}</span>
                                                </label>
                                            </div>
                                            @endforeach
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <form id="form-payment-filter" name="form-payment-filter">
                                <input type="hidden"  class="name" id="name">
                            </form>

                            <div class="">
                                <table class="striped highlight" id="userContract" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="center">{{ trans('message.no') }}</th>
                                            <th class="center">{{ trans('message.avatar') }}</th>
                                            <th class="center">{{ trans('message.user') }}</th>
                                            <th class="center">{{ trans('message.phone') }}</th>
                                            <th class="center">{{ trans('message.contract') }}</th>
                                            <th class="center">{{ trans('message.actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script type="text/javascript" src="{{asset('js/contract.js')}}"></script>
@endpush
