<!--Header Section -->
<header class="main-header">
    <?php $auth = Auth::user(); ?>
    <!-- Logo -->
    <a href="{!! URL::action('\Frontend\Controllers\AuthController@index') !!}" target="_blank" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>GXD</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>{!! Alloy\Facades\Translation::En('Admin') !!}</b> {!! Alloy\Facades\Translation::En('GXD') !!}</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            @if(!empty($auth))
            <ul class="nav navbar-nav">

                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        @if(!empty($auth->avatar))
                            <img src="{!! asset($auth->avatar) !!}" class="user-image" alt="{!! Alloy\Facades\Translation::En('Avatar') !!}">
                        @else
                            <img src="{!! asset('backend/img/avatars/default.png') !!}" class="user-image" alt="{!! Alloy\Facades\Translation::En('Avatar') !!}">
                        @endif
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{!! $auth->name !!}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            @if(!empty($auth->avatar))
                                <img src="{!! asset($auth->avatar) !!}" class="img-circle" alt="{!! Alloy\Facades\Translation::En('Avatar') !!}">
                            @else
                                <img src="{!! asset('backend/img/avatars/default.png') !!}" class="img-circle" alt="{!! Alloy\Facades\Translation::En('Avatar') !!}">
                            @endif

                            <p>
                                {!! $auth->name !!}
                                <small>@lang('user.'.$auth->role->name)</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!--<li class="user-body">-->
<!--                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </div>-->
                            <!-- /.row -->
                        <!--</li>-->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{!! URL::action('\Backend\Controllers\AuthController@profile') !!}" class="btn btn-default btn-flat">{!! Alloy\Facades\Translation::En('Profile') !!}</a>
                            </div>
                            <div class="pull-right">
                                <a href="{!! URL::action('\Backend\Controllers\AuthController@logout') !!}" class="btn btn-default btn-flat">{!! Alloy\Facades\Translation::En('Sign out') !!}</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
                @endif
        </div>
    </nav>
</header>


