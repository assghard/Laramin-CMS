<!DOCTYPE html>
<html lang="{{ locale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="Author" content="{{ env('APP_NAME') }}" />
        <meta name="robots" content="noindex, nofollow" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @include('layouts.partials.fav')
        <title>@section('title')@show | System Dashboard | {{ env('APP_NAME') }}</title>

        <link rel="stylesheet" href="{{ mix('/css/dashboard.css') }}" />
        @stack('styles')

        <script>
            window.ajaxTimeout = 7500;
            window.appUrl = "{{ env('APP_URL') }}";
        </script>
    </head>
    <body>
        @include('dashboard::layouts.partials.top')
        <div class="container-fluid">
            <div class="row">
                @include('dashboard::layouts.partials.sidebar')
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-2 px-4" id="app">
                    @include('dashboard::layouts.partials.notifications')
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-0 mb-2 border-bottom">
                        <h1 class="h3">@section('title')@show</h1>
                    </div>
                    @include('dashboard::settings.technical-break-alert')
                    @yield('content')
                </main>
            </div>
        </div>

        <script src="{{ mix('/js/dashboard.js') }}"></script>
        @stack('scripts')
    </body>
</html>
