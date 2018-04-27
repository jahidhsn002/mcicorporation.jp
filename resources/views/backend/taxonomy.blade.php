@extends('layouts.backend')

@section('content')

	<h3 class="title is-4 mb-15">All Taxonomies</h3>
	
	<div class="box mb-20">
		
		<table class="table" width="100%">
			<tr class="columns">
				<th class="column is-6">Name</th>
				<th class="column is-6 has-text-right">Options</th>
			</tr>
		</table>

		<form action="{{route('taxonomy_save')}}" method="POST">
    		<input type="hidden" name="_method" value="PUT">
    		{{ csrf_field() }}
			<table class="table" width="100%">
	    		<tr class="columns">
					<td class="column is-6">
						<input type="text" class="input" name="name">
					</td>
					<td class="column is-6 has-text-right">
						<button type="submit" class="button is-success">Add New</button>
					</td>
				</tr>
	    		
			</table>
		</form>

		@foreach($taxonomies as $taxonomy)
		<form action="{{route('taxonomy_save')}}" method="POST">
    		<input type="hidden" name="_method" value="PUT">
    		<input type="hidden" name="id" value="{{ $taxonomy->id }}">
    		{{ csrf_field() }}
			<table class="table" width="100%">
	    		<tr class="columns">
					<td class="column is-6">
						<input type="text" class="input" name="name" value="{{ $taxonomy->name }}">
					</td>
					<td class="column is-6 has-text-right">
						<a href="{{ route('taxonomy_taxonomy_meta', ['taxonomy_id' => $taxonomy->id]) }}" class="button is-dark">Ports Manager</a>
						<button type="submit" class="button is-dark">Save</button>
						<a href="{{ route('taxonomy_delete', ['id'=> $taxonomy->id]) }}" class="button is-dark">Delete</a>
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