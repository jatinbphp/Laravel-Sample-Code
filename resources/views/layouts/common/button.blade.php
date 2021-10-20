<div class="btn-block">
	<div class="">
		@hasanyrole("Super Admin|Agency Admin|Training Admin|Studio Manager")
			<a class="mb-6  btn k-button-fill k-btn-normal lightrn-1 btn-sky tooltipped" data-tooltip="{{trans('message.see_interviews')}}" id="show_interviu" data-position="bottam">
				{{trans('message.see_interviews')}}
			</a>
			<a class="mb-6  btn k-button-fill k-btn-normal lightrn-1 btn-green tooltipped"  data-tooltip="{{trans('message.new_interview')}}" id="add_interviu" data-position="bottam">
				{{trans('message.new_interview')}}
			</a>
		@endrole

		<a class="mb-6  btn k-button-fill k-btn-normal lightrn-1 btn-red tooltipped" data-tooltip="{{trans('message.finish_the_turn')}}" id="confirm_final" data-position="bottam">
			{{trans('message.finish_the_turn')}}
		</a>

		<a href="{{url('user/profile#workingtour-list')}}" class="mb-6  btn k-button-fill k-btn-normal lightrn-1 btn-red tooltipped" data-tooltip="{{trans('message.working_tour')}}"  data-position="bottam">
			{{trans('message.working_tour')}}
		</a>
	</div>
</div>
