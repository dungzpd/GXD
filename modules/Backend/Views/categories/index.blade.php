@extends('Backend::layouts.default')

@section('title', Lang::get('categories.categories'))

@section('content')

{!! Breadcrumbs::render('categories') !!}
<!-- Main content -->
<section class="content">
    <div class="row">
	<!-- .col -->
	<div class="col-md-12">
	    <div class="box box-primary">
		<!-- .box-header -->
		<div class="box-header with-border">
		    <h3 class="box-title">@lang('categories.list')</h3>

		    <div class="box-tools pull-right">
			<form action="{!! URL::action('\Backend\Controllers\CategoriesController@index') !!}" method="get">
			    {!! csrf_field(csrf_token()) !!} 
			    <div class="has-feedback">
				<input type="text" 
				       name="keyword"
				       class="form-control input-sm" 
				       placeholder="@lang('categories.searchCategories')"
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
			<a href="{!! URL::action('\Backend\Controllers\CategoriesController@create') !!}">
			    <button type="button"
						init="tooltip"
						title="@lang('categories.add')"
						class="btn btn-info btn-sm"><i class="fa fa-plus"></i></button>
			</a>
			<button type="button"
					init="tooltip"
					title="@lang('categories.delete')"
					class="btn btn-danger btn-sm" data-link="{!! URL::action('\Backend\Controllers\CategoriesController@deleteMultiple') !!}"><i class="fa fa-trash"></i></button>
			<a href="{!! URL::action('\Backend\Controllers\CategoriesController@index') !!}">
			    <button type="button"
						init="tooltip"
						title="@lang('categories.reload')"
						class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
			</a>
			<div class="pull-right">                            
			    @include('Backend::layouts.partials.pagination', array('data' => $categories))
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
				    <div class="col-md-1 padding-left-5">
					<button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
				    </div>
				    <div class="col-md-4">
					@lang('categories.name')
					{!! \Alloy\Facades\MainFacade::generateSort(['link' => '\Backend\Controllers\CategoriesController@index', 'field' => 'name', 'sort' => $sort, 'field_vs' => $field, 'keyword' => (isset($keyword) && !empty($keyword)) ? $keyword : null ]) !!}
				    </div>
				    <div class="col-md-3">
					@lang('categories.description')
				    </div>
				    <div class="col-md-2">
					@lang('common.order')
					{!! \Alloy\Facades\MainFacade::generateSort(['link' => '\Backend\Controllers\CategoriesController@index', 'field' => 'order', 'sort' => $sort, 'field_vs' => $field, 'keyword' => (isset($keyword) && !empty($keyword)) ? $keyword : null]) !!}
				    </div>
				   <!-- <div class="col-md-2">
					{{--@lang('common.status')--}}
					{{--{!! \Alloy\Facades\MainFacade::generateSort(['link' => '\Backend\Controllers\CategoriesController@index', 'field' => 'status', 'sort' => $sort, 'field_vs' => $field, 'keyword' => (isset($keyword) && !empty($keyword)) ? $keyword : null]) !!}--}}
				    </div>-->
				    <div class="col-md-2">
					@lang('common.functional')
				    </div> 
				</div>
			    </div>
			</div>
			<!-- /.header-list -->

			<!-- .content-list -->
			<div class="row-group content-list">
			    @if(!empty($categories) && $categories->count() > 0)
			    @foreach($categories as $item)
                            <div class="row item">
                                <div class="col-md-12">
                                    <div class="col-md-1 padding-left-10">
                                        <input type="checkbox" 
                                        	init="iCheck"
			                                data-icheck-class="icheckbox_flat-blue"
			                                data-increase-area="20%"
			                                value="{!! $item->id !!}">
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{!! URL::action('\Backend\Controllers\CategoriesController@edit', array('id' => $item->id))!!}">{!! $item->name !!}</a>
                                    </div>
                                    <div class="col-md-3">
                                        {!! str_limit(strip_tags($item->description), 50) !!}
                                    </div>
                                    <div class="col-md-2">
                                        {!! $item->order !!}
                                    </div>
                                    <div class="col-md-2">
										<a href="{!! URL::action('\Backend\Controllers\CategoriesController@status', ['id' => $item->id, 'currentPage' => $categories->currentPage()]) !!}">
											<button type="button"
													init="tooltip"
													title="@lang('common.status')"
													class="btn btn-{!! $item->status == 'active' ? 'info' : 'warning' !!} btn-sm checkbox-toggle"><i class="fa fa-toggle-{!! $item->status == 'active' ? 'on' : 'off' !!}"></i></button>
										</a>
                                        <a href="{!! URL::action('\Backend\Controllers\CategoriesController@edit', array('id' => $item->id)) !!}"
										   init="tooltip"
										   title="@lang('common.edit')"
										   class="btn btn-success btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button init="tooltip"
												title="@lang('common.delete')"
                                            class="btn btn-danger btn-sm"
                                            data-toggle="modal" data-target="#modal-delete-{!! $item->id !!}">
                                            <i class="fa fa-trash"></i>  
                                        </button>
                                        <!-- .confirm-delete -->
                                        @include('Backend::categories.delete', ['item' => $item, 'currentPage' => $categories->currentPage()])
                                        <!-- /.confirm-delete -->
                                    </div> 
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
                        <a href="{!! URL::action('\Backend\Controllers\CategoriesController@create') !!}">
                            <button type="button"
									init="tooltip"
									title="@lang('categories.add')"
									class="btn btn-info btn-sm"><i class="fa fa-plus"></i></button>
                        </a>
                        <button type="button"
								init="tooltip"
								title="@lang('categories.delete')"
								class="btn btn-danger btn-sm" data-link="{!! URL::action('\Backend\Controllers\CategoriesController@deleteMultiple') !!}"><i class="fa fa-trash"></i></button>
                        <a href="{!! URL::action('\Backend\Controllers\CategoriesController@index') !!}">
                            <button type="button"
									init="tooltip"
									title="@lang('categories.reload')"
									class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                        </a>
                        <div class="pull-right">                            
                            @include('Backend::layouts.partials.pagination', array('data' => $categories))
                            <!-- /.btn-group -->
                        </div>
                    </div>
		    <!-- /.navigation -->
		</div>
		<!-- /.box-body -->            

	    </div>
	</div>
	<!-- /.col -->
    </div>
</section>

@stop