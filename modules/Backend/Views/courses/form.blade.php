@extends('Backend::layouts.default')

@section('title', Lang::get($form['title']))

@include('Backend::courses.scripts')

@section('content')
    {!! Breadcrumbs::render('courses.update', $courses) !!}
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form action="{!! $form['action'] !!}" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
            {!! csrf_field(csrf_token()) !!}
            <!-- /.col -->
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">@lang('courses.create')</h3>
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
                                                    @lang('courses.errors')
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
                                                    @lang('courses.success')
                                                </div>
                                            </div>
                                        </div>
                                @endif
                                <!-- /.message -->

                                    <!-- .name -->
                                    <div class="form-group {!! !empty($messages) && $messages->has('courses.name') ? 'has-error' : '' !!}">
                                        <label for="name" class="col-sm-3 control-label">
                                            @lang('courses.name')
                                            <i class="fa fa-asterisk color-red font-size-7"></i>
                                        </label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="name" name="courses[name]"
                                                   value="{!! $courses['courses']['name'] or '' !!}"
                                                   placeholder="@lang('courses.name')">
                                            @if(!empty($messages) && $messages->has('courses.name'))
                                                <span class="help-block">
                                                    <i class="fa fa-times-circle-o margin-right-5"></i>
                                                    {!! $messages->first('courses.name') !!}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.name -->

                                    <!-- .price -->
                                    <div class="form-group {!! !empty($messages) && $messages->has('courses.price') ? 'has-error' : '' !!}">
                                        <label for="price" class="col-sm-3 control-label">@lang('courses.price')
                                            (@lang('common.units.vnd'))</label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" id="price" name="courses[price]"
                                                   value="{!! $courses['courses']['price'] or '' !!}"
                                                   placeholder="@lang('courses.price')">
                                            @if(!empty($messages) && $messages->has('courses.price'))
                                                <span class="help-block">
                                                    <i class="fa fa-times-circle-o margin-right-5"></i>
                                                    {!! $messages->first('courses.price') !!}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.price -->

                                    <!-- .sell_price -->
                                    <div class="form-group {!! !empty($messages) && $messages->has('courses.sell_price') ? 'has-error' : '' !!}">
                                        <label for="sell_price"
                                               class="col-sm-3 control-label">@lang('courses.sell_price')
                                            (@lang('common.units.vnd'))</label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" id="sell_price"
                                                   name="courses[sell_price]"
                                                   value="{!! $courses['courses']['sell_price'] or '' !!}"
                                                   placeholder="@lang('courses.sell_price')">
                                            @if(!empty($messages) && $messages->has('courses.sell_price'))
                                                <span class="help-block">
                                                    <i class="fa fa-times-circle-o margin-right-5"></i>
                                                    {!! $messages->first('courses.sell_price') !!}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.sell_price -->

                                    <!-- .sell_price -->
                                    <div class="form-group {!! !empty($messages) && $messages->has('courses.feature') ? 'has-error' : '' !!}">
                                        <label for="feature" class="col-sm-3 control-label">
                                            @lang('courses.feature')
                                        </label>
                                        <div class="col-sm-7">
                                            <input type="checkbox"
                                                   init="iCheck"
                                                   id="feature"
                                                   data-icheck-class="icheckbox_flat-blue"
                                                   data-increase-area="20%"
                                                   name="courses[feature]"
                                                   value="active"
                                                   @if (!empty($courses['courses']['feature']) && 'active' == $courses['courses']['feature'])
                                                   checked="checked"
                                                    @endif>
                                            @if(!empty($messages) && $messages->has('courses.feature'))
                                                <span class="help-block">
                                                    <i class="fa fa-times-circle-o margin-right-5"></i>
                                                    {!! $messages->first('courses.feature') !!}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.sell_price -->

                                    <!-- .duration -->
                                    <div class="form-group {!! !empty($messages) && $messages->has('courses.duration') ? 'has-error' : '' !!}">
                                        <label for="duration" class="col-sm-3 control-label">@lang('courses.duration')
                                            (@lang('common.units.hour'))</label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" id="duration"
                                                   name="courses[duration]"
                                                   value="{!! $courses['courses']['duration'] or '' !!}"
                                                   placeholder="@lang('courses.duration')">
                                            @if(!empty($messages) && $messages->has('courses.duration'))
                                                <span class="help-block">
                                                    <i class="fa fa-times-circle-o margin-right-5"></i>
                                                    {!! $messages->first('courses.duration') !!}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.duration -->

                                    <!-- .video -->
                                    <div class="form-group">
                                        <label for="video" class="col-sm-3 control-label">@lang('courses.video')</label>
                                        <div class="col-sm-7">
                                            <div class="video-upload {!! !empty($messages) && $messages->has('courses.video') ? 'has-error' : '' !!} box-video">
                                                <h5>Video Upload</h5>
                                                <input init="file-video" data-file-path="{!! $form['videoPath'] !!}"
                                                       data-file-name="{!! $courses['courses']['video'] or '' !!}"
                                                       type="file" class="form-control" name="courses[video]"
                                                       placeholder="@lang('courses.video')"
                                                       value="{!! $courses['courses']['video'] or '' !!}">
                                                <input type="hidden" name="courses[tmpVideo]" value="{!! $courses['courses']['video'] or '' !!}">
                                                @if(!empty($messages) && $messages->has('courses.video'))
                                                    <span class="help-block">
                                                    <i class="fa fa-times-circle-o margin-right-5"></i>
                                                        {!! $messages->first('courses.video') !!}
                                                </span>
                                                @endif
                                            </div>

                                            <div class="video">
                                                <h5>Video Link</h5>
                                                <input type="text"
                                                       class="form-control" id="videoLink"
                                                       name="courses[video_link]"
                                                       value="{!! $courses['courses']['video_link'] or '' !!}"
                                                       placeholder="http://gxd.vn/">
                                                <label class="pointer margin-top-10 f-unbold">
                                                    <?php $usedLink = !empty($courses['courses']['video_type']) && 'link' == $courses['courses']['video_type'] ? 'checked="checked"' : null; ?>
                                                    <input type="checkbox"
                                                           init="iCheck"
                                                           data-icheck-class="icheckbox_flat-blue"
                                                           data-increase-area="20%"
                                                           id="typeVideo"
                                                           name="courses[video_type]"
                                                           value="link"
                                                           {!! $usedLink !!}
                                                           >
                                                    Dùng video Link
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- /.video -->

                                    <!-- .image -->
                                    <div class="form-group  {!! !empty($messages) && $messages->has('courses.image') ? 'has-error' : '' !!}">
                                        <label for="file-image"
                                               class="col-sm-3 control-label">@lang('courses.image')</label>
                                        <div class="col-sm-7">
                                            @if (!empty($form['tmpImage']))
                                                <div class="col-md-4 col-sm-12">
                                                    <img class="img-responsive" style="margin: 0 auto; height: 150px;"
                                                         src="{!! $form['imagePath'] or '' !!}">
                                                </div>
                                            @endif
                                            <div class="col-md-8 col-sm-12">
                                                <input type="file" id="file-image" name="courses[image]">
                                                <span class="help-block">{!! !empty($messages) && $messages->has('courses.image') ? $messages->first('courses.image') : '' !!}</span>
                                            </div>
                                            <input type="hidden" name="courses[tmpImage]"
                                                   value="{!! $form['tmpImage'] or '' !!}">
                                        </div>
                                    </div>
                                    <!-- /.image -->

                                    <!-- .detail -->
                                    <div class="form-group">
                                        <label for="detail"
                                               class="col-sm-3 control-label">@lang('courses.detail')</label>
                                        <div class="col-sm-7">
                                            <textarea init="ckeditor" class="form-control" rows="3" id="description"
                                                      name="courses[detail]">{!! $courses['courses']['detail'] or '' !!}</textarea>
                                        </div>
                                    </div>
                                    <!-- /.detail -->

                                    <!-- .version -->
                                    <div class="form-group">
                                        <label for="version"
                                               class="col-sm-3 control-label">@lang('courses.version')</label>
                                        <div class="col-sm-7">
                                    <textarea init="ckeditor" class="form-control" rows="3" id="version"
                                              name="courses[version]">{!! $courses['courses']['version'] or '' !!}</textarea>
                                        </div>
                                    </div>
                                    <!-- /.version -->

                                    <!-- .status -->
                                    <div class="form-group">
                                        <label for="status" class="col-sm-3 control-label">
                                            @lang('courses.status')
                                            <i class="fa fa-asterisk color-red font-size-7"></i>
                                        </label>
                                        <div class="col-sm-7">
                                            <input type="radio"
                                                   init="iCheck"
                                                   data-icheck-class="iradio_flat-green"
                                                   data-increase-area="20%"
                                                   name="courses[status]"
                                                   value="active"
                                                   checked>
                                            @lang('common.on')
                                            <input type="radio"
                                                   init="iCheck"
                                                   data-icheck-class="iradio_flat-red"
                                                   data-increase-area="20%"
                                                   name="courses[status]"
                                                   value="inactive"
                                                   @if (isset($data['courses']['status']) && 'inactive' == $data['courses']['status']))
                                                   checked
                                                    @endif>
                                            @lang('common.off')
                                        </div>
                                    </div>
                                    <!-- /.status -->

                                    <!-- .categories -->
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">@lang('courses.category')</label>
                                        <div class="col-sm-7">
                                            <select class="form-control"
                                                    name="courses[categories][]"
                                                    init="selectize"
                                                    multiple="multiple"
                                                    data-placeholder="@lang('courses.selectCategory')">
                                                @foreach($categories as $category)
                                                    <option value="{!! $category->id !!}"
                                                            @if (!empty($categoriesId) && in_array($category->id, $categoriesId))
                                                            selected="selected"
                                                            @endif>
                                                        {!! $category->name !!}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.categories -->

                                    <!-- .section -->
                                    <div class="form-group sections">
                                        @include('Backend::courses.section')
                                    </div>
                                    <!-- /.section -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer no-padding">
                        <div class="mailbox-controls series-action-bottom text-right">
                            @if (!$form['isEdit'])
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