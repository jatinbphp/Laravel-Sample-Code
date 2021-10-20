<div class="card-panel border-radius-6 card-with-header p-0 mt-0">
    <div class="card-header adminAgency">
        <h4 class="k-h4">{{trans('message.agencies')}}</h4>
    </div>
    <div class="table-block table-block-new">
        <table class="striped highlight table-loader" id="adminAgency" style="width:100%">
            <thead>
                <tr>
                    <th class="center">
                        <label  class=" k-checkbox-fill">
                            <input type="checkbox" class="filled-in main_checkbox" />
                            <span class=""></span>
                        </label>
                    </th>
                    @foreach(getAgencyFields() as $fieldId => $val)
                        <th class="center">
                            {{$val}}
                            @if($val == trans('message.actions'))
                                <a id="" class="delete-icon showHelpQue" data-module="Agency" data-type="action-bar">
                                    <i class="material-icons">help</i>
                                </a>
                            @endif
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<div id="modal-admin-agency" class="modalx bottom-sheet hidden modal-custom modal-small">
    <div class="modal-header">
        <h4 class="k-h4 modalTitle">{{trans('message.add')}} {{trans('message.agency')}}</h4>
        <div class="buttons-group">
            <a id="" class="delete-icon showHelpQue" data-module="Agency" data-type="add-update">
                <i class="material-icons">help</i>
            </a>

            <a href="#" class="close-admin-agency"><img src="{{asset('img/icon-close.png')}}" alt=""></a>
        </div>
    </div>
    <div class="modalx-content">

    </div>
</div>

@push('js')
<script src="{{ asset('js/superadmin/agency.js')}}"></script>
@endpush
