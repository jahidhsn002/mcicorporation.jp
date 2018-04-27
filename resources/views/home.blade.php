@extends('layouts.app')

@section('content')
    <div class="container mb-50">
        <div class="columns is- is-marginless is-centered">
            <div class="column is-2">
                @include('layouts.left_sidebar')
            </div>
            <div class="column is-8">
                <div class="columns is-multiline">

                    <form action="{{ route('archive') }}" method="GET">
                    
                        @include('layouts.home_search')

                    </form>

                    <section class="blog_post column is-12">
                        <div class="columns">
                            <div class="column is-3">
                                <a href="#">
                                    <img src="{{ asset('img/page_banner.jpg') }}" width="100%"> <br/>
                                    <span>These are global default options</span>
                                </a>
                            </div>
                            <div class="column is-3">
                                <a href="#">
                                    <img src="{{ asset('img/page_banner.jpg') }}" width="100%"> <br/>
                                    <span>These are global default options</span>
                                </a>
                            </div>
                            <div class="column is-3">
                                <a href="#">
                                    <img src="{{ asset('img/page_banner.jpg') }}" width="100%"> <br/>
                                    <span>These are global default options</span>
                                </a>
                            </div>
                            <div class="column is-3">
                                <a href="#">
                                    <img src="{{ asset('img/page_banner.jpg') }}" width="100%"> <br/>
                                    <span>These are global default options</span>
                                </a>
                            </div>
                        </div>
                    </section>

                    <div class="column is-12">
                        <h4 class="title is-4 mb-5">New Arrival</h2>
                        <div class="a-line">
                            <div></div>
                        </div>
                    </div>

                    @foreach($new_arrivals as $vehicle)
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

                    <div class="column is-12">
                        <h4 class="title is-4 mb-5">Best Deals</h2>
                        <div class="a-line">
                            <div></div>
                        </div>
                    </div>

                    @foreach($best_deals as $vehicle)
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

                    <div class="column is-12">
                        <h4 class="title is-4 mb-5">Premium Class</h2>
                        <div class="a-line">
                            <div></div>
                        </div>
                    </div>

                    @foreach($premium_class as $vehicle)
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

                    <div class="column is-12">
                        <h4 class="title is-4 mb-5">Best by types</h2>
                        <div class="a-line">
                            <div></div>
                        </div>
                    </div>

                    @foreach($sidebar->{'body-type'} as $type)
                    <div class="column is-4">
                        <div class="columns">
                            <div class="column is-4">
                                <a href="{{ route('archive', ['taxonomy[]' => $type->id]) }}">
                                    @if($type->logo)
                                        @foreach(json_decode($type->logo) as $link)
                                        <figure>
                                            <img src="{{asset($link)}}" width="100%">
                                        </figure>
                                        @endforeach
                                    @else
                                        <img src="{{ asset('img/body_type_logo.jpg') }}" width="100%">
                                    @endif
                                    <h3 class="title is-6 ma-0 has-text-centered">{{ $type->name }}</h3>
                                </a>
                            </div>
                            <div class="column is-8">
                                @if($type->vehicles)
                                    @foreach($type->vehicles as $vehicle)
                                    <a href="{{ route('single', ['id'=> $vehicle->id]) }}">
                                        <h3 class="title is-6 my-10"> - {{ $vehicle->name }}</h3>
                                    </a>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="column is-12">
                        <h4 class="title is-4 mb-5">Popular Used Cars</h2>
                        <div class="a-line">
                            <div></div>
                        </div>
                    </div>

                    @foreach($populars as $vehicle)
                    <div class="column is-4 py-5">
                        <a href="{{ route('single', ['id'=> $vehicle->id]) }}">
                            <h3 class="title is-6 ma-0"> <i class="fa fa-arrow-right"></i> {{ $vehicle->name }}</h3>
                        </a>
                    </div>
                    @endforeach

                </div>
            </div>
            <div class="column is-2">
                @include('layouts.right_sidebar')
            </div>
        </div>
    </div>
@endsection
