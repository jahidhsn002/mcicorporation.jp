@extends('layouts.backend')

@section('content')

    <h3 class="title is-4 mb-0 mt-30">Dashboard</h3>
    <div class="columns is-marginless is-centered">
        <div class="column is-3 is-offset-3">
        	<h3 class="title is-5">Inquiries</h3>
        	<hr/>
        	<div class="">
                <a class="box px-20 py-5 mb-0" href="{{route('wishlist')}}">Wish List</a>
                <a class="box px-20 py-5 mb-0" href="{{route('favorite')}}">Favorite</a>
            </div>
        </div>

        <div class="column is-3">
        	<h3 class="title is-5">Account Info</h3>
        	<hr/>
        	<div class="">
                <a class="box px-20 py-5 mb-0" href="{{route('account')}}">Account Information</a>
                <a class="box px-20 py-5 mb-0" href="{{route('language')}}">Language Preferences</a>
                <a class="box px-20 py-5 mb-0" href="{{route('password')}}">Update your Password</a>
            </div>
        </div>
        <div class="column is-3"></div>
        
    </div>
    <div class="columns is-multiline mx-100">
        <div class="column is-12">
            <h4 class="title is-4 mb-5">New Arrival</h4>
            <div class="a-line">
                <div></div>
            </div>
        </div>

        @foreach($vehicles as $vehicle)
        <div class="column is-2">
            <a href="{{ route('single', ['id'=> $vehicle->id]) }}">
                @if($vehicle->thumbnail)
                    @foreach(json_decode($vehicle->thumbnail) as $link)
                    <figure>
                        <img src="{{asset($link)}}" width="100%">
                    </figure>
                    @endforeach
                @else
                    <img src="{{ asset('img/car.jpg') }}" width="100%">
                @endif
                <h3 class="title is-5 ma-0">{{ $vehicle->name }}</h3>
                <div>Vehicle Price:</div>
                <h3 class="title is-6 ma-0">{{ $vehicle->price }}</h3>
            </a>
        </div>
        @endforeach
    </div>

@endsection
