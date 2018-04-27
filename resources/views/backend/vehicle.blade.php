@extends('layouts.backend')

@section('content')

    <form action="{{route('vehicle_save')}}" method="POST">

    <div class="columns is-marginless is-centered">

        <div class="column is-6">
            @include('backend.vehicle_right_option')
        </div>

        <div class="column is-6">

            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        {{$vehicle?'Edit '.$vehicle->name:'New Vehicle'}}
                    </p>
                    <button class="button is-success mr-2 mt-5 px-20" type="submit">Save</button>
                    @if($vehicle)
                    <a class="button is-danger mr-5 mt-5 px-20" href="{{ route('vehicle_delete', ['id'=> $vehicle->id]) }}">Delete</a>
                    @endif
                </header>

                <div class="card-content">

                    <div class="columns is-multiline">

                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id" value="{{$id}}">

                        {{ csrf_field() }}

                        

                        <div class="column is-6">

                            <div class="field">
                              <label class="label">Name</label>
                              <div class="control">
                                <input class="input" type="text" name="name" 
                                    @if($vehicle) value="{{$vehicle->name}}" @endif
                                >
                              </div>
                            </div>

                            <div class="field">
                              <label class="label">Ref No</label>
                              <div class="control">
                                <input class="input" type="text" name="ref_no" 
                                    @if($vehicle) value="{{$vehicle->ref_no}}" @endif
                                >
                              </div>
                            </div>

                            <div class="field">
                              <label class="label">Actual Price</label>
                              <div class="control">
                                <input class="input" type="number" step="any" name="actual_price" 
                                    @if($vehicle) value="{{$vehicle->actual_price}}" @endif
                                >
                              </div>
                            </div>

                            <div class="field">
                              <label class="label">Price</label>
                              <div class="control">
                                <input class="input" type="number" step="any" name="price" 
                                    @if($vehicle) value="{{$vehicle->price}}" @endif
                                >
                              </div>
                            </div>

                            <div class="field">
                              <label class="label">Manufacture Date</label>
                              <div class="control">
                                <input class="input" type="text" name="manufacture" 
                                    @if($vehicle) value="{{$vehicle->manufacture}}" @endif
                                >
                              </div>
                            </div>

                            <div class="field">
                              <label class="label">Model Code</label>
                              <div class="control">
                                <input class="input" type="text" name="model_code" 
                                    @if($vehicle) value="{{$vehicle->model_code}}" @endif
                                >
                              </div>
                            </div>

                            <div class="field">
                              <label class="label">Engine</label>
                              <div class="control">
                                <input class="input" type="number" step="any" name="engine" 
                                    @if($vehicle) value="{{$vehicle->engine}}" @endif
                                >
                              </div>
                            </div>

                            <div class="field">
                              <label class="label">Mileage</label>
                              <div class="control">
                                <input class="input" type="number" step="any" name="mileage" 
                                    @if($vehicle) value="{{$vehicle->mileage}}" @endif
                                >
                              </div>
                            </div>






                            <div class="field">
                              <label class="label">Chassis</label>
                              <div class="control">
                                <input class="input" type="text" name="chassis" 
                                    @if($vehicle) value="{{$vehicle->chassis}}" @endif
                                >
                              </div>
                            </div>

                            <div class="field">
                              <label class="label">Engine Code</label>
                              <div class="control">
                                <input class="input" type="text" name="engine_code" 
                                    @if($vehicle) value="{{$vehicle->engine_code}}" @endif
                                >
                              </div>
                            </div>

                            <div class="field">
                              <label class="label">Seats</label>
                              <div class="control">
                                <input class="input" type="text" name="seats" 
                                    @if($vehicle) value="{{$vehicle->seats}}" @endif
                                >
                              </div>
                            </div>

                            <div class="field">
                              <label class="label">Dors</label>
                              <div class="control">
                                <input class="input" type="text" name="dors" 
                                    @if($vehicle) value="{{$vehicle->dors}}" @endif
                                >
                              </div>
                            </div>

                            <div class="field">
                              <label class="label">Dimension</label>
                              <div class="control">
                                <input class="input" type="text" name="dimension" 
                                    @if($vehicle) value="{{$vehicle->dimension}}" @endif
                                >
                              </div>
                            </div>

                            <div class="field">
                              <label class="label">M3</label>
                              <div class="control">
                                <input class="input" type="text" name="m3" 
                                    @if($vehicle) value="{{$vehicle->m3}}" @endif
                                >
                              </div>
                            </div>

                            <div class="field">
                              <label class="label">Weight</label>
                              <div class="control">
                                <input class="input" type="text" name="weight" 
                                    @if($vehicle) value="{{$vehicle->weight}}" @endif
                                >
                              </div>
                            </div>

                            <div class="field">
                              <label class="label">Registration</label>
                              <div class="control">
                                <input class="input" type="text" name="registration" 
                                    @if($vehicle) value="{{$vehicle->registration}}" @endif
                                >
                              </div>
                            </div>

                        </div>

                        <div class="column is-6">

                            <div class="field">
                                <label class="label">Thumbnail</label>
                                <div class="control">
                                    <field-image
                                        name="thumbnail"
                                        @if(isset($vehicle->thumbnail)) :value="{{$vehicle->thumbnail}}" @endif
                                    ></field-image>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Gallery</label>
                                <div class="control">
                                    <field-image
                                        name="gallery" multiple
                                        @if(isset($vehicle->gallery)) :value="{{$vehicle->gallery}}" @endif
                                    ></field-image>
                                </div>
                            </div>

                        </div>

                        <div class="column is-12 has-text-centered">

                            <button class="button is-success mr-2 mt-5 px-20" type="submit">Save</button>
                            <button class="button is-warning mr-2 mt-5 px-20" type="reset">Reset</button>
                            <button class="button is-danger mr-5 mt-5 px-20" type="reset">Delete</button>

                        </div>

                    </div>
                </div>


                

            </div>
        </div>
        
    </div>
    </form>
@endsection
