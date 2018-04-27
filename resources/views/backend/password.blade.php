@extends('layouts.backend')

@section('content')

    <form action="{{route('password_save')}}" method="POST" class="pa-100">
    	
    	{{ csrf_field() }} <input type="hidden" name="_method" value="PUT">
	
	<h3 class="title is-4 mb-15">Reset Password</h3>
	
	<div class="box mb-20">
    	<div class="columns">
    		<div class="column is-6 is-offset-3">

				<div class="has-text-centered my-10">Fields with a * are required</div>

				<div class="field is-horizontal">
					<div class="field-label is-normal">
					    <label class="label">Previous Password</label>
					</div>
					<div class="field-body">
					    <div class="field">
						    <p class="control is-expanded">
						        <input class="input" type="password" name="prev_pass" >
						    </p>
					    </div>
					</div>
				</div>

				<hr/>

				<div class="field is-horizontal">
					<div class="field-label is-normal">
					    <label class="label">New Password</label>
					</div>
					<div class="field-body">
					    <div class="field">
						    <p class="control is-expanded">
						        <input class="input" type="text" name="pass">
						    </p>
					    </div>
					</div>
				</div>

				<div class="field is-horizontal">
					<div class="field-label is-normal">
					    <label class="label">Confirm Password</label>
					</div>
					<div class="field-body">
					    <div class="field">
						    <p class="control is-expanded">
						        <input class="input" type="text" name="re_password">
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