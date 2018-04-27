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
        <div id="app">
            <header class="app_header">
                <!-- <div class="top_banner">
                    <figure class="image">
                        <img src="{{asset('img/add_top.png')}}">
                    </figure>
                </div> -->
                @include('layouts.header_top_nav')
                @include('layouts.header_main_nav')
            </header>
            @yield('content')
            <footer class="app_footer">
                @include('layouts.footer_contacts')
                @include('layouts.footer_links')
                @include('layouts.footer_credit')
            </footer>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
