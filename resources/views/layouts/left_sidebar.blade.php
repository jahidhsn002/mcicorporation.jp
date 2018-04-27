
<div class="sidebar">

	<!-- Make Widzert -->
	<div class="widzert">
		<h5 class="title is-5 py-5">Shop By Make</h5>
		<ul>
			@foreach($sidebar->make as $data)
			<li>
				<a href="{{ route('archive', ['taxonomy[]' => $data->id]) }}">
					@if($data->logo)
                        @foreach(json_decode($data->logo) as $link)
                        <img src="{{asset($link)}}">
                        @endforeach
                    @else
                        <img src="{{asset('img/make_logo.jpg')}}">
                    @endif
					{{$data->name}}
				</a>
			</li>
			@endforeach
		</ul>
	</div>

	<!-- Make Body Type -->
	<div class="widzert">
		<h5 class="title is-5 py-5">Shop By Type</h5>
		<ul>
			@foreach($sidebar->{'body-type'} as $data)
			<li>
				<a href="{{ route('archive', ['taxonomy[]' => $data->id]) }}">
					@if($data->logo)
                        @foreach(json_decode($data->logo) as $link)
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

	<!-- Make Drivetrain -->
	<div class="widzert">
		<h5 class="title is-5 py-5">Other Categories</h5>
		<ul>
			@foreach($sidebar->drivetrain as $data)
			<li>
				<a href="{{ route('archive', ['taxonomy[]' => $data->id]) }}">
					<img src="img/drivetrain_logo.jpg">
					{{$data->name}}
				</a>
			</li>
			@endforeach
		</ul>
	</div>
</div>