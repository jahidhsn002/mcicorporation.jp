
<div class="sidebar">
	
	<!-- Add Widzert -->
	<div class="widzert">
		<a href="#">
			<img src="img/add_left.png" width="100%">
		</a>
	</div>

	<!-- Add Widzert -->
	<div class="widzert">
		<a href="#">
			<img src="img/add_left.png" width="100%">
		</a>
	</div>

	<!-- Make Body Type -->
	<div class="widzert">
		<h5 class="title is-5 py-5">Latest Collection</h5>
		<ul>
			@foreach($sidebar->new_cars as $data)
			<li>
				<a href="{{ route('archive', ['taxonomy[]' => $data->id]) }}">
					@if($data->thumbnail)
                        @foreach(json_decode($data->thumbnail) as $link)
                        <img src="{{asset($link)}}">
                        @endforeach
                    @else
                        <img src="{{asset('img/body_type_logo.jpg')}}">
                    @endif
					{{$data->name}}
				</a>
			</li>
			@endforeach
		</ul>
	</div>

</div>