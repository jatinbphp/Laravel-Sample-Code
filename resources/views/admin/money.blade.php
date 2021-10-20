@extends('layouts.app')

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-todo.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/custom/jquery.mCustomScrollbar.min.css')}}">
@endpush

@section('filter')
@include("layouts.common.filter",['closeCls' => 'closeAdminPaymentFilter','type' => 'admin_payment','cls' => 'paymentTab'])
@endsection

@section('content')
<div class="row">
	<div class="col s12">
		<div class="container">
			<section class="tabs-vertical mt-0 section">
				<div class="row">
					<div class="col left-content-panel">
						<!-- tabs  -->
						<div class="card-panel custom-panel">
							<ul class="tabs">
								<li class="tab">
									<a href="#payment-tab" id="payment_tab_action" class="active paymentTab filterBar" data-filter='admin_payment' data-close="closeAdminPaymentFilter" data-cls="paymentTab">
										<i class="material-icons">attach_money</i>
										<span>{{trans('message.payment')}}</span>
									</a>
								</li>
								<li class="tab">
									<a href="#income-tab" id="income_tab_action" class="filterBar incomeTab" data-filter='admin_income' data-close="closeIncomeFilter" data-cls="incomeTab">
										<i class="material-icons">payment</i>
										<span>{{trans('message.income')}}</span>
									</a>
								</li>

								<li class="tab">
                                    <a href="#salary-loan-list" class="filterBar adminSalaryLoanTab" data-filter="admin_salary_loan" data-close="closeAdminSalaryLoanFilter" data-cls="adminSalaryLoanTab">
                                    <i class="material-icons">account_balance_wallet</i>
                                    <span>{{trans('message.salary')}} {{trans('message.loan')}}</span>
                                    </a>
                                </li>

								<li class="indicator" style="left: 0px; right: 0px;">

								</li>
							</ul>
						</div>
					</div>
					<div class="col right-content-block">
						<div id="payment-tab">
							<div class="content">
								@include('admin.payment.index')
							</div>
						</div>
						<div id="income-tab" style="display: none;">
							<div class="content">
								@include('admin.payment.income')
							</div>
						</div>
						<div id="salary-loan-list" style="display: none;">
                            <div class="content">
                                <div class="card-panel border-radius-6 card-with-header p-0 mt-0">
                                    <div class="card-header adminSalaryLoan">
                                        <h4 class="k-h4">
                                            {{trans('message.salary')}} {{trans('message.loan')}}
                                        </h4>
                                        <div class="model-block-row">
                                        </div>
                                    </div>
                                    @include("admin.loan.index")
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
@endsection

@push('js')
<script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script type="text/javascript">
	$(".filterNewData.filterdate-block").mCustomScrollbar({
		axis: "x",
		theme: "light-3",
		advanced: {
			autoExpandHorizontalScroll: true
		},
	});
</script>
<script src="{{ asset('js/admin/payment.js')}}"></script>
<script src="{{ asset('js/admin/income.js')}}"></script>
<script src="{{ asset('js/admin/salary_loan.js')}}"></script>
@endpush
