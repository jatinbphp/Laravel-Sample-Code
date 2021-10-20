@extends($layoutTheme)

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-invoice.css')}}">
<style type="text/css">
		.invoice-edit-wrapper .invoice-item .invoice-item-filed {
		    padding: 0px .8rem .8rem !important;
		}
		.invoice-edit-wrapper .invoice-item .invoice-item-filed .col.input-field {
		    padding-top: 0px !important;
    		padding-bottom: 23px;
		}
		.invoice-edit-wrapper .invoice-item .invoice-item-filed .col.input-field input {
			height: 40px;
			margin: 0px;
		}
</style>
@endpush

@section('content')

<div class="row pos-r">
	<div class="col s12">
		<div class="container">
			<section class="tabs-vertical mt-0 section">
				<div class="row">
					<div class="col left-content-panel pl-0">
						<!-- tabs  -->
						<div class="card-panel custom-panel">
							<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
								<ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out2" data-menu="menu-navigation" data-collapsible="menu-accordion">
									@if($userRoleName == "Super Admin")
										<li class="tab bold mainTab">
											<a href="{{url('superadmin')}}#first">
												<i class="material-icons">collections_bookmark</i>
												<span>{{trans('message.agencies')}}</span>
											</a>
										</li>
										<li class="tab">
											<a href="{{url('superadmin')}}#second">
												<i class="material-icons">account_box</i>
												<span>{{trans('message.contracts')}}</span>
											</a>
										</li>
										<li class="tab">
											<a href="{{url('superadmin')}}#third">
												<i class="material-icons">view_list</i>
												<span>{{trans('message.invoices')}}</span>
											</a>
										</li>
										<li class="tab">
											<a href="{{url('superadmin')}}#four">
												<i class="material-icons">account_circle</i>
												<span>{{trans('message.templates')}}</span>
											</a>
										</li>
									@endif

									@if($userRoleName == "Agency Admin")
										@canany(['studio-list', 'user-contract-list'])
											<li class="tab bold mainTab">
												<a href="{{url('agencyadmin')}}#first">
													<i class="material-icons">photo_filter</i>
													<span>{{trans('message.studios')}}</span>
												</a>
											</li>
										@endcanany

										@canany(['user-contract-list','service-request-list'])
											<li class="tab">
												<a href="{{url('agencyadmin')}}#second">
													<i class="material-icons">account_box</i>
													<span>{{trans('message.contracts')}}</span>
												</a>
											</li>
										@endcanany

										@canany(['activity-report-list'])
											<li class="tab">
												<a href="{{url('agencyadmin')}}#third">
													<i class="material-icons">view_list</i>
													<span>{{trans('message.invoices')}}</span>
												</a>
											</li>
										@endcanany

										@canany(['contract-template-list', 'email-template-list'])
											<li class="tab">
												<a href="{{url('agencyadmin')}}#four">
													<i class="material-icons">account_circle</i>
													<span>{{trans('message.templates')}}</span>
												</a>
											</li>
										@endcanany
									@endif

									@if($userRoleName == "Training Admin")
										@canany(['user-contract-list','service-request-list'])
											<li>
												<a href="{{url('studioadmin')}}#first">
													<i class="material-icons">line_style</i>
													<span>{{trans('message.contracts')}}</span>
												</a>
											</li>
										@endcanany

										@canany(['activity-report-list'])
											<li class="tab">
												<a href="{{url('studioadmin')}}#second">
													<i class="material-icons">view_list</i>
													<span>{{trans('message.invoices')}}</span>
												</a>
											</li>
										@endcanany

										@canany(['contract-template-list', 'email-template-list'])
											<li class="tab">
												<a href="{{url('studioadmin')}}#third">
													<i class="material-icons">account_circle</i>
													<span>{{trans('message.templates')}}</span>
												</a>
											</li>
										@endcanany

									@endif

									@if($userRoleName == "Spaces Admin")
										<li class="tab">
											<a href="{{url('spacesadmin')}}#first">
												<i class="material-icons">account_circle</i>
												<span>{{trans('message.services')}} {{trans('message.orders')}}</span>
											</a>
											<a href="{{url('spacesadmin')}}#second">
												<i class="material-icons">view_list</i>
												<span>{{trans('message.invoices')}}</span>
											</a>
										</li>
									@endif
									<li class="indicator" style="left: 0px; right: 0px;">
										</li>
								</ul>
							</aside>
						</div>
					</div>
					<div class="col right-content-block">
						@include("activity_report.form")
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
@endsection

@push('js')
<script src="{{ asset('app-assets/vendors/form_repeater/jquery.repeater.min.js')}}"></script>
<script src="{{ asset('js/superadmin/activity.js')}}"></script>
<script src="{{ asset('js/superadmin/super_admin.js')}}"></script>
@endpush
