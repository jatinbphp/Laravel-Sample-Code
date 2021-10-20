@extends($layoutTheme)

@section('filter')
	@include("layouts.common.filter",['closeCls' => 'closeAgencyAdminFilter','type' => 'agency_admin','cls' => 'agencyAdminTab'])
@endsection

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
								<ul class="peopleTab sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out2" data-menu="menu-navigation" data-collapsible="menu-accordion">
									<li class="tab bold mainTab">
										<a href="#first" class="collapsible-header agencyAdminTab filterBar active" data-filter='agency_admin' data-close="closeAgencyAdminFilter" data-cls="agencyAdminTab">
											<i class="material-icons">collections_bookmark</i>
											<span>{{trans('message.admin')}}</span>
										</a>
									</li>
									<!-- <li class="tab">
										<a href="#second" class="peopleModelTab filterBar active" data-filter='peopel_model' data-close="closePeopleModelFilter" data-cls="peopleModelTab">
											<i class="material-icons">view_list</i>
											<span>{{trans('message.model')}}</span>
										</a>
									</li> -->
									<li class="indicator" style="left: 0px; right: 0px;">
									</li>
								</ul>
							</aside>
						</div>
					</div>
					<div class="col right-content-block">
						<div id="first">
							@include('people.list',['op' => 'first'])
							<div id="agency-admin-tab">
								<div class="content">
									@include("agency_admin.index",['myTitle' => 'All Agency Admin'])
								</div>
							</div>

							<div id="studio-admin-tab">
								<div class="content">
									@include("studio_admin.index",['myTitle' => 'All Studio Admin'])
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
<script src="{{ asset('js/superadmin/super_admin.js')}}"></script>
<script src="{{ asset('js/superadmin/agency_admin.js')}}"></script>
<script src="{{ asset('js/superadmin/studio_admin.js')}}"></script>
<script src="{{ asset('js/superadmin/user_contract.js')}}"></script>
@endpush
