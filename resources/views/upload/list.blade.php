@foreach($files as $file)
	<li>
		<a class="file" data-value="$file->id" onclick="this.remove();">
			<img src="{{$file->name}}" alt="" width="100" height="100">{{basename($file->name)}}
		</a>
	</li>
@endforeach
