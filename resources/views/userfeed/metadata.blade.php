@if(!$metauser_list->isEmpty())
	@foreach($metauser_list  as $key => $rule)
		@include('userfeed.addmore',['metadata'=>$rule,'key' => ($key+1),'secretId'=>$userId])
	@endforeach
@else
	@include('userfeed.addmore',['key' => 1,'secretId'=>$userId])
@endif
