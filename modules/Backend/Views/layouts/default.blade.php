@include('Backend::layouts.partials.head')

<body class="hold-transition skin-blue sidebar-mini" data-base="{!! URL::action('\Backend\Controllers\AuthController@index') !!}" data-path="{!! URL::action('\Backend\Controllers\AuthController@index') !!}">
    @include('Backend::layouts.partials.header')

    @include('Backend::layouts.partials.main-sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">        
        <!-- Main content -->
            @yield('content')
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('Backend::layouts.partials.footer')

    @include('Backend::layouts.partials.helpers.scripts')
</body>
</html>
