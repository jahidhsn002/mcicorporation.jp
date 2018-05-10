@extends('layouts.app')

@section('content')
    <div class="container page_single">
        <div class="columns">
            <div class="column is-10 is-offset-1">
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
                        <div class="price columns mb-0">
                            <div class="column is-8">
                                <div class="box mb-0 pa-10 has-text-right">
                                    @if($vehicle->actual_price)
                                        <h4 class="title is-5 my-5">
                                            Original Price: <del>{{$vehicle->actual_price}}</del> <br/>
                                        </h4>
                                    @endif
                                    <h4 class="title is-4 my-5">
                                        Current price: <span class="has-text-success">{{$vehicle->price}}</span> <br/>
                                    </h4>
                                    @if($vehicle->actual_price)
                                    <h4 class="title is-5 my-5">
                                        You Save: <span class="has-text-danger">{{$vehicle->actual_price - $vehicle->price}}</span>
                                    </h4>
                                    @endif
                                </div>
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
                        <div class="has-text-left lg_button mb-20">
                            <app-model>
                                    <span slot="button">
                                        Get a price quote now
                                    </span>
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
                                </app-model>
                        </div>
                        <div class="card">
                            <header class="card-header">
                                <p class="card-header-title is-5 title">Specs</p>
                            </header>
                            <div class="card-content pa-0">
                                <div class="columns is-gapless">
                                    <div class="column is-6 pa-0">
                                        <table class="table is-striped mb-5" width="100%">
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
                                        <table class="table is-striped mb-5" width="100%">
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
                        <div class="card feature mt-10">
                            <h3 class="title is-5 px-10 pt-15 pb-0 mb-0">Standard features</h3>
                            <div class="card-content">
                                <div class="columns is-multiline is-gapless">
                                    @foreach($features as $feat)
                                    <div class="column is-3">
                                        <div class="pa-10 box ma-2 is-radiusless {{in_array($feat->id, $feature_selected)?'selected':''}}">{{$feat->name}}</div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-6 is-offset-3">

                    <form action="{{ route('inquary_email') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="post">

                        <inquery-form-2

                            ajax_inquery_url = "{{ route('ajax_inquery') }}"
                            @if(isset($vehicle->id)) vehicle_id="{{ $vehicle->id }}" @endif
                            @if(isset($_REQUEST['country_id'])) country_id="{{ $_REQUEST['country_id'] }}" @endif
                            @if(isset($_REQUEST['port_id'])) port_id="{{ $_REQUEST['port_id'] }}" @endif

                            @if(isset($_REQUEST['insurance'])) insurance="{{ $_REQUEST['insurance'] }}" @endif
                            @if(isset($_REQUEST['inspection'])) inspection="{{ $_REQUEST['inspection'] }}" @endif
                            @if(isset($_REQUEST['certificate'])) certificate="{{ $_REQUEST['certificate'] }}" @endif
                            @if(isset($_REQUEST['warranty'])) warranty="{{ $_REQUEST['warranty'] }}" @endif
                            
                        ></inquery-form-2>

                    </form>

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
