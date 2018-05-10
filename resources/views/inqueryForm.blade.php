<!-- Step 01 -->
@if(isset($_REQUEST['inquery']))
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
@endif