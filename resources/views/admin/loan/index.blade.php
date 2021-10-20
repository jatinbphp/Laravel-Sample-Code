<div class="table-block  table-block-new">
    <table class="striped highlight" id="adminSalaryLoan" style="width:100%">
        <thead>
            <tr>
                <th class="center">
                    <label  class=" k-checkbox-fill">
                        <input type="checkbox" class="filled-in main_checkbox" />
                        <span class=""></span>
                    </label>
                </th>
                @foreach(getAdminSalaryLoanFields() as $fieldId => $val)
                    <th class="center">{{$val}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<div id="modal-admin-salary-loan-request" class="modalx bottom-sheet hidden modal-custom modal-small">
    <div class="modal-header">
        <h4 class="k-h4 modalTitle">{{trans('message.add')}} {{trans('message.salary')}} {{trans('message.loan')}}</h4>
        <div class="buttons-group">
            <a href="#" class="close-admin-salary-loan-request"><img src="{{asset('img/icon-close.png')}}" alt=""></a>
        </div>
    </div>
    <div class="modalx-content">

    </div>
</div>
<form id="form-loan-filter" name="form-loan-filter">
    <input type="hidden"  class="resetSalaryLoan salaryLoanUser" id="salaryLoanUser">
    <input type="hidden"  class="resetSalaryLoan salaryLoanDate" id="salaryLoanDate">
    <input type="hidden"  class="resetSalaryLoan salaryLoanAmount" id="salaryLoanAmount">
    <input type="hidden"  class="resetSalaryLoan salaryLoanPeriod" id="salaryLoanPeriod">
    <input type="hidden"  class="resetSalaryLoan salaryLoanEmiAmount" id="salaryLoanEmiAmount">
    <input type="hidden"  class="resetSalaryLoan salaryLoanStatus" id="salaryLoanStatus">
</form>
