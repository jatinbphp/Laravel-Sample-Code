<div class="table-block  table-block-new">
    <table class="striped highlight" id="problemList" style="width:100%">
        <thead>
            <tr>
                <th class="center">
                    <label  class=" k-checkbox-fill">
                        <input type="checkbox" class="filled-in main_checkbox" />
                        <span class=""></span>
                    </label>
                </th>
                @foreach(getProblemsFields() as $fieldId => $val)
                    <th class="center">{{$val}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<div id="modal-problem-flow-request" class="modalx bottom-sheet hidden modal-custom modal-small">
    <div class="modal-header">
        <h4 class="k-h4 modalTitle">{{trans('message.add')}} {{trans('message.flow')}}</h4>
        <div class="buttons-group">
            <a href="#" class="close-problem-flow-request"><img src="{{asset('img/icon-close.png')}}" alt=""></a>
        </div>
    </div>
    <div class="modalx-content">

    </div>
</div>
<form id="form-payment-filter" name="form-payment-filter">
    <input type="hidden"  class="resetProblem problemName" id="problemName">
    <input type="hidden"  class="resetProblem studioName" id="studioName">
    <input type="hidden"  class="resetProblem problemRoleName" id="problemRoleName">
    <input type="hidden"  class="resetProblem resolverRoleName" id="resolverRoleName">
    <input type="hidden"  class="resetProblem problemDependancy" id="problemDependancy">
    <input type="hidden"  class="resetProblem problemDay" id="problemDay">
</form>
