@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/custom/jquery.mCustomScrollbar.min.css')}}">
@endpush
@extends('layouts.app')
@section('content')

<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="col s12">
            <div class="container">
            		<!--  Target Trainer si alte date -->
            	<div class="card-panel border-radius-6 card-inner-continer mt-1">
				<div class="row vertical-modern-dashboard admin-board-top-section">
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
				</div>

				<div class="btn-block">
					<div class="">

						<a href="{{url('user/profile#workingtour-list')}}" class="mb-6  btn k-button-fill k-btn-normal lightrn-1 btn-red tooltipped" data-tooltip="{{trans('message.working_tour')}}"  data-position="top">
							{{trans('message.working_tour')}}
						</a>
					</div>
				</div>

            </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('js')
<script src="{{ asset('clock/clock.js')}}"></script>
<script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script type="text/javascript">
	$("#content-6").mCustomScrollbar({
		axis:"x",
		theme:"light-3",
		advanced:{autoExpandHorizontalScroll:true}
	});
</script>
@endpush
