@extends('layouts.app')

@section('content')
    <div class="container archive">
        <div class="columns is- is-marginless is-centered">
            <div class="column is-2">
                @include('layouts.left_sidebar')
            </div>
            <div class="column is-10">
                <div class="columns is-multiline">
                    
                    <form action="{{ route('archive') }}" method="GET">
                    
                        @include('layouts.archive_search')

                    </form>

                        @include('layouts.archive_calculate')

                    <div class="column is-12 data_table">
                        <table class="table is-stripd" width="100%">
                            <tr>
                                <th>Image</th>
                                <th>Ref No.</th>
                                <th>Make/Model</th>
                                <th>Year</th>
                                <th>Engine</th>
                                <th>Milage</th>
                                <th>Steering Trans</th>
                                <th>Vehicle Price</th>
                                <th>Total Price</th>
                            </tr>
                            @foreach($vehicles as $vehicle)
                            <tr>
                                <td>
                                    <a href="{{ route('single', ['id'=> $vehicle->id]) }}">
                                        @if($vehicle->thumbnail)
                                            @foreach(json_decode($vehicle->thumbnail) as $link)
                                            <img src="{{asset($link)}}" style="height: 100px">
                                            @endforeach
                                        @else
                                            <img src="{{ asset('img/car.jpg') }}" style="height: 100px">
                                        @endif
                                    </a>
                                </td>
                                <td class="has-text-centered">
                                    <a href="{{ route('single', ['id'=> $vehicle->id]) }}">
                                        {{ $vehicle->ref_no}}
                                    </a> <br/>
                                    <a class="button mt-5" href="{{ route('favorite_save', ['vehicle_id' => $vehicle->id]) }}">
                                        <i class="fa fa-heart"></i> &nbsp; Favorites
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('single', ['id'=> $vehicle->id]) }}">
                                        {{ $vehicle->name}} <br/>
                                        @if(isset($vehicle->model_code)) ( <span class="mt-5">{{ $vehicle->model_code}}</span> ) @endif
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('single', ['id'=> $vehicle->id]) }}">
                                        {{ $vehicle->manufacture}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('single', ['id'=> $vehicle->id]) }}">
                                        {{ $vehicle->engine}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('single', ['id'=> $vehicle->id]) }}">
                                        {{ $vehicle->mileage}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('single', ['id'=> $vehicle->id]) }}">
                                        {{ $vehicle->ref_no}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('single', ['id'=> $vehicle->id]) }}">
                                        {{ $vehicle->price}}
                                    </a>
                                </td>
                                <td class="has-text-centered">
                                    <a href="{{ route('single', ['id'=> $vehicle->id]) }}">
                                        @if(count($ports)>0&&$port)
                                            {{ $vehicle->price+$port->insurance+$port->inspection+$port->certificate+$port->warranty }}
                                        @endif
                                    </a> <br/>
                                    <a class="button mt-5 is-success" href="{{ route('single', ['id'=> $vehicle->id]) }}@if($port&&$country)?country_id={{$country->id}}&port_id={{$port->id}}@endif#step">
                                        <i class="fa fa-envelope"></i> &nbsp; Inquiry
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
