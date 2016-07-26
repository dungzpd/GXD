@include('Backend::layouts.partials.head')

<body class="hold-transition login-page" data-base="{!! URL::to('/') !!}" data-path="{!! URL::to('/') !!}">

    @yield('content') 

    @include('Backend::layouts.partials.helpers.scripts')
</body>
</html>
