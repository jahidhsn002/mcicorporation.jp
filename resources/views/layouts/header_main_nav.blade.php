<nav class="navbar is-dark has-shadow main_navbar">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ url('/') }}">
              <img src="{{asset('img/logo.png')}}" width="112" height="28">
            </a>
            <div class="navbar-burger burger" data-target="navMenu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="navbar-menu" id="navMenu">
            <div class="navbar-start">
                <div class="navbar-item has-dropdown is-hoverable is-mega">
                    <a class="navbar-link" href="#">
                        <div class="has-text-centered">
                            <i class="fa fa-car fa-3x"></i>
                            <br>Browse Stocks
                        </div>
                    </a>
                    <div class="navbar-dropdown">
                        <div class="px-5">
                            <div class="columns is-gapless">
                                <div class="column">
                                    <div class="saperater">
                                        <a class="navbar-item py-2" href="{{route('archive')}}">Browse all Cars</a>
                                        @foreach($sidebar->status as $data)
                                            <a class="navbar-item py-2" href="{{route('archive', ['taxonomy[]'=>$data->id])}}">{{$data->name}}</a>
                                        @endforeach
                                        <h5 class="title is-6 pl-10 py-0 my-10">Browse by Price</h5>
                                        <a class="navbar-item py-2" href="{{route('archive', ['price-from'=>0, 'price-to'=>500])}}">Under $500</a>
                                        <a class="navbar-item py-2" href="{{route('archive', ['price-from'=>499, 'price-to'=>1000])}}">$500 - $1,000</a>
                                        <a class="navbar-item py-2" href="{{route('archive', ['price-from'=>999, 'price-to'=>1500])}}">$1,000 - $1,500</a>
                                        <a class="navbar-item py-2" href="{{route('archive', ['price-from'=>1499, 'price-to'=>2000])}}">$1,500 - $2,000</a>
                                        <a class="navbar-item py-2" href="{{route('archive', ['price-from'=>1999, 'price-to'=>2500])}}">$2,000 - $2,500</a>
                                        <a class="navbar-item py-2" href="{{route('archive', ['price-from'=>2499, 'price-to'=>3500])}}">$2,500 - $3,500</a>
                                        <a class="navbar-item py-2" href="{{route('archive', ['price-from'=>3499, 'price-to'=>5000])}}">$3,500 - $5,000</a>
                                        <a class="navbar-item py-2" href="{{route('archive', ['price-from'=>4999])}}">Over $500</a>
                                        <h5 class="title is-6 pl-10 py-0 my-10">Browse by Steering</h5>
                                        @foreach($sidebar->steering as $data)
                                            <a class="navbar-item py-2" href="{{route('archive', ['taxonomy[]'=>$data->id])}}">{{$data->name}}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="saperater">
                                        <h5 class="title is-6 pl-10 py-0 my-10">Browse by Make</h5>
                                        @foreach($sidebar->make as $data)
                                            <a class="navbar-item py-2" href="{{route('archive', ['taxonomy[]'=>$data->id])}}">{{$data->name}}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="saperater">
                                        <h5 class="title is-6 pl-10 py-0 my-10">Browse By Type</h5>
                                        @foreach($sidebar->{'body-type'} as $data)
                                            <a class="navbar-item py-2" href="{{route('archive', ['taxonomy[]'=>$data->id])}}">{{$data->name}}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="saperater">
                                        <h5 class="title is-6 pl-10 py-0 my-10">Browse by Fuel Type</h5>
                                        @foreach($sidebar->fuel as $data)
                                            <a class="navbar-item py-2" href="{{route('archive', ['taxonomy[]'=>$data->id])}}">{{$data->name}}</a>
                                        @endforeach
                                        <h5 class="title is-6 pl-10 py-0 my-10">Browse Transmission</h5>
                                        @foreach($sidebar->transmission as $data)
                                            <a class="navbar-item py-2" href="{{route('archive', ['taxonomy[]'=>$data->id])}}">{{$data->name}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--
                <div class="navbar-item has-dropdown is-hoverable is-mega">
                    <a class="navbar-link " href="#">
                        <div class="has-text-centered">
                            <i class="fa fa-mobile fa-3x"></i>
                            <br>Electronics
                        </div>
                    </a>
                </div>
                -->
                <div class="navbar-item has-dropdown is-hoverable is-mega">
                    <a class="navbar-link " href="#">
                        <div class="has-text-centered">
                            <i class="fa fa-filter fa-3x"></i>
                            <br>All Options
                        </div>
                    </a>
                    <div class="navbar-dropdown">
                        <div class="px-5">
                            <div class="columns is-gapless">
                                <div class="column">
                                    <div class="saperater">
                                    @foreach($sidebar->taxonomy as $key => $tax)
                                        @if($key == 1 || $key == 2 || $key == 5 || $key == 16 || $key == 20)
                                            </div>
                                                </div>
                                                <div class="column">
                                            <div class="saperater">
                                        @endif
                                        <h5 class="title is-6 pl-10 py-0 my-10">{{ $tax->name }}</h5>
                                        @foreach($sidebar->{$tax->slug} as $data)
                                            <a class="navbar-item py-2" href="{{route('archive', ['taxonomy[]'=>$data->id])}}">{{$data->name}}</a>
                                        @endforeach
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navbar-item has-dropdown is-hoverable is-mega">
                    <a class="navbar-link " href="#">
                        <div class="has-text-centered">
                            <i class="fa fa-info-circle fa-3x"></i>
                            <br>About &amp; Support
                        </div>
                    </a>
                </div>
                <!--
                <div class="navbar-item has-dropdown is-hoverable is-mega">
                    <a class="navbar-link " href="#">
                        <div class="has-text-centered">
                            <i class="fa fa-globe fa-3x"></i>
                            <br>Local Service
                        </div>
                    </a>
                </div>
                -->
                <a class="navbar-item " href="#">
                    <div class="has-text-left">
                        Customer Reviews <br>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i> 4.7
                        <br>Read 245877 Reviews
                    </div>
                </a>
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    @if(Auth::check())
                        <div class="has-text-centered">
                        
                            Hello, {{ Auth::user()->name }} <br>

                            <div class="navbar-item has-dropdown is-hoverable is-mega">
                                <a class="button is-warning is-small px-30" href="#">
                                    <div class="has-text-centered">
                                        My Account
                                    </div>
                                </a>
                                <div class="navbar-dropdown is-right">
                                    <div class="px-5">
                                        <div class="columns is-gapless">
                                            <div class="column">
                                                    <h5 class="title is-5 pl-10 py-0 my-10">Inquiries</h5>
                                                    <!--<a class="navbar-item py-2" href="{{route('archive')}}">Inquiries</a>-->
                                                    <a class="navbar-item py-2" href="{{route('favorite')}}">Favorites</a>
                                                    <a class="navbar-item py-2" href="{{route('wishlist')}}">Wish List</a>
                                                    <!--<a class="navbar-item py-2" href="{{route('archive')}}">Invoices</a>-->
                                                    @if(Auth::user()->is_admin)
                                                    <h5 class="title is-5 pl-10 py-0 my-10">Admin</h5>
                                                    <a class="navbar-item py-2" href="{{route('new_vehicle')}}">New Car</a>
                                                    <a class="navbar-item py-2" href="{{route('country')}}">Country &amp; Port</a>
                                                    <a class="navbar-item py-2" href="{{route('taxonomy')}}">Taxonomy &amp; Metas</a>
                                                    @endif
                                            </div>
                                            <div class="column">
                                                    <h5 class="title is-5 pl-10 py-0 my-10">Account Settings</h5>
                                                    <a class="navbar-item py-2" href="{{route('account')}}">Account Information</a>
                                                    <a class="navbar-item py-2" href="{{route('language')}}">Language Preferences</a>
                                                    <a class="navbar-item py-2" href="{{route('password')}}">Update your Password</a>
                                                    <a class="navbar-item py-2 mt-20" href="{{ route('dashboard') }}"><b>Dashboard</b></a>
                                                    <a class="navbar-item py-2 mb-20 mt-5" href="{{ route('logout') }}"><b>Logout</b></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    @else
                        <div class="has-text-right">

                            New customer? Create account <br>
                            <a class="button is-warning is-small px-30" href="{{ route('login') }}">Log In</a>
                            <a class="button is-warning is-small px-30" href="{{ route('register') }}">Register</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>