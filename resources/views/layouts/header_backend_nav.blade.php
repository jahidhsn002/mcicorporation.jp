<nav class="navbar is-dark has-shadow top_navbar">
        <div class="navbar-brand">
            <div class="navbar-burger burger" data-target="navMenu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="navbar-menu" id="navMenu">
            <div class="navbar-start">
                <a class="navbar-item " href="{{ route('dashboard') }}">Dashboard</a>
                <!--<a class="navbar-item " href="#">Inquires</a>-->
                <a class="navbar-item " href="{{ route('favorite') }}">Favorite</a>
                <a class="navbar-item " href="{{ route('wishlist') }}">Wish List</a>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" href="#">
                      Account Info
                    </a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item py-2" href="{{route('account')}}">Account Information</a>
                        <a class="navbar-item py-2" href="{{route('language')}}">Language Preferences</a>
                        <a class="navbar-item py-2" href="{{route('password')}}">Update your Password</a>
                    </div>
                </div>
                @if(Auth::user()->is_admin)
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" href="#">
                      Admin
                    </a>
                    <div class="navbar-dropdown">
                         <a class="navbar-item py-2" href="{{route('new_vehicle')}}">New Car</a>
                         <a class="navbar-item py-2" href="{{route('country')}}">Country &amp; Port</a>
                         <a class="navbar-item py-2" href="{{route('taxonomy')}}">Taxonomy &amp; Metas</a>
                    </div>
                </div>
                @endif
            </div>
            <div class="navbar-end">
                <div class="navbar-item has-dropdown is-hoverable is-mega">
                    <a class="navbar-link " href="#">
                        <div class="has-text-centered">
                            Browse Stocks
                        </div>
                    </a>
                    <div class="navbar-dropdown is-right">
                        <div class="container is-fluid">
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
                                        <h5 class="title is-5 pl-10 py-0 my-10">{{ $tax->name }}</h5>
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
            </div>
        </div>
</nav>