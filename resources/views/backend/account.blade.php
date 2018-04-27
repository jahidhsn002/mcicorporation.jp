@extends('layouts.backend')

@section('content')

    <form action="{{route('account_save')}}" method="POST" class="pa-100">
    	{{ csrf_field() }}
    	<input type="hidden" name="_method" value="PUT">
	<h3 class="title is-4 mb-15">Account Information</h3>
	<div class="box mb-20">
    	<div class="columns">
    		<div class="column is-6 is-offset-3">

				<div class="has-text-centered my-10">Fields with a * are required</div>

				<div class="field is-horizontal">
					<div class="field-label is-normal">
					    <label class="label">Email</label>
					</div>
					<div class="field-body">
					    <div class="field">
						    <p class="control is-expanded">
						        <input class="input" type="email" name="email" 
				                    @if($user) value="{{$user->email}}" @endif
				                    disabled 
				                >
						    </p>
					    </div>
					</div>
				</div>

				<div class="field is-horizontal">
					<div class="field-label is-normal">
					    <label class="label">Name</label>
					</div>
					<div class="field-body">
					    <div class="field">
						    <p class="control is-expanded">
						        <input class="input" type="text" name="name" 
				                    @if($user) value="{{$user->name}}" @endif
				                >
						    </p>
					    </div>
					</div>
				</div>

				<div class="field is-horizontal">
					<div class="field-label is-normal">
					    <label class="label">Phone</label>
					</div>
					<div class="field-body">
					    <div class="field">
						    <p class="control is-expanded">
						        <input class="input" type="text" name="phone" 
				                    @if($user) value="{{$user->phone}}" @endif
				                >
						    </p>
					    </div>
					</div>
				</div>

				<div class="field is-horizontal">
					<div class="field-label is-normal">
					    <label class="label">City</label>
					</div>
					<div class="field-body">
					    <div class="field">
						    <p class="control is-expanded">
						        <input class="input" type="text" name="city" 
				                    @if($user) value="{{$user->city}}" @endif
				                >
						    </p>
					    </div>
					</div>
				</div>

				<div class="field is-horizontal">
					<div class="field-label is-normal">
					    <label class="label">Country</label>
					</div>
					<div class="field-body">
					    <div class="field">
						    <p class="control is-expanded">
						        <input class="input" type="text" name="country" 
				                    @if($user) value="{{$user->country}}" @endif
				                >
						    </p>
					    </div>
					</div>
				</div>

				<div class="field is-horizontal">
					<div class="field-label is-normal">
					    <label class="label">Address</label>
					</div>
					<div class="field-body">
					    <div class="field">
						    <p class="control is-expanded">
						    	<textarea class="textarea" name="address"> @if($user) {{$user->address}} @endif </textarea>
						    </p>
					    </div>
					</div>
				</div>

				<div class="has-text-centered">
					<button class="button is-success is-large px-50"> Save Profile </button>
				</div>


			</div>
	    </div>
    </div>

    <div class="has-text-centered">
    	<a href="#">Back to Dashboard</a>
    </div>

    </form>
@endsection