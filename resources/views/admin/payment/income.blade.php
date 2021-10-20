<div class="card-panel border-radius-6 card-with-header p-0 mt-0">
    <div class="card-header incomeAdmin">
        <h4 class="k-h4">{{trans('message.income')}}</h4>
        <div class="model-block-row"></div>
    </div>
    <div class="table-block table-block-new">
        <table id="incomeAdmin" style="width:100%" class="centered responsive-table striped highlight">
            <thead>
                <tr>
                    <th class="center">
                        <label  class=" k-checkbox-fill">
                            <input type="checkbox" class="filled-in main_checkbox" />
                            <span class=""></span>
                        </label>
                    </th>
                    @foreach(getAdminIncomeFields() as $fieldId => $val)
                        <th class="center">{{$val}}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <form id="form-income-filter" name="form-income-filter">
        <input type="hidden" name="name"  class="resetIncome name" id="nameIncome">
        <input type="hidden" name="date"  class="resetIncome dateIncomeFilter" id="dateIncome">
        <input type="hidden" name="time"  class="resetIncome time" id="timeIncome">
        <input type="hidden" name="from_date"  class="resetIncome from_date" id="from_dateIncome">
        <input type="hidden" name="to_date"  class="resetIncome to_date" id="to_dateIncome">
        <input type="hidden" name="amount"  class="resetIncome amountIncomeFilter" id="amount">
    </form>
</div>
