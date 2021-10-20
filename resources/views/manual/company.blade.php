<div class="card-panel border-radius-6 card-with-header p-0 mt-0">
	<div class="card-header">
		<h4 class="k-h4">{{trans('message.company_manuals')}}  </h4>
	</div>
	<div class="row">
		<!-- <div class="content-wrapper-before gradient-45deg-indigo-purple"></div> -->
		<div class="col s12">
			<div class="container">
				<!-- knowledge -->
				<div class="knowledge-content">
					<div class="col s12">
					</div>
					@if ($hasPermision)
					@include('manual.admin_block')
					@endif
				</div>
				<div class="row">
					<div class="col s12">
						<div class="section mt-1 mb-2" id="knowledge-licensing-detail">
							<div class="knowledge-content">
								<div class="col s12 m4 l4 sidebar-title">
									<div class="knowledge-block card card-border m-0 h-100">
										<div class="card-header mb-3">
											
												<h4 class="k-h4 mb-0 pt-0 pb-3">{{trans('message.sections')}}</h4>
											
										</div>
										<div class="input-field col s12 k-dropdown k-not-label custome-height-k-dropdown">
											<select name="manual_select" id="changeManual" class="{{--browser-default--}}">
												<option value="" disabled selected>{{trans('message.select_the_manual')}}...</option>
												@foreach($manuals as $manual)
												<option value="{{route('manual.read_manual',['id'=>$manual->id])}}">{{$manual->title}}</option>
												@endforeach
											</select>
										</div>
										<div class="knowledge-block-main-container col s12">
											<p class="k-h3 k-gray">{{trans('message.select_a_manual_above')}}</p>
										</div>
									</div>
								</div>
								<div class="col s12 m8 l8 licenses">
									<div class="card m-0 h-100 card-border">
										<div class="card-content">
											<small><p class="red-text mb-3">{{trans('message.chapter_the_list')}}</p></small>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="content-overlay"></div>
					</div>
				</div>
			</div>
			<div class="content-overlay"></div>
		</div>
	</div>
</div>
