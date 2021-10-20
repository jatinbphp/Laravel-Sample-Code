@extends('layouts.app')
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
									<a href="#company"  class="active manualChange" data-type='company'>
										<i class="material-icons">chrome_reader_mode</i>
										<span>{{trans('message.company_manuals')}}  </span>
									</a>
								</li>
								<li class="tab">
									<a href="#my" class="manualChange" data-type='my'>
										<i class="material-icons">assistant</i>
										<span>{{trans('message.my_manuals')}}</span>
									</a>
								</li>
								<li class="indicator" style="left: 0px; right: 0px;"></li>
							</ul>
						</div>
					</div>
					<div class="col right-content-block  ">
						<div id="company" class="active">
							<div class="content manualTab">
								@include("manual.company")
							</div>
						</div>
						<div id="my" style="display: none;">
							<div class="content manualTab">
								@include("manual.my")
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
@endsection
@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/flag-icon/css/flag-icon.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/sweetalert/sweetalert.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/page-knowledge.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/jquery.nestable/nestable.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/page-knowledge.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/custom/manual.css')}}">
@endpush
@push('js')
<script src="{{asset('app-assets/vendors/jquery.nestable/jquery.nestable.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/extra-components-sweetalert.js')}}"></script>
<script src="{{asset('app-assets/js/custom/tree.min.js')}}"></script>
<script src="{{asset('app-assets/js/custom/manual.js')}}" type="text/javascript"></script>
<!-- <script src="{{asset('js/manual.js')}}" type="text/javascript"></script> -->
@endpush
