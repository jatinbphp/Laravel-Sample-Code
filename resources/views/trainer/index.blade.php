@extends('layouts.app')

@section('content')

<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="col s12">
            <div class="container">
            	<div class="card-panel border-radius-6 card-inner-continer mt-0">
					@include("layouts.common.welcome",['isTrainer' => "Yes"])

					@include("layouts.common.button")

					@include("trainer.model")

					@include("layouts.common.tab")
	            </div>
            </div>
        </div>
    </div>
</div>

@endsection


@push('js')

<script src="{{asset('app-assets/vendors/chartjs/chart.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/chartist-js/chartist.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/chartist-js/chartist-plugin-tooltip.js')}}"></script>
<script src="{{asset('app-assets/vendors/chartist-js/chartist-plugin-fill-donut.min.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/charts-chartjs.js')}}"></script>

<script src="{{ asset('clock/clock.js')}}"></script>
<script src="{{ asset('js/cost.js')}}"></script>
<script src="{{ asset('js/obeservation.js')}}"></script>

@endpush
