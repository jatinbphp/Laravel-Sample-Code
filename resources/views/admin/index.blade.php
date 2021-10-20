@extends('layouts.app')

@section('content')
@include('interview.show-in-modal')

<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="col s12">
            <div class="container">
            	<div class="card-panel border-radius-6 card-inner-continer mt-0">
					@include("layouts.common.welcome")

					@include("layouts.common.button")

					@include("layouts.common.tab")
	            </div>
            </div>
        </div>
    </div>
</div>

<div id="modal-show_interviu_reports" class="modalx bottom-sheet modal-custom hidden ">
	<div class="modal-header">
		<h4>{{trans('message.interview_reports')}}</h4>
		<div class="buttons-group">
			<a href="#" class="close-modal">
				<img src="{{asset('img/icon-close.png')}}" alt="">
			</a>
		</div>
	</div>
	<div class="modalx-content">
		<div id="modal-show_interviu_reports_html"></div>
	</div>
</div>
@endsection


@push('js')
<script src="{{ asset('clock/clock.js')}}"></script>
<script src="{{ asset('js/obeservation.js')}}"></script>
@endpush
