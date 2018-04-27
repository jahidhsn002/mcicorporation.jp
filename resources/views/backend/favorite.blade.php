@extends('layouts.backend')

@section('content')
<div class="pa-50">	
	<h3 class="title is-4 mb-5">Favorites</h3>
	<div>
		List of your favorite vehicles. You will be notified by email when vehicles' status changes to "Marked Down Prices".
		<hr class="mt-5 mb-30" />
	</div>
	<div class="mt-15">
		@foreach($vehicles as $vehicle)
				<a href="{{ route('favorite_save', ['vehicle_id' => $vehicle->id]) }}" class="delete is-pulled-right"></a>
    	<div class="columns">
    		<div class="column is-2">
    			@if($vehicle->thumbnail)
                    @foreach(json_decode($vehicle->thumbnail) as $link)
                    <figure>
                        <img src="{{asset($link)}}">
                    </figure>
                    @endforeach
                @else
                    <img src="{{asset('img/car_1.jpg')}}">
                @endif
			</div>
			<div class="column is-10">
				<div class="columns mb-5">
		    		<div class="column is-6 py-2">
		    			<h2 class="title is-4 mb-0"> {{ $vehicle->name }} </h2>
					</div>
					<div class="column is-6 py-2 has-text-right">
						<h3 class="title is-5 mb-0"> Vehicle Price: {{ $vehicle->price }} <br/>
							<small>You Save: $378 (15%)</small>
						</h3>
					</div>
				</div>
    			<div class="columns">
		    		<div class="column is-4 py-5">
		    			<table class="table is-bordered mb-0" width="100%">
		    				<tr>
		    					<td>Ref No.</td>
		    					<td> {{ $vehicle->ref_no }} </td>
		    				</tr>
		    				<tr>
		    					<td>Price</td>
		    					<td> {{ $vehicle->price }} </td>
		    				</tr>
		    				<tr>
		    					<td>Model Code</td>
		    					<td> {{ $vehicle->model_code }} </td>
		    				</tr>
		    				<tr>
		    					<td>Manufacturine</td>
		    					<td> {{ $vehicle->manufacture }} </td>
		    				</tr>
		    			</table>
					</div>
					<div class="column is-4 py-5">
						<table class="table is-bordered mb-0" width="100%">
		    				<tr>
		    					<td>Engine</td>
		    					<td> {{ $vehicle->engine }} </td>
		    				</tr>
		    				<tr>
		    					<td>Mileage</td>
		    					<td> {{ $vehicle->mileage }} </td>
		    				</tr>
		    				<tr>
		    					<td>Seats</td>
		    					<td> {{ $vehicle->seats }} </td>
		    				</tr>
		    				<tr>
		    					<td>Dimension</td>
		    					<td> {{ $vehicle->dimension }} </td>
		    				</tr>
		    			</table>
					</div>
					<div class="column is-4 has-text-right">
						<button class="button is-large is-warning has-text-uppercase px-50 mb-10"> Inquary </button>
					</div>
				</div>
			</div>
	    </div>
		<hr class="mt-0 mb-30" />
	    @endforeach
    </div>

    <div class="has-text-centered">
    	<a href="#">Back to Dashboard</a>
    </div>
</div>
@endsection