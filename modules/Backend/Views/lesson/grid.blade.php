<!-- .box-header -->
<div class="box-header with-border">
    <h3 class="box-title"></h3>

    <div class="box-tools pull-right">
    <form action="{!! URL::action('\Backend\Controllers\LessonsController@index') !!}" method="get">
        {!! csrf_field(csrf_token()) !!} 
        <div class="has-feedback">
        <input type="text" 
               name="keyword"
               class="form-control input-sm" 
               placeholder="@lang('lesson.searchLessons')"
               value="{!! $keyword or '' !!}">
        <span class="glyphicon glyphicon-search form-control-feedback"></span>
        </div>
    </form>
    </div>
    <!-- /.box-tools -->
</div>
<!-- /.box-header -->

<!-- .box-body -->
<div class="box-body no-padding">
    <!-- .toobar-action -->                
    <div class="mailbox-controls series-action-top">
    <!-- Check all button -->       
    <a href="{!! URL::action('\Backend\Controllers\LessonsController@create') !!}">
        <button type="button"
                init="tooltip"
                title="@lang('lessson.add')"
                class="btn btn-info btn-sm"><i class="fa fa-plus"></i></button>
    </a>
    <button type="button"
            init="tooltip"
            title="@lang('lesson.delete')"
            class="btn btn-danger btn-sm" data-link="{!! URL::action('\Backend\Controllers\LessonsController@deleteMultiple') !!}"><i class="fa fa-trash"></i></button>
    <a href="{!! URL::action('\Backend\Controllers\LessonsController@index') !!}">
        <button type="button"
                init="tooltip"
                title="@lang('lesson.reload')"
                class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
    </a>
    <div class="pull-right">                            
        @include('Backend::layouts.partials.pagination', array('data' => $lessons))
        <!-- /.btn-group -->
    </div>
    </div>
    <!-- /.toobar-action -->

    <!-- .table-list -->
    <div class="table-list overflow-hidden">
    <!-- .header-list -->
    <div class="row-group header-list">
        <div class="row item">
        <div class="col-md-12">
            <!-- .checkbox -->
            <div class="col-md-1 padding-left-5">
            <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
            </div>
            <!-- /.checkbox -->

            <!-- .name -->
            <div class="col-md-3">
            @lang('lesson.title')
            {!! \Alloy\Facades\MainFacade::generateSort(['link' => '\Backend\Controllers\LessonsController@index', 'field' => 'name', 'sort' => $sort, 'field_vs' => $field, 'keyword' => (isset($keyword) && !empty($keyword)) ? $keyword : null ]) !!}
            </div>
            <!-- /.name -->

            <!-- .posts -->
            <div class="col-md-3">
            @lang('lesson.posts')
            {!! \Alloy\Facades\MainFacade::generateSort(['link' => '\Backend\Controllers\LessonsController@index', 'field' => 'name', 'sort' => $sort, 'field_vs' => $field, 'keyword' => (isset($keyword) && !empty($keyword)) ? $keyword : null ]) !!}
            </div>
            <!-- /.posts -->

            <!-- .question-limit -->
            <!-- <div class="col-md-2">
            @lang('lesson.questionLimit')
            {!! \Alloy\Facades\MainFacade::generateSort(['link' => '\Backend\Controllers\LessonsController@index', 'field' => 'name', 'sort' => $sort, 'field_vs' => $field, 'keyword' => (isset($keyword) && !empty($keyword)) ? $keyword : null ]) !!}
            </div> -->
            <!-- /.question-limit -->

            <!-- .status -->
            <div class="col-md-2">
            @lang('common.createdBy')
            {!! \Alloy\Facades\MainFacade::generateSort(['link' => '\Backend\Controllers\LessonsController@index', 'field' => 'status', 'sort' => $sort, 'field_vs' => $field, 'keyword' => (isset($keyword) && !empty($keyword)) ? $keyword : null]) !!}
            </div>
            <!-- /.status  -->

            <!-- .action -->
            @if ($showActionColumn)
            <div class="col-md-3">
            @lang('common.functional')
            </div>
            @endif
            <!-- /.action  -->
        </div>
        </div>
    </div>
    <!-- /.header-list -->

    <!-- .content-list -->
    <div class="row-group content-list">
        @if(!empty($lessons) && $lessons->count() > 0)
        @foreach($lessons as $item)
                    <div class="row item">
                        <div class="col-md-12">

                            <!-- .checkbox -->
                            <div class="col-md-1 padding-left-10">
                                <input type="checkbox" 
                                    init="iCheck"
                                    data-icheck-class="icheckbox_flat-blue"
                                    data-increase-area="20%"
                                    value="{!! $item->id !!}">
                            </div>
                            <!-- /.checkbox -->

                            <!-- .name -->
                            <div class="col-md-3">
                                <a href="{!! URL::action('\Backend\Controllers\LessonsController@edit', array('id' => $item->id))!!}">{!! $item->name !!}</a>
                            </div>
                            <!-- /.name -->

                            <!-- .posts -->
                            <div class="col-md-3">
                                {!! str_limit(strip_tags($item->posts), 50) !!}
                            </div>
                            <!-- /.posts -->

                            <!-- .created-by -->
                            <div class="col-md-2">
                                {!! $item->author->name or '' !!}
                            </div> 
                            <!-- /.created-by  -->

                            <!-- .action -->

                            @if ($showActionColumn)
                            <div class="col-md-3">
                                @if ($showStatus)
                                <a href="{!! URL::action('\Backend\Controllers\LessonsController@status', array('id' => $item->id, 'currentPage' => $lessons->currentPage())) !!}">
                                    <button type="button"
                                            init="tooltip"
                                            title="@lang('common.status')"
                                            class="btn btn-{!! $item->status == 'active' ? 'info' : 'warning' !!} btn-sm"><i class="fa fa-toggle-{!! $item->status == 'active' ? 'on' : 'off' !!}"></i></button>
                                </a>
                                @else
                                    <button type="button"
                                            init="tooltip"
                                            title="@lang('common.status')"
                                            class="btn btn-{!! $item->status == 'active' ? 'info' : 'warning' !!} btn-sm"><i class="fa fa-toggle-{!! $item->status == 'active' ? 'on' : 'off' !!}"></i></button>
                                @endif

                                @if ($showEdit)
                                <a href="{!! URL::action('\Backend\Controllers\LessonsController@edit', array('id' => $item->id)) !!}"
                                   init="tooltip"
                                   title="@lang('common.edit')"
                                   class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                @endif

                                @if ($showShare)
                                <button init="tooltip"
                                        title="@lang('common.share')"
                                    class="btn btn-info btn-sm"
                                    data-toggle="modal" data-target="#modal-share-{!! $item->id !!}">
                                    <i class="fa fa-share-alt"></i>  
                                </button>
                                @include('Backend::lesson.share', array('lesson' => $item, 'users' => $users))
                                @endif

                                @if ($showDel)
                                <button init="tooltip"
                                        title="@lang('common.delete')"
                                    class="btn btn-danger btn-sm"
                                    data-toggle="modal" data-target="#modal-delete-{!! $item->id !!}">
                                    <i class="fa fa-trash"></i>  
                                </button>
                                <!-- .confirm-delete -->
                                @include('Backend::lesson.delete', array('item' => $item, 'currentPage' => $lessons->currentPage()))
                                <!-- /.confirm-delete -->
                                @endif
                            </div>
                            @endif
                            <!-- /.action -->
                        </div>
                    </div>
        @endforeach

        @endif
    </div>
    <!-- /.content-list -->                                      
    </div>
    <!-- /.table-list -->

    <!-- .navigation -->
            <div class="border-top series-action-bottom">
                <!-- Check all button -->       
                <a href="{!! URL::action('\Backend\Controllers\LessonsController@create') !!}">
                    <button type="button"
                            init="tooltip"
                            title="@lang('lesson.add')"
                            class="btn btn-info btn-sm"><i class="fa fa-plus"></i></button>
                </a>
                <button type="button"
                        init="tooltip"
                        title="@lang('lesson.delete')"
                        class="btn btn-danger btn-sm" data-link="{!! URL::action('\Backend\Controllers\LessonsController@deleteMultiple') !!}"><i class="fa fa-trash"></i></button>
                <a href="{!! URL::action('\Backend\Controllers\LessonsController@index') !!}">
                    <button type="button"
                            init="tooltip"
                            title="@lang('lesson.reload')"
                            class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                </a>
                <div class="pull-right">                            
                    @include('Backend::layouts.partials.pagination', array('data' => $lessons))
                    <!-- /.btn-group -->
                </div>
            </div>
    <!-- /.navigation -->
</div>
<!-- /.box-body -->            
