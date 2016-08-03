<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <?php $auth = Auth::user(); ?>
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                @if(!empty($auth->avatar)) 
                    <img src="{!! asset($auth->avatar) !!}" class="img-circle" alt="{!! Alloy\Facades\Translation::En('Avatar') !!}">
                @else 
                    <img src="{!! asset('backend/img/avatars/default.png') !!}" class="img-circle" alt="{!! Alloy\Facades\Translation::En('Avatar') !!}">
                @endif
            </div>
            <div class="pull-left info">
                <p>{!! $auth->name !!}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> {!! Alloy\Facades\Translation::En('Online') !!}</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{!! Alloy\Facades\Translation::En('Search') !!}...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{!! Alloy\Facades\Translation::En('Menu') !!}</li>
            <li>
                <a href="{!! URL::action('\Frontend\Controllers\AuthController@index') !!}" target="_blank">
                    <i class="fa fa-home"></i>
                    @lang('common.home')
                </a>
            </li>
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview
            @if (in_array(\Request::url(), [URL::action('\Backend\Controllers\UserController@index'), URL::action('\Backend\Controllers\UserController@create'),]))
                {!! 'active' !!}
            @endif
            ">
                <a href=#>
                    <i class="fa fa-users"></i>
                    <span>@lang('user.account')</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{!! URL::action('\Backend\Controllers\UserController@index') !!}">
                            <i class="fa fa-circle-o"></i>
                            @lang('user.accountList')
                        </a>
                    </li>
                    <li>
                        <a href="{!! URL::action('\Backend\Controllers\UserController@create') !!}">
                            <i class="fa fa-circle-o"></i>
                            @lang('user.accountCreate')
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview
            @if (in_array(\Request::url(), [URL::action('\Backend\Controllers\CategoriesController@index'), URL::action('\Backend\Controllers\CategoriesController@create')]))
                {!! 'active' !!}
            @endif">
                <a href="#">
                    <i class="fa fa-list-ol"></i>
                    <span>@lang('categories.categories')</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{!! URL::action('\Backend\Controllers\CategoriesController@index') !!}">
                            <i class="fa fa-circle-o"></i>
                            @lang('categories.list')
                        </a>
                    </li>
                    <li>
                        <a href="{!! URL::action('\Backend\Controllers\CategoriesController@create') !!}">
                            <i class="fa fa-circle-o"></i>
                            @lang('categories.add')
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview
            @if (in_array(\Request::url(), [URL::action('\Backend\Controllers\CourseController@index'), URL::action('\Backend\Controllers\CourseController@create')]))
                {!! 'active' !!}
            @endif">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>@lang('courses.courses')</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{!! URL::action('\Backend\Controllers\CourseController@index') !!}">
                            <i class="fa fa-circle-o"></i>
                            @lang('courses.list')
                        </a>
                    </li>
                    <li>
                        <a href="{!! URL::action('\Backend\Controllers\CourseController@create') !!}">
                            <i class="fa fa-circle-o"></i>
                            @lang('courses.add')
                        </a>
                    </li>
                </ul>
            </li>
            <!--Phan Dung add Products-->
            <!--Customer-->
            <li class="treeview
            @if (in_array(\Request::url(), [URL::action('\Backend\Controllers\CustomersController@index'), URL::action('\Backend\Controllers\CustomersController@create')]))
                {!! 'active' !!}
            @endif">
                <a href="#">
                    <i class="glyphicon glyphicon-hdd"></i>
                    <span>@lang('customers.customers')</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{!! URL::action('\Backend\Controllers\CustomersController@index') !!}">
                            <i class="fa fa-circle-o"></i>
                            @lang('customers.list')
                        </a>
                    </li>
                    
                </ul>
            </li>
            <!--End Customer-->
            <!--Products-->
            <li class="treeview
            @if (in_array(\Request::url(), [URL::action('\Backend\Controllers\ProductController@index'), URL::action('\Backend\Controllers\ProductController@create')]))
                {!! 'active' !!}
            @endif">
                <a href="#">
                    <i class="glyphicon glyphicon-hdd"></i>
                    <span>@lang('products.products')</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{!! URL::action('\Backend\Controllers\ProductController@index') !!}">
                            <i class="fa fa-circle-o"></i>
                            @lang('products.list')
                        </a>
                    </li>
                    <li>
                        <a href="{!! URL::action('\Backend\Controllers\ProductController@create') !!}">
                            <i class="fa fa-circle-o"></i>
                            @lang('products.add')
                        </a>
                    </li>
                </ul>
            </li>
            <!--End Products-->
                        
            <!--VA add KEY-->
                <li class="treeview
            @if (in_array(\Request::url(), [URL::action('\Backend\Controllers\CategoriesController@index')]))
                {!! 'active' !!}
            @endif">
                <a href="#">
                    <i class="glyphicon glyphicon-lock"></i>
                    <span>@lang('key.key')</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{!! URL::action('\Backend\Controllers\KeyController@index') !!}">
                            <i class="fa fa-circle-o"></i>
                            @lang('key.keys')
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Key -->
            <li class="treeview
                    @if (in_array(\Request::url(), [URL::action('\Backend\Controllers\LessonsController@index'), URL::action('\Backend\Controllers\LessonsController@create')]))
                        {!! 'active' !!}
                    @endif">
                <a href=#>
                    <i class="fa fa-clipboard"></i>
                    <span>@lang('lesson.lesson')</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{!! URL::action('\Backend\Controllers\LessonsController@index') !!}">
                            <i class="fa fa-circle-o"></i>
                            @lang('lesson.list')
                        </a>
                    </li>
                    <li>
                        <a href="{!! URL::action('\Backend\Controllers\LessonsController@create') !!}">
                            <i class="fa fa-circle-o"></i>
                            @lang('lesson.create')
                        </a>
                    </li>
                </ul>
            </li>  
            <li class="treeview
            @if (in_array(\Request::url(), [URL::action('\Backend\Controllers\QuestionController@index'), URL::action('\Backend\Controllers\QuestionController@create')]))
                {!! 'active' !!}
            @endif">
                <a href=#>
                    <i class="fa fa-question"></i>
                    <span>@lang('question.question')</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{!! URL::action('\Backend\Controllers\QuestionController@index') !!}">
                            <i class="fa fa-circle-o"></i>
                            @lang('question.list')
                        </a>
                    </li>
                    <li>
                        <a href="{!! URL::action('\Backend\Controllers\QuestionController@create') !!}">
                            <i class="fa fa-circle-o"></i>
                            @lang('question.create')
                        </a>
                    </li>
                </ul>
            </li>      
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>