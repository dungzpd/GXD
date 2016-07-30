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
                                        <div class="col-sm-6 no-padding">
                                            <select name="category" class="form-control  input-sm">
                                                @foreach($products as $c)
                                                    <option value="{!! $c->id !!}"
                                                            @if (isset($product) && ($product == $c->id))
                                                            selected="selected"
                                                            @endif>{!! $c->name !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-6 no-padding">
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
 
            </div>
            <!-- /. box -->
        </div>
        <!-- /.col -->
    </div>
</div>
@stop