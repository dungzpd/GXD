@extends('Backend::layouts.default')

@section('title', Lang::get('courses.list'))

@section('content')

{!! Breadcrumbs::render('courses') !!}

<div class="content">
    <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('key.product')</h3>

                    <div class="box-tools pull-right">
                        <form action="{!! URL::action('\Backend\Controllers\CourseController@index') !!}" method="get">
                            @if (!empty($products))
                                <div class="has-feedback">
                                    <div class="col-sm-12">
                                        <div class="col-sm-4 no-padding">
                                            <select name="status" class="form-control  input-sm">
                                                <option value="1">Key thương mại</option>
                                                <option value="0">Key dùng thử</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4 no-padding">
                                            <select name="category" class="form-control  input-sm">
                                                @foreach($products as $c)
                                                    <option value="{!! $c->id !!}"
                                                            @if (isset($product) && ($product == $c->id))
                                                            selected="selected"
                                                            @endif>{!! $c->name !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-4 no-padding">
                                            <input type="text" class="form-control input-sm" name="keyword" placeholder="@lang('courses.search')" value="{!! isset($keyword) ? $keyword : '' !!}">
                                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                        </div>
                                    </div>
                            @endif

                            </div>
                        </form>                        
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                
                <div class="table-list overflow-hidden">
                    <!-- .header-list -->
			<div class="row-group header-list">
			    <div class="row item">
				<div class="col-md-12">
				    <div class="col-md-1 padding-left-5">
					<button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
				    </div>
				    <div class="col-md-3">
					@lang('key.name')
				    </div>
				    <div class="col-md-2">
					@lang('key.date')
				    </div>
				    <div class="col-md-2">
					@lang('key.com_1')
				    </div>
				   
				    <div class="col-md-2">
					@lang('key.com')
				    </div> 
                                     <div class="col-md-2">
					@lang('key.function')
				    </div> 
				</div>
			    </div>
			</div>
			<!-- /.header-list -->
                        <!-- .content-list -->
                            <div class="row-group content-list">
                                @if(!empty($keys) && $keys->count() > 0)
                                @foreach($keys as $key)
                                <div class="row item">
                                    <div class="col-md-12">
                                        <div class="col-md-1 padding-left-10">
                                            <input type="checkbox" 
                                                    init="iCheck"
                                                            data-icheck-class="icheckbox_flat-blue"
                                                            data-increase-area="20%"
                                                            value="{!! $key->id !!}">
                                        </div>
                                        <div class="col-md-3">
                                            <a href="{!! URL::action('\Backend\Controllers\CategoriesController@edit', array('id' => $key->id))!!}">{!! $key->license_serial !!}</a>
                                        </div>
                                        <div class="col-md-2">
                                            {!! $key->type_expire_date !!}
                                        </div>
                                        <div class="col-md-2">
                                            {!! $key->license_is_registered !!}
                                        </div>
                                        <div class="col-md-2">
                                            {!! $key->license_no_computers !!}
                                        </div>
                                       
                                        <div class="col-md-2">
                                        <a href="{!! URL::action('\Backend\Controllers\KeyController@edit', array('id' => $key->id)) !!}"
										   init="tooltip"
										   title="@lang('common.edit')"
										   class="btn btn-success btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button init="tooltip"
												title="@lang('common.delete')"
                                            class="btn btn-danger btn-sm"
                                            data-toggle="modal" data-target="#modal-delete-{!! $key->id !!}">
                                            <i class="fa fa-trash"></i>  
                                        </button>

                                    </div> 
                                    </div>
                                </div>
                                @endforeach

                                @endif
                            </div>
                            <!-- /.content-list -->                                      
                </div>
                
            </div>
            <!-- /. box -->
        </div>
        <!-- /.col -->
    </div>
</div>
@stop