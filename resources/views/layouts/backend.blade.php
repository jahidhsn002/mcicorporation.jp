<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="site-url" content="{{ url('/') }}">

        <title>{{ config('app.name', 'Laravel') }} {{ app()->version() }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="helper">
            <div class="spinner" v-if="is_spining">
                <span class="icon">
                    <i class="fa fa-refresh fa-spin fa-3x"></i><br/>
                    Processing
                </span>
            </div>
        </div>
        <div id="app" class="container">
            <header class="app_header">
                <a class="navbar-item" href="{{ url('/') }}">
                  <img src="{{asset('img/logo.png')}}" width="112" height="28">
                </a>
                @include('layouts.header_backend_nav')
            </header>
            <div class="wraper">
            @yield('content')
            </div>
            <footer class="app_footer mt-20">
                @include('layouts.footer_contacts')
            </footer>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
