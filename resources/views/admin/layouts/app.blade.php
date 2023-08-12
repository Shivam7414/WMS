<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('admin.layouts.partials.head')
    </head>
    <body>
        @include('admin.layouts.partials.sidebar')
        
        <div id="content">
            @include('admin.layouts.partials.header')

            @yield('content')
        </div>

        @include('admin.layouts.partials.modal')
        @include('admin.layouts.partials.scripts')
    </body>
</html>