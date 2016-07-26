@include('Frontend::layouts.partials.head')

<body data-base="{!! URL::action('\Frontend\Controllers\AuthController@index') !!}" data-path="{!! URL::action('\Frontend\Controllers\AuthController@index') !!}">
    @include('Frontend::layouts.partials.header')
    @yield('content')
    @include('Frontend::layouts.partials.footer')

    @include('Frontend::layouts.partials.helpers.scripts')
</body>
</html>
