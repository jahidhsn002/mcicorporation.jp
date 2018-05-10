<section class="column is-12">
    <!-- Step 01 -->
        <div class="card archiveCalculator" id="step">
            <div class="card-content">
                <form action="{{ route('archive') }}" method="GET">
                <div class="columns">
                    <div class="column is-3">
                        <p class="card-header-title pt-0 pl-0">
                            <img src="img/calculator.png" height="100%" class="pr-10">
                            TOTAL PRICE CALCULATOR</p>
                        <div>
                            Total Price calculator will estimate the total price of the vehicle(s) based on your shipping destination port and other preferences. <br/>
                            Note: In some cases the total price cannot be estimated.
                        </div>
                    </div>
                    <div class="column is-3">
                        <div class="columns">
                            <label class="column is-4 has-text-right">
                                <span class="title is-5 is-pulled-right mb-0 mt-5 mr-0 ml-5 tool">
                                    <i class="fa fa-question-circle"></i>
                                    <span class="msg">
                                        Please select the country whereever your vehicle will be register finally
                                    </span>
                                </span>
                                Final<br/>
                                Country
                            </label>
                            <div class="column is-6">
                                <div class="select is-expanded" style="width:100%">
                                  <select name="country_id" style="width:100%">
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
                            <div class="column is-2">
                                <i class="fa fa-help"></i>
                            </div>
                        </div>
                        <div class="columns">
                            <label class="column is-4 has-text-right">
                                <span class="title is-5 is-pulled-right mb-0 mt-5 mr-0 ml-5 tool">
                                    <i class="fa fa-question-circle"></i>
                                    <span class="msg">
                                        Please select the Port/Ciety where ever your vehicle will be arrived
                                    </span>
                                </span>
                                Nearest<br>
                                Port
                            </label>
                            <div class="column is-6">
                                <div class="select" style="width:100%">
                                  <select name="port_id" style="width:100%">
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
                            <div class="column is-2">
                                <i class="fa fa-help"></i>
                            </div>
                        </div>
                    </div>
                    <div class="column is-4">
                        <div class="columns mb-0">
                            <label class="column is-4 has-text-right">
                                <span class="title is-5 is-pulled-right my-0 mr-0 ml-5 tool">
                                    <i class="fa fa-question-circle"></i>
                                    <span class="msg">
                                        INSURANCE covers the total loss by transportation
                                    </span>
                                </span>
                                INSURANCE
                            </label>
                            <div class="column is-6">
                                <label class="radio">
                                  <input type="radio" name="insurance" value="On"
                                        @if(isset($_REQUEST['insurance']))
                                            @if($_REQUEST['insurance']=='On')
                                                checked
                                            @endif
                                        @endif
                                    >
                                    Yes
                                </label>
                                <label class="radio">
                                    <input type="radio" name="insurance" value="Off"
                                        @if(isset($_REQUEST['insurance']))
                                            @if($_REQUEST['insurance']=='Off')
                                                checked
                                            @endif
                                        @endif
                                    >
                                    No
                                </label>

                            </div>
                            <div class="column is-2">
                                <i class="fa fa-help"></i>
                            </div>
                        </div>
                        <div class="columns mb-0">
                            <label class="column is-4 has-text-right">
                                <span class="title is-5 is-pulled-right my-0 mr-0 ml-5 tool">
                                    <i class="fa fa-question-circle"></i>
                                    <span class="msg">
                                        Please specify wheather INSPECTION is necessery in your country
                                    </span>
                                </span>
                                INSPECTION
                            </label>
                            <div class="column is-6">
                                <label class="radio">
                                  <input type="radio" name="inspection" value="On"
                                        @if(isset($_REQUEST['inspection']))
                                            @if($_REQUEST['inspection']=='On')
                                                checked
                                            @endif
                                        @endif
                                    >
                                    Yes
                                </label>
                                <label class="radio">
                                    <input type="radio" name="inspection" value="Off"
                                        @if(isset($_REQUEST['inspection']))
                                            @if($_REQUEST['inspection']=='Off')
                                                checked
                                            @endif
                                        @endif
                                    >
                                    No
                                </label>
                            </div>
                            <div class="column is-2">
                                <i class="fa fa-help"></i>
                            </div>
                        </div>
                        <div class="columns mb-0">
                            <label class="column is-4 has-text-right">
                                <span class="title is-5 is-pulled-right my-0 mr-0 ml-5 tool">
                                    <i class="fa fa-question-circle"></i>
                                    <span class="msg">
                                        Please specify wheather CERTIFICATE is necessery in your country
                                    </span>
                                </span>
                                CERTIFICATE
                            </label>
                            <div class="column is-6">
                                <label class="radio">
                                    <input type="radio" name="certificate" value="On"
                                        @if(isset($_REQUEST['certificate']))
                                            @if($_REQUEST['certificate']=='On')
                                                checked
                                            @endif
                                        @endif
                                    >
                                    Yes
                                </label>
                                <label class="radio">
                                    <input type="radio" name="certificate" value="Off"
                                        @if(isset($_REQUEST['certificate']))
                                            @if($_REQUEST['certificate']=='Off')
                                                checked
                                            @endif
                                        @endif
                                    >
                                    No
                                </label>
                            </div>
                            <div class="column is-2">
                                <i class="fa fa-help"></i>
                            </div>
                        </div>
                        <div class="columns mb-0">
                            <label class="column is-4 has-text-right">
                                <span class="title is-5 is-pulled-right my-0 mr-0 ml-5 tool">
                                    <i class="fa fa-question-circle"></i>
                                    <span class="msg">
                                        WARRANTY covers any kind of loss/damage of your vehicle
                                    </span>
                                </span>
                                WARRANTY
                            </label>
                            <div class="column is-6">
                                <label class="radio">
                                  <input type="radio" name="warranty" value="On"
                                        @if(isset($_REQUEST['warranty']))
                                            @if($_REQUEST['warranty']=='On')
                                                checked
                                            @endif
                                        @endif
                                    >
                                    Yes
                                </label>
                                <label class="radio">
                                    <input type="radio" name="warranty" value="Off"
                                        @if(isset($_REQUEST['warranty']))
                                            @if($_REQUEST['warranty']=='Off')
                                                checked
                                            @endif
                                        @endif
                                    >
                                    No
                                </label>
                            </div>
                            <div class="column is-2">
                                <i class="fa fa-help"></i>
                            </div>
                        </div>
                    </div>
                    <div class="column is-2">
                        <div class="field has-text-centered">
                            <button class="button is-dark px-10 mt-20 submit" type="submit">
                                <i class="fa fa-calculator pr-5"></i>
                                Calculate
                            </button><br/>
                            <button class="button is-default px-10 mt-10 submit" type="reset">Reset</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
</section>