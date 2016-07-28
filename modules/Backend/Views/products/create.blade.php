@extends('Backend::layouts.default')

@section('title', $isEdit ? Lang::get('products.add') : Lang::get('products.add'))

@include('Backend::products.scripts')

@section('content')
   
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form action="{!! $url !!}" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
            {!! csrf_field(csrf_token()) !!}
            <!-- /.col -->
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"></h3>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <div class="table-list form-horizontal overflow-hidden">
                                <div class="row-group content-list">
                                    @if(isset($success) && !$success)
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="alert alert-danger text-center" role="alert">
                                                    <i class="fa fa-times-circle-o color-white"></i>
                                                    <button type="button" class="close" data-dismiss="alert"
                                                            aria-label="Close"><span aria-hidden="true">&times;</span>
                                                    </button>
                                                    @lang('products.errors')
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if(isset($success) && $success)
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="alert alert-success text-center" role="alert">
                                                    <i class="fa fa-check color-white"></i>
                                                    <button type="button" class="close" data-dismiss="alert"
                                                            aria-label="Close"><span aria-hidden="true">&times;</span>
                                                    </button>
                                                    @lang('products.success')
                                                </div>
                                            </div>
                                        </div>
                                @endif
                                <!-- /.message -->

                                    <!-- .name -->
                                    <div class="form-group {!! !empty($messages) && $messages->has('products.name') ? 'has-error' : '' !!}">
                                        <label for="name" class="col-sm-3 control-label">
                                            @lang('products.name')
                                            <i class="fa fa-asterisk color-red font-size-7"></i>
                                        </label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="name" name="products[name]"
                                                   value="{!! $products['products']['name'] or '' !!}"
                                                   placeholder="@lang('products.name')">
                                            @if(!empty($messages) && $messages->has('products.name'))
                                                <span class="help-block">
                                                    <i class="fa fa-times-circle-o margin-right-5"></i>
                                                    {!! $messages->first('products.name') !!}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.name -->

                                    <!-- .price -->
                                    <div class="form-group {!! !empty($messages) && $messages->has('products.price') ? 'has-error' : '' !!}">
                                        <label for="price" class="col-sm-3 control-label">@lang('products.price')
                                            (@lang('common.units.vnd'))</label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" id="price" name="products[price]"
                                                   value="{!! $products['products']['price'] or '' !!}"
                                                   placeholder="@lang('products.price')">
                                            @if(!empty($messages) && $messages->has('products.price'))
                                                <span class="help-block">
                                                    <i class="fa fa-times-circle-o margin-right-5"></i>
                                                    {!! $messages->first('products.price') !!}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.price -->

                                    <!-- .detail -->
                                    <div class="form-group">
                                        <label for="detail"
                                               class="col-sm-3 control-label">@lang('products.detail')</label>
                                        <div class="col-sm-7">
                                            <textarea init="ckeditor" class="form-control" rows="3" id="description"
                                                      name="products[detail]">{!! $products['products']['detail'] or '' !!}</textarea>
                                        </div>
                                    </div>
                                    <!-- /.detail -->
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer no-padding">
                        <div class="mailbox-controls series-action-bottom text-right">
                            @if (!$isEdit)
                                <button type="submit" name="saveAndCreate" class="btn btn-success btn-sm">
                                    <i class="fa fa-save"></i>
                                    @lang('common.saveAndCreate')
                                </button>
                            @endif
                            <button type="submit" name="save" class="btn btn-success btn-sm">
                                <i class="fa fa-save"></i>
                                @lang('common.save')
                            </button>
                            <a href="{!! URL::action('\Backend\Controllers\CourseController@index') !!}">
                                <button type="button" class="btn btn-danger btn-sm">
                                    <i class="fa fa-remove"></i>
                                    @lang('common.cancel')
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /. box -->
                <!-- /.col -->
            </form>
        </div>
    </section>

@stop