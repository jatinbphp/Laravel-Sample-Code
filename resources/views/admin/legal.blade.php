@extends('layouts.app')

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-todo.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/custom/jquery.mCustomScrollbar.min.css')}}">
@endpush

@section('filter')
@include("layouts.common.filter",['closeCls' => 'closeStudiAdminContractFilter','type' => 'studio_contract','cls' => 'agencyTab'])
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
									<a href="#admin-contract-tab" class="studioTab filterBar" data-filter='studio_contract' data-close="closeStudiAdminContractFilter" data-cls="studioTab">
										<i class="material-icons">business</i>
										<span>{{trans('message.contract')}}</span>
									</a>
								</li>

								<li class="tab">
									<a href="#contract-category-admin-tab" class="superAdminCategoryTab filterBar" data-filter='super_admin_category' data-close="closeStudioAdminFilter" data-cls="superAdminCategoryTab">
										<i class="material-icons">account_circle</i>
										<span>{{trans('message.contract')}} {{trans('message.category')}}</span>
									</a>
								</li>

								<li class="indicator" style="left: 0px; right: 0px;">
								</li>
							</ul>
						</div>
					</div>
					<div class="col right-content-block">
						<div id="admin-contract-tab">
							<div class="content">
								@include('admin.contract.index')
							</div>
						</div>
						<div id="contract-category-admin-tab">
							<div class="content">
								@include('admin.category.index')
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
@endpush
