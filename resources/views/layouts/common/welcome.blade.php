<div class="row vertical-modern-dashboard admin-board-top-section">
	@if(isset($isTrainer) && $isTrainer == "Yes")

	<script>
	$(document).ready(function() {
	// Donut chart
	// -----------
	@php
	if ($necesary == 0) {
	$necesary = 1;
	}
	$procent = ($sum / $necesary) * 100;
	$necesar = $necesary - $sum;
	if ($necesar < 0) {
	$necesar = 0;
	}
	$donutwidth = (int) $procent / 10;
	if ($donutwidth > 10) {
	$donutwidth = 10;
	}
	if ($donutwidth < 1) {
	$donutwidth = 1;
	}
	@endphp
	var CurrentBalanceDonutChart = new Chartist.Pie(
	"#current-balance-donut-chart", {
	labels: [1, 2],
	series: [
			{ meta: "Incasat", value: {{$sum}} },
			{ meta: "Necesar", value: {{$necesar}} }
		]
	},
	{
		donut: true,
		donutWidth: {{$donutwidth}},
			showLabel: false,
			plugins: [
				Chartist.plugins.tooltip({
				class: "current-balance-tooltip",
				appendToBody: true
				}),
				Chartist.plugins.fillDonut({
					items: [{
						content:'<div style="text-align:center"><h6 class="mt-0 mb-0 text-center" style="color:#afafaf">{{$sum}}$</h5><p class="small">din</p><h6 class="mt-0 mb-0 text-center" style="color:#3bb263">{{$necesary}}$</h5></div>'
					}]
				})
			]
	}
	)
	})
</script>

		<div class="col s12  m4 l4 mt-1 mb-1">
			<!-- Current Balance -->
			<div class="card border-radius-6 animate fadeLeft gradient-45deg-indigo-purple m-0 h-100">
				<div class="card-content alb">
					<h6 class="">{{trans('message.welcome')}} {{trans('message.back')}}</h6>
					<div class="profil-home">
						<img src='{{$user->avatar}}' alt="{{$user->name}}" />
					</div>
					<div class="profil-nume">{{$user->name}}</div>
					<div class="profil-ce-este">{{$userRoleName}} Kendra Studio</div>
				</div>
			</div>
		</div>
		<div class="col s12  m4 l4 mt-1 mb-1">
			<!-- Current Balance -->
			<div class="card border-radius-6 animate fadeLeft m-0 h-100 card-with-header">
				<div class="card-content p-0">
					<div class="card-header">
						<h4 class="mb-0 mt-0 display-flex justify-content-between">{{trans('message.workhours')}}  </h4></div>
					<div class="inwrapper">
						<div id="accontainer_a2"  style="display:inline-block" ></div>
						<div class="row">
							<div class="col s6">
								<div class="timer">
									{{$countHour}}
								</div>
							</div>
							<div class="col s6">
								<div>
									_ _:_ _
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col s12  m4 l4 mt-1 mb-1">
			<!-- Current Balance -->
			<div class="card border-radius-6 animate fadeLeft m-0 h-100 card-with-header">
				<div class="card-content p-0">
					<div class="card-header">
						<h4 class="mb-0 mt-0 display-flex justify-content-between">{{trans('message.target_daily')}} </h4></div>
					<div class="current-balance-container">
						<div id="current-balance-donut-chart" class="current-balance-shadow"></div>
					</div>
					<h5 class="center-align">{{round($procent,2)}} %</h5>
				</div>
			</div>
		</div>
	@else
		<div class="col s12 m6 l6 mt-1 mb-1">
			<!-- Current Balance -->
			<div class="card border-radius-6 animate fadeLeft gradient-45deg-indigo-purple m-0 h-100">
				<div class="card-content alb">
					<h6 class="">{{trans('message.welcome')}} {{trans('message.back')}}</h6>
					<div class="profil-home">
						<img src='{{$user->avatar}}' alt="{{$user->name}}" />
					</div>
					<div class="profil-nume">{{$user->name}}</div>
					<div class="profil-ce-este">{{$userRoleName}} Kendra Studio</div>
				</div>
			</div>
		</div>
		<div class="col s12 m6 l6 mt-1 mb-1">
			<!-- Current Balance -->
			<div class="card border-radius-6 animate fadeLeft m-0 h-100 card-with-header">
				<div class="card-content p-0">
					<div class="card-header">
						<h4 class="mb-0 mt-0 display-flex justify-content-between">{{trans('message.workhours')}}</h4>
					</div>
					<div class="inwrapper">
						<div id="accontainer_a2"  style="display:inline-block" ></div>
						<div class="row">
							<div class="col s6">
								<div class="timer">
									@if(isset($countHour))
										{{$countHour}}
									@endif
								</div>
							</div>
							<div class="col s6">
								<div>
									_ _:_ _
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endif
</div>
