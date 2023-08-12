<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layouts.partials.head')
    </head>
    <body>
        @include('layouts.partials.header')

        <div class="container">
            @yield('content')
        </div>

        @include('layouts.partials.modal')

        @include('layouts.partials.scripts')
    </body>
</html>