@extends('layouts.backend')

@section('content')

    <form action="{{route('password_save')}}" method="POST" class="pa-20">
    	
    	{{ csrf_field() }} <input type="hidden" name="_method" value="PUT">
	
	<h3 class="title is-4 mb-5">Wishlists</h3>
	<div>
		List of your favorite vehicles. You will be notified by email when vehicles' status changes to "Marked Down Prices".
	</div>
	<hr class="my-5" />
	<div class="mt-15">
		@foreach($wishlists as $wishlist)
    	<div class="py-5">
    		<a href="{{ route('wishlist_delete', ['id'=> $wishlist->id]) }}" class="delete is-pulled-right"></a>
    		@foreach($wishlist->taxonomies as $taxonomy)
    			<a href="{{
    				route('archive', [
    					'taxonomy' => $wishlist->taxonomy
    				])

    			}}">{{ $taxonomy->name }}</a> / 
    		@endforeach
    		@if($wishlist->taxonomies == '[]')
    			No Taxonomy
    		@endif
	    </div>
		<hr class="my-2" />
	    @endforeach
    </div>

    <div class="has-text-centered">
    	<a href="#">Back to Dashboard</a>
    </div>

    </form>
@endsection