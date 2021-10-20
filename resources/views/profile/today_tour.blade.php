<div class="row">
	<div class="col s12" >
		<div class="card card card-default scrollspy" id="prefixes">
			<div class="card-content">
				<h4 class="k-h4">
				<i class="material-icons prefix">
				alarm_add
				</i>{{trans('message.day_in_time')}}
				</h4>
				<hr>
				<button class="bookign  btn k-button-fill k-btn-normal" id="day_in" name="submit" type="Button">{{trans('message.submit')}}</button> <span id="day_in_time">{{ isset($daytime['working_start_time']) ?  $daytime['working_start_time'] : '' }}</span><br>
				<span id="day_in_message"></span>
			</div>
		</div>
	</div>
	<div class="col s12  ">
		<div class="card card card-default scrollspy" id="prefixes">
			<div class="card-content">
				<h4 class="k-h4">
				<i class="material-icons prefix">
				access_time
				</i>{{trans('message.break_time')}}
				</h4>
				<hr>
				<div id="break_time_div" @if(!isset($daytime['working_start_time'])) style='display:none' @endif>
					<div class="section groups-container" >
						<form id="form-addmorebreak" name="form-addmorebreak">
							<div class="input-field col s2 p-cus w-auto-width right">
								<div class="add-row-button">
									<a href="#" class="breakAddRow">+</a>
								</div>
							</div>
							<div class="row">
								<div class="col s12">
									<div class="rulesData addmore-break">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col s12  ">
		<div class="card card card-default scrollspy" id="prefixes">
			<div class="card-content">
				<h4 class="k-h4">
				<i class="material-icons prefix">
				alarm_off
				</i>{{trans('message.day_out_time')}}
				</h4>
				<hr>
				<div id="day_out_div" @if(!isset($daytime['working_start_time'])) style='display:none' @endif>
					{{trans('message.day_out_time')}} <br>
					<button class="bookign  btn k-button-fill k-btn-normal" id="day_out" name="submit" type="Button">{{trans('message.submit')}}</button>  <span id="day_out_time">{{ isset($daytime['working_end_time']) ?  $daytime['working_end_time'] : '' }}</span><br>
					<span id="day_out_message"></span>
				</div>
			</div>
		</div>
	</div>
</div>
<script id="addmore-break" type="text/template">
@include('booking.addmore_list')
</script>
