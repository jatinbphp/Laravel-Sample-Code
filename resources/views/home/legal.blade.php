@extends($layoutTheme)

@push('css')
	<link rel="stylesheet" type="text/css" href="{{asset('app-assets/tagsInput/jquery.tagsinput.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('app-assets/multiple-file/image-uploader.css')}}">
	<style type="text/css">
		td.details-control {
			background: url('../img/details_open.png') no-repeat center center;
			cursor: pointer;
		}
		tr.shown td.details-control {
			background: url('../img/details_close.png') no-repeat center center;
		}
	</style>
@endpush

@section('filter')
	@include("layouts.common.filter",['closeCls' => 'closeAgencyFilter','type' => 'agency','cls' => 'agencyTab'])
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
								<ul class="legalTab sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out2" data-menu="menu-navigation" data-collapsible="menu-accordion">

									<li class="tab">
										<a href="#first" class="collapsible-header agencyTab filterBar active" data-filter='agency' data-close="closeAgencyFilter" data-cls="agencyTab">
											<i class="material-icons">collections_bookmark</i>
											<span>{{trans('message.partners')}}</span>
										</a>
									</li>


									<li class="indicator" style="left: 0px; right: 0px;">
									</li>
								</ul>
							</aside>
						</div>
					</div>
					<div class="col right-content-block">
						<div id="first">
							@include('home.list',['op' => 'first'])
							<div id="agency-tab">
								<div class="content">
									@include('agency.index')
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
<script src="{{ asset('app-assets/tagsInput/jquery.tagsinput.js')}}"></script>
<script src="{{ asset('app-assets/multiple-file/image-uploader.js')}}"></script>
<script src="{{ asset('app-assets/vendors/form_repeater/jquery.repeater.min.js')}}"></script>
@endpush
