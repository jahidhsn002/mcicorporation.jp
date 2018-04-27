<section class="column is-12">
    <!-- Step 01 -->
    @if(count($ports)<=0)
        <div class="card" id="step">
            <div class="card-content">
                <form action="{{ route('archive') }}" method="GET">
                <div class="columns">
                    <div class="column is-5">
                        <p class="card-header-title">TOTAL PRICE CALCULATOR</p>
                        <div>
                            Total Price calculator will estimate the total price of the vehicle(s) based on your shipping destination port and other preferences. <br/>
                            Note: In some cases the total price cannot be estimated.
                        </div>
                    </div>
                    <div class="column is-5">
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
                    </div>
                    <div class="column is-2">
                        <div class="field">
                            <button class="button is-dark px-30 is-large mt-20" type="submit">Calculate</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    @endif

    @if(count($ports)>0)
        <div class="card" id="step">
            <div class="card-content">
                <form action="{{ route('archive') }}" method="GET">
                <div class="columns">
                    <div class="column is-5">
                        <p class="card-header-title">TOTAL PRICE CALCULATOR</p>
                        <div>
                            Total Price calculator will estimate the total price of the vehicle(s) based on your shipping destination port and other preferences. <br/>
                            Note: In some cases the total price cannot be estimated.
                        </div>
                    </div>
                    <div class="column is-5">
                        <div class="field">
                            <label class="label">Choose Country*</label>
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
                            <label class="label">Choose Port*</label>
                            <div class="control">
                                <div class="select">
                                  <select name="port_id">
                                    <option>Select</option>
                                    @foreach($ports as $port)
                                    <option value="{{ $port->id }}"
                                        @if(isset($_REQUEST['port_id']))
                                            @if($_REQUEST['port_id']==$port->id)
                                                selected
                                            @endif
                                        @endif
                                    >{{ $port->name }}</option>
                                    @endforeach
                                  </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-2">
                        <div class="field has-text-left">
                            <button class="button is-dark px-30 is-large mt-20" type="submit">Calculate</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
@endif
</section>