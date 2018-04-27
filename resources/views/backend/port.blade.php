@extends('layouts.backend')

@section('content')

	<h3 class="title is-4 mb-15">{{$country->name}} Ports</h3>
	
	<div class="box mb-20">
		
		<table class="table" width="100%">
			<tr class="columns">
				<th class="column is-2">Name</th>
				<th class="column is-2">Insurance</th>
				<th class="column is-2">Inspection</th>
				<th class="column is-2">Certificate</th>
				<th class="column is-2">Warranty</th>
				<th class="column is-2 has-text-right">Options</th>
			</tr>
		</table>

		<form action="{{route('country_port_save')}}" method="POST">
    		<input type="hidden" name="_method" value="PUT">
    		<input type="hidden" name="country_id" value="{{ $country->id }}">
    		{{ csrf_field() }}
			<table class="table" width="100%">
	    		<tr class="columns">
					<td class="column is-2">
						<input type="text" class="input" name="name">
					</td>
					<td class="column is-2">
						<input type="number" step="any" class="input" name="insurance">
					</td>
					<td class="column is-2">
						<input type="number" step="any" class="input" name="inspection">
					</td>
					<td class="column is-2">
						<input type="number" step="any" class="input" name="certificate">
					</td>
					<td class="column is-2">
						<input type="number" step="any" class="input" name="warranty">
					</td>
					<td class="column is-2 has-text-right">
						<button type="submit" class="button is-success">Add New</button>
					</td>
				</tr>
	    		
			</table>
		</form>

		@foreach($ports as $port)
		<form action="{{route('country_port_save')}}" method="POST">
    		<input type="hidden" name="_method" value="PUT">
    		<input type="hidden" name="country_id" value="{{ $country->id }}">
    		<input type="hidden" name="id" value="{{ $port->id }}">
    		{{ csrf_field() }}
			<table class="table" width="100%">
	    		<tr class="columns">
					<td class="column is-2">
						<input type="text" class="input" name="name" value="{{ $port->name }}">
					</td>
					<td class="column is-2">
						<input type="number" step="any" class="input" name="insurance" value="{{ $port->insurance }}">
					</td>
					<td class="column is-2">
						<input type="number" step="any" class="input" name="inspection" value="{{ $port->inspection }}">
					</td>
					<td class="column is-2">
						<input type="number" step="any" class="input" name="certificate" value="{{ $port->certificate }}">
					</td>
					<td class="column is-2">
						<input type="number" step="any" class="input" name="warranty" value="{{ $port->warranty }}">
					</td>
					<td class="column is-2 has-text-right">
						<button type="submit" class="button is-dark">Save</button>
						<a href="{{ route('country_port_delete', ['id'=> $port->id]) }}" class="button is-dark">Delete</a>
					</td>
				</tr>
	    		
			</table>
		</form>
		@endforeach
	</div>

    <div class="has-text-centered">
    	<a href="#">Back to Dashboard</a>
    </div>

@endsection