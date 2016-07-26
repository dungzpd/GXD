@extends('Backend::layouts.default')

@section('title', $isEdit ? Lang::get('categories.edit') : Lang::get('categories.add'))

@include('Backend::categories.scripts')

@section('content')

{!! Breadcrumbs::render($isEdit ? 'categories.edit' : 'categories.create') !!}

<section id="frm-category" class="content">
    <div class="row">
        <!-- form start -->
        <form class="form-horizontal" 
            action="{!! $url !!}" 
            method="post"
            enctype="multipart/form-data"> 
            {!! csrf_field(csrf_token()) !!}
            <!-- /.col -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <!-- /.col -->
                    <div class="box-header">
                        <h3 class="box-title">@lang('categories.enterInfo')</h3>                   
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->

                    <!-- .box-body -->
                    <div class="box-body no-padding">
                        <div class="col-md-8 col-md-offset-2">
                        <!-- .fieldset info category -->
                            <div class="box box-success with-border">
                                <div class="box-header">
                                    <h3 class="box-title">@lang('categories.infoCate')</h3>
                                    <div class="box-tools pull-right">
                                        <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="form-group {!! !empty($messages) && $messages->has('categories.name') ? 'has-error' : '' !!}">
                                        <label for="txt-name" class="control-label">@lang('categories.name')</label>
                                        <input id="txt-name" 
                                           type="text" 
                                           name="categories[name]" 
                                           class="form-control"
                                           value="{!! $data['categories']['name'] or '' !!}" 
                                           placeholder="@lang('categories.name')">
                                    <span class="help-block">{!! !empty($messages) && $messages->has('categories.name') ? $messages->first('categories.name') : '' !!}</span>
                                    </div>
                                    <!-- /.categories[name] -->

                                    <!-- .image -->
                                    <div class="form-group  {!! !empty($messages) && $messages->has('categories.image') ? 'has-error' : '' !!}">
                                    <label for="file-image" class="control-label">@lang('categories.image')</label>
                                        <input type="file" id="file-image" name="categories[image]">
                                        <span class="help-block">{!! !empty($messages) && $messages->has('categories.image') ? $messages->first('categories.image') : '' !!}</span>
                                        <input type="hidden" name="categories[tmpImage]" value="{!! $data['categories']['image'] or '' !!}">
                                    </div>
                                    <!-- /.image -->

                                    <!-- .description -->
                                    <div class="form-group {!! !empty($messages) && $messages->has('categories.description') ? 'has-error' : '' !!}">
                                        <label for="description" class="control-label">@lang('categories.description')</label>
                                        <textarea id="description" 
                                           init="ckeditor"
                                           name="categories[description]" 
                                           class="wysihtml5 form-control">{!! $data['categories']['description'] or '' !!}</textarea>
                                    <span class="help-block">{!! !empty($messages) && $messages->has('categories.description') ? $messages->first('categories.description') : '' !!}</span>
                                    </div>
                                    <!-- /.description -->

                                    <!-- .categories[order] -->
                                    <div class="form-group {!! !empty($messages) && $messages->has('categories.order') ? 'has-error' : '' !!}">
                                        <label for="txt-order" class="control-label">@lang('categories.order')</label>
                                        <input id="txt-order" 
                                           type="number" 
                                           name="categories[order]" 
                                           class="form-control"
                                           value="{!! $data['categories']['order'] or '' !!}" 
                                           placeholder="@lang('categories.order')">
                                    <span class="help-block">{!! !empty($messages) && $messages->has('categories.order') ? $messages->first('categories.order') : '' !!}</span>
                                    </div>
                                    <!-- /.categories[order] -->

                                    <!-- .status -->
                                    <div class="form-group">
                                        <label class="control-label">@lang('categories.status')</label>
                                        <div class="form-control no-border">
                                        <input type="radio" 
                                            init="iCheck"
                                            data-icheck-class="iradio_flat-green"
                                            data-increase-area="20%"
                                            name="categories[status]" 
                                            value="active"
                                            checked>
                                        @lang('common.on')
                                        <input type="radio" 
                                            init="iCheck"
                                            data-icheck-class="iradio_flat-red"
                                            data-increase-area="20%"
                                            name="categories[status]"
                                            value="inactive"
                                            @if (isset($data['categories']['status']) && ('inactive' == $data['categories']['status']))
                                            checked 
                                            @endif>
                                        @lang('common.off')
                                        </div>
                                    </div>
                                    <!-- /.status -->
                                </div>
                            </div>
                            <!-- /.fieldset info category -->
                        
                            <!-- .fieldset course -->
                            @if (!empty($data['courses']))
                            <div class="box box-success with-border">
                                <div class="box-header">
                                    <h3 class="box-title">@lang('categories.infoCourse')</h3>
                                    <div class="box-tools pull-right">
                                        <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
                                    </div>
                                </div>

                                <!-- .courses -->
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>@lang('categories.course')</label>
                                        <select class="form-control"
                                            name="categories[courses][]" 
                                            init="selectize"
                                            multiple="multiple" 
                                            data-placeholder="@lang('categories.selectCourse')">
                                            @foreach($data['courses'] as $course)
                                                <option value="{!! $course->id !!}"
                                                    @if (!empty($data['coursesId']) && in_array($course->id, $data['coursesId']))
                                                        selected="selected"
                                                    @endif>
                                                    {!! $course->name !!}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- /.courses -->
                                </div>
                            </div>
                            @endif
                            <!-- /.fieldset course -->
                            <input type="hidden" name="categories[id]" value="{!! $data['categories']['id'] or '' !!}">
                            
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <!-- .box-footer -->
                        <div class="box-footer">
                            <div class="form-group pull-right">
                                <!-- Check all button -->
                                @if (!$isEdit)
                                <button type="submit" name="saveAndCreate" class="btn btn-success btn-md">
                                    <i class="fa fa-save"></i>
                                    @lang('common.saveAndCreate')
                                </button>
                                @endif
                                <button type="submit" name="save" class="btn btn-success btn-md">
                                    <i class="fa fa-save"></i>
                                    @lang('common.save')
                                </button>
                                <a href="{!! URL::action('\Backend\Controllers\CategoriesController@index') !!}"
                                    class="btn btn-info btn-md">
                                    <i class="fa fa-remove"></i>
                                    @lang('common.cancel')
                                </a>
                                <button type="reset" class="btn btn-danger btn-md reset-form">
                                    <i class="fa fa-refresh"></i>
                                    @lang('common.reset')
                                </button> 
                            </div>
                        </div>
                        <!-- /.box-footer -->
                </div>
            </div>
            
        </form>
    </div>
</section>
@stop

@include('Backend::layouts.partials.helpers.loading')