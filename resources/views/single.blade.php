@extends('layouts.app')

@section('content')
    <div class="container page_single">
        <div class="columns">
            <div class="column is-8 is-offset-2">
                <div class="columns my-0 is-multiline">
                    <div class="column is-6">
                        @if($vehicle->thumbnail)
                            @foreach(json_decode($vehicle->thumbnail) as $link)
                            <figure>
                                <img src="{{asset($link)}}" data-action="zoom" class="joomable">
                            </figure>
                            @endforeach
                        @else
                            <img src="{{asset('img/car_1.jpg')}}">
                        @endif
                        <div class="gullery_thumbnail columns my-0 is-multiline">
                            @if($vehicle->gallery)
                                @foreach(json_decode($vehicle->gallery) as $link)
                                <figure class="column is-3">
                                    <img src="{{asset($link)}}" data-action="zoom" class="joomable">
                                </figure>
                                @endforeach
                            @else
                                <figure class="column is-3">
                                    <img src="{{asset('img/car_1.jpg')}}">
                                </figure>
                            @endif
                        </div>
                    </div>
                    <div class="column is-6">
                        <h3 class="title is-4">{{$vehicle->name}}</h3>
                        <div class="price columns">
                            <div class="column is-8">
                                
                                <h4 class="title is-5 box mb-10 py-10 has-text-right">
                                    @if($vehicle->actual_price)
                                        <del>Actual price: <span class="has-text-success">{{$vehicle->actual_price}}</span></del> <br/>
                                    @endif
                                    Current price: <span class="has-text-success">{{$vehicle->price}}</span> <br/>
                                    @if($vehicle->actual_price)
                                        You Save: <span class="has-text-success">{{$vehicle->actual_price - $vehicle->price}}</span>
                                    @endif
                                </h4>
                            </div>
                            <div class="column">
                                @if(Auth::check())
                                    @if(Auth::user()->is_admin)
                                    <a class="button is-warning is-small mb-2" style="width:100%" href="{{ route('save_vehicle', ['id'=>$vehicle->id]) }}">Edit</a>
                                    @endif
                                @endif
                                <a href="{{ route('favorite_save', ['vehicle_id' => $vehicle->id]) }}" class="button is-warning mb-2" style="width:100%">Favorite</a> <br/>
                                <button class="button is-warning" style="width:100%">Print</button>
                            </div>
                        </div>
                        <a href="#step" class="button is-large is-warning has-text-uppercase mb-10">Get a price quote now</a>
                        <div class="card">
                            <header class="card-header">
                                <p class="card-header-title">Specs</p>
                            </header>
                            <div class="card-content">
                                <div class="columns is-gapless">
                                    <div class="column is-6 pa-0">
                                        <table class="table mb-5" width="100%">
                                            <tr>
                                                <th>Ref No</th>
                                                <td>{{$vehicle->ref_no}}</td>
                                            </tr>
                                            <tr>
                                                <th>Engine Size</th>
                                                <td>{{$vehicle->engine}}</td>
                                            </tr>
                                            <tr>
                                                <th>Model Code</th>
                                                <td>{{$vehicle->model_code}}</td>
                                            </tr>
                                            <tr>
                                                <th>Mileage</th>
                                                <td>{{$vehicle->mileage}}</td>
                                            </tr>
                                            <tr>
                                                <th>Chassis</th>
                                                <td>{{$vehicle->chassis}}</td>
                                            </tr>
                                            <tr>
                                                <th>Engine Code</th>
                                                <td>{{$vehicle->engine_code}}</td>
                                            </tr>
                                            <tr>
                                                <th>Seats</th>
                                                <td>{{$vehicle->seats}}</td>
                                            </tr>
                                            <tr>
                                                <th>Dors</th>
                                                <td>{{$vehicle->dors}}</td>
                                            </tr>
                                            <tr>
                                                <th>Simension</th>
                                                <td>{{$vehicle->dimension}}</td>
                                            </tr>
                                            <tr>
                                                <th>M3</th>
                                                <td>{{$vehicle->m3}}</td>
                                            </tr>
                                            <tr>
                                                <th>Weight</th>
                                                <td>{{$vehicle->weight}}</td>
                                            </tr>
                                            <tr>
                                                <th class="has-text-success">Manufacture <br/> Year/month</th>
                                                <td>{{$vehicle->manufacture}}</td>
                                            </tr>
                                            <tr>
                                                <th class="has-text-danger">Registration <br/> Year/month</th>
                                                <td>{{$vehicle->registration}}</td>
                                            </tr>
                                        </table>
                                        <div class="pa-5">
                                            <small>
                                            <small class="has-text-success">
                                                * [Manufacture Year/month] is provided by database provider. 
                                                BE FORWARD shall not be responsible for any loss, damages
                                                and troubles caused by this information.
                                            </small>
                                            </small>
                                            <br>
                                            <small>
                                            <small class="has-text-danger">
                                                * [Registration Year/month] is a registration date in Japan.
                                            </small>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="column is-6 pa-0">
                                        <table class="table mb-5" width="100%">
                                            @foreach($vehicle->taxonomies as $tax_meta)
                                            <tr>
                                                <th>{{$tax_meta->taxonomy->name}}</th>
                                                <td>{{$tax_meta->name}}</td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card feature">
                            <h3 class="title is-4 px-10 pt-15 pb-0 mb-0">Standard features</h3>
                            <div class="card-content">
                                <div class="columns is-multiline is-gapless">
                                    @foreach($features as $feat)
                                    <div class="column is-3 box {{in_array($feat->id, $feature_selected)?'selected':''}}">
                                        <div class="pa-10">{{$feat->name}}</div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-8 is-offset-2">
                    
                    <!-- Step 01 -->
                    @if(count($ports)<=0)
                    <div class="card" id="step">
                        <header class="card-header">
                            <p class="card-header-title">Step 1. CHOOSE YOUR DELIVERY OPTIONS</p>
                        </header>
                        <div class="card-content">
                            <form action="{{ route('single', ['id'=> $vehicle->id]) }}#step" method="GET">
                                <div class="field">
                                    <label class="label">Choose Final Country*</label>
                                    <div class="control">
                                        <div class="select">
                                          <select name="country_id">
                                            <option>Select</option>
                                            @foreach($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <button class="button is-dark px-50" type="submit">Next</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif


                    @if(count($ports)>0)
                    <div class="card" id="step">
                        <header class="card-header">
                            <p class="card-header-title">Step 2. CHOOSE YOUR DELIVERY OPTIONS</p>
                        </header>
                        <div class="card-content">
                            <form action="{{ route('inquary_email') }}#sep-1" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="patch">
                                <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
                                <div class="field">
                                    <label class="label">Choose Final Country*</label>
                                    <div class="control">
                                        <div class="select">
                                          <select name="country_id">
                                            <option>Select</option>
                                            @foreach($countries as $country)
                                            <option value="{{ $country->id }}"
                                                @if(isset($_REQUEST['country_id']))
                                                    @if($_REQUEST['country_id']==$country->id)
                                                        selected
                                                    @endif
                                                @endif
                                            >{{ $country->name }}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <table class="table" width="100%">
                                        <tr>
                                            <th>Choose</th>
                                            <th>Port</th>
                                            <th>Destination</th>
                                            <th>Cost</th>
                                            <th>Total</th>
                                        </tr>
                                        @foreach($ports as $port)
                                        <tr>
                                            <td>
                                                <div class="control">
                                                    <label class="radio">
                                                      <input value="{{ $port->id }}" type="radio" name="port_id" 
                                                        @if(isset($_REQUEST['port_id']))
                                                            @if($_REQUEST['port_id']==$port->id)
                                                                checked
                                                            @endif
                                                        @endif
                                                      >
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ $port->name }}</td>
                                            <td>{{ $port->name }} (port)</td>
                                            <td>{{ $port->insurance+$port->inspection+$port->certificate+$port->warranty }}</td>
                                            <td>{{ $vehicle->price+$port->insurance+$port->inspection+$port->certificate+$port->warranty }}</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="field">
                                    <button class="button is-dark px-50" type="submit">Get Quote</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card mt-15">
                        <header class="card-header">
                            <p class="card-header-title">Step 3. YOUR DETAILS</p>
                        </header>
                        <div class="card-content">
                            <div class="columns">
                                <div class="column is-6">
                                    <div class="field">
                                        <label class="label">Name*</label>
                                        <div class="control">
                                            <input class="input" type="text" name="name" 
                                                @if(Auth::check())
                                                value="{{Auth::user()->name}}"
                                                @endif
                                            >
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label">Email*</label>
                                        <div class="control">
                                            <input class="input" type="email" name="email" 
                                                @if(Auth::check())
                                                value="{{Auth::user()->email}}"
                                                @endif
                                            >
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label">Phone*</label>
                                        <div class="control">
                                            <input class="input" type="text" name="phone" 
                                                @if(Auth::check())
                                                value="{{Auth::user()->phone}}"
                                                @endif
                                            >
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-6">
                                    <div class="field">
                                        <label class="label">City*</label>
                                        <div class="control">
                                            <input class="input" type="text" name="city" 
                                                @if(Auth::check())
                                                value="{{Auth::user()->city}}"
                                                @endif
                                            >
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label">Address*</label>
                                        <div class="control">
                                            <input class="input" type="text" name="address" 
                                                @if(Auth::check())
                                                value="{{Auth::user()->address}}"
                                                @endif
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endif


                    <div class="card mt-15">
                        <header class="card-header">
                            <p class="card-header-title">HOW TO GET A PROFORMA INVOICE</p>
                        </header>
                        <div class="card-content">
                            <h5 class="title is-6 mb-10 mt-0">To get Proforma Invoice, please do the followings:</h5>
                            <div class="pl-15">
                                <ol>
                                    <li>Fill out the required fields above and click the Inquiry button.</li>
                                    <li>You will receive a quotation from BE FORWARD via email.</li>
                                    <li>Reply to the email if you accept the quotation.</li>
                                    <li>We will issue a Proforma Invoice once you completed the steps above.</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
