@extends('layouts.app')

@section('content')
    <div class="container archive mb-100">
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

                    <div class="column is-12">
                        <div class="columns mx-0 pageLink">
                            <div class="column is-4">
                                <div class="mb-5"> Pages: </div>
                                {{ $vehicles->links() }}
                            </div>
                            <div class="column is-8 has-text-right">
                                <b-dropdown hoverable position="is-bottom-left" class="filterby">
                                    <button class="button is-info" slot="trigger">
                                        Filter By
                                        <b-icon icon="menu-down"></b-icon>
                                    </button>
                                    <b-dropdown-item class="dropdown-item" href="{{ route('archive', ['order-by'=>'price', 'order-key'=>'desc']) }}">
                                        Price low to heigh
                                    </b-dropdown-item>
                                    <b-dropdown-item class="dropdown-item" href="{{ route('archive', ['order-by'=>'price', 'order-key'=>'asc']) }}">
                                        Price heigh to low
                                    </b-dropdown-item>
                                </b-dropdown>
                            </div>
                        </div>
                    </div>

                    <div class="column is-12 data_table">
                        <table class="table is-striped" width="100%">
                            <tr>
                                <th>Image</th>
                                <th>Ref No.</th>
                                <th>Make/Model</th>
                                <th>Year</th>
                                <th>Engine</th>
                                <th>Milage</th>
                                <th>Steering Trans</th>
                                <th>Price save</th>
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
                                        @foreach($vehicle->taxonomies as $taxonomy)
                                            @if($taxonomy->taxonomy->slug=='steering')
                                                {{ $taxonomy->name}}
                                            @endif
                                        @endforeach
                                    </a>
                                </td>
                                <td class="has-text-centered">
                                    <a href="{{ route('single', ['id'=> $vehicle->id]) }}">
                                        @if($vehicle->actual_price)
                                            <del>{{$vehicle->actual_price}}</del> <br/>
                                        @endif
                                        <span class="has-text-success title is-5 my-0">{{$vehicle->price}}</span> <br/>
                                        @if($vehicle->actual_price)
                                            <span class="has-text-danger">Save: {{$vehicle->actual_price - $vehicle->price}}</span>
                                        @endif
                                    </a>
                                </td>
                                <td class="has-text-centered">
                                    <a href="{{ route('single', ['id'=> $vehicle->id]) }}">
                                        @if(count($ports)>0&&$port)
                                            {{ $vehicle->total }}
                                        @endif
                                    </a>

                                    <app-model>
                                        <span slot="button">
                                            <i class="fa fa-envelope"></i> &nbsp; Inquiry
                                        </span>
                                        <form action="{{ route('inquary_email') }}" method="POST">
                                            {{ csrf_field() }}
                                            <inquery-form
                                                
                                                ajax_inquery_url = "{{ route('ajax_inquery') }}"
                                                @if(isset($vehicle->id)) vehicle_id="{{ $vehicle->id }}" @endif
                                                @if(isset($_REQUEST['country_id'])) country_id="{{ $_REQUEST['country_id'] }}" @endif
                                                @if(isset($_REQUEST['port_id'])) port_id="{{ $_REQUEST['port_id'] }}" @endif

                                                @if(isset($_REQUEST['insurance'])) insurance="{{ $_REQUEST['insurance'] }}" @endif
                                                @if(isset($_REQUEST['inspection'])) inspection="{{ $_REQUEST['inspection'] }}" @endif
                                                @if(isset($_REQUEST['certificate'])) certificate="{{ $_REQUEST['certificate'] }}" @endif
                                                @if(isset($_REQUEST['warranty'])) warranty="{{ $_REQUEST['warranty'] }}" @endif
                                            ></inquery-form>
                                        </form>
                                    </app-model>

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
