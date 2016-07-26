@extends('Backend::layouts.default')

@section('title', Lang::get('lesson.create'))

@include('Backend::lesson.scripts')


@section('content')

    {!! Breadcrumbs::render('lessons.create') !!}
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form action="{!! $url !!}" method="post" enctype="multipart/form-data">
            {!! csrf_field(csrf_token()) !!}
            <!-- /.col -->
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">@lang('lesson.enterInfo')</h3>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <!-- .lesson -->
                            <div class="col-md-8 col-md-offset-2">
                                <!-- .message -->
                                @if (isset($success) && $success)
                                    <div class="alert alert-success text-center" role="alert">
                                        <i class="fa fa-check color-white"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        @lang('lesson.success')
                                    </div>
                                @endif
                            <!-- /.message -->

                                <!-- .fieldset info lesson -->
                                <div class="box-body">

                                    <!-- .title -->
                                    <div class="form-group {!! !empty($messages) && $messages->has('lessons.name') ? 'has-error' : ''; !!}">
                                        <label for="name" class="control-label">
                                            @lang('lesson.title')
                                            <i class="fa fa-asterisk color-red font-size-7"></i>
                                        </label>
                                        <input type="text" class="form-control" id="name" name="lessons[name]"
                                               value="{!! $data['lessons']['name'] or '' !!}"
                                               placeholder="@lang('lesson.title')">
                                        @if(!empty($messages) && $messages->has('lesson.name'))
                                            <span class="help-block">
                                                <i class="fa fa-times-circle-o margin-right-5"></i>
                                                {!! $messages->first('lesson.name') !!}
                                            </span>
                                        @endif
                                    </div>
                                    <!-- /.title -->

                                    <!-- .video -->
                                    <div class="form-group box-video">
                                        <label for="video" class="control-label">@lang('lesson.video')</label>

                                        <div class="video-upload {!! !empty($messages) && $messages->has('lessons.video') ? 'has-error' : '' !!}">
                                            <h5>Video Upload</h5>
                                            <input init="file-video" type="file"
                                                   data-file-path="{!! $data['lessons']['videoPath'] !!}"
                                                   data-file-name="{!! $data['lessons']['video'] or '' !!}"
                                                   id="video" class="form-control"
                                                   name="lessons[video]" placeholder="@lang('lesson.video')">
                                        </div>
                                        <div class="video">
                                            <h5>Video Link</h5>
                                            <input type="text"
                                                   class="form-control" id="videoLink"
                                                   name="lessons[video_link]"
                                                   value="{!! $data['lessons']['video_link'] or '' !!}"
                                                   placeholder="http://gxd.vn/">
                                            <label style="font-weight: 400;margin-top: 10px;">
                                                <input type="checkbox"
                                                       init="iCheck"
                                                       data-icheck-class="icheckbox_flat-blue"
                                                       data-increase-area="20%"
                                                       id="typeVideo"
                                                       name="lessons[video_type]"
                                                       value="link"
                                                       @if (!empty($data['lessons']['video_type']) && 'link' == $data['lessons']['video_type'])
                                                       checked="checked"
                                                        @endif>
                                                Dùng video Link
                                            </label>
                                        </div>

                                        @if(!empty($messages) && $messages->has('lesson.video'))
                                            <span class="help-block">
                                                <i class="fa fa-times-circle-o margin-right-5"></i>
                                                {!! $messages->first('lesson.video') !!}
                                            </span>
                                        @endif
                                    </div>
                                    <!-- /.video -->

                                    <!-- .posts -->
                                    <div class="form-group">
                                        <label for="posts" class="control-label">@lang('lesson.posts')</label>
                                        <textarea init="ckeditor" class="form-control" rows="3" id="posts"
                                                  name="lessons[posts]" placeholder="@lang('lesson.posts') ...">
                                        {!! $data['lessons']['posts'] or '' !!}
                                        </textarea>
                                    </div>
                                    <!-- /.posts -->

                                    <!-- .attach -->
                                    <div class="form-group {!! !empty($messages) && $messages->has('lessons.attach') ? 'has-error' : '' !!}">
                                        <label for="attach" class="control-label">@lang('lesson.attach')</label>
                                        <input type="file" min="0" class="form-control no-padding no-border" id="attach"
                                               name="lessons[attach]" placeholder="@lang('lesson.attach')">
                                        @if(!empty($messages) && $messages->has('lesson.attach'))
                                            <span class="help-block">
                                                <i class="fa fa-times-circle-o margin-right-5"></i>
                                                {!! $messages->first('lesson.attach') !!}
                                            </span>
                                        @endif
                                    </div>
                                    <!-- /.attach -->

                                    <!-- .exams-questionLimit -->
                                    <div class="form-group">
                                        <div class="row">
                                            <!-- .exams -->
                                            <div class="col-md-3">
                                                <label class="control-label">@lang('lesson.exams')</label>
                                                <div class="form-control no-padding no-border">
                                                    <label for="exams-on">
                                                        <input type="radio"
                                                               init="iCheck"
                                                               data-icheck-class="iradio_flat-green"
                                                               data-increase-area="20%"
                                                               id="exams-on"
                                                               name="lessons[exams]"
                                                               value="1"
                                                               checked>
                                                        @lang('common.on')
                                                    </label>

                                                    <label for="exams-off">
                                                        <input type="radio"
                                                               init="iCheck"
                                                               data-icheck-class="iradio_flat-red"
                                                               data-increase-area="20%"
                                                               id="exams-off"
                                                               name="lessons[exams]"
                                                               value="0"
                                                               @if (isset($data['lessons']['exams']) && ('0' == $data['lessons']['exams']))
                                                               checked
                                                                @endif>
                                                        @lang('common.off')
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- /.exams -->

                                            <!-- .limit-question -->
                                            <div class="col-md-3">
                                                <label class="control-label">@lang('lesson.questionLimit')</label>
                                                <input type="number" min="0" class="form-control" id="question_limit"
                                                       name="lessons[question_limit]"
                                                       value="{!! $data['lessons']['question_limit'] or '' !!}"
                                                       placeholder="@lang('lesson.questionLimit')">
                                            </div>
                                            <!-- /.limit-question -->
                                        </div>
                                    </div>
                                    <!-- /.exams-questionLimit -->

                                    <!-- .status -->
                                    <div class="form-group">
                                        <label class="control-label">
                                            @lang('lesson.status')
                                            <i class="fa fa-asterisk color-red font-size-7"></i>
                                        </label>
                                        <div class="form-control no-padding no-border">
                                            <label for="status-on">
                                                <input type="radio"
                                                       init="iCheck"
                                                       data-icheck-class="iradio_flat-green"
                                                       data-increase-area="20%"
                                                       id="status-on"
                                                       name="lessons[status]"
                                                       value="active"
                                                       class="flat-green"
                                                       checked>
                                                @lang('common.on')
                                            </label>
                                            <label for="status-off">
                                                <input type="radio"
                                                       init="iCheck"
                                                       data-icheck-class="iradio_flat-red"
                                                       data-increase-area="20%"
                                                       id="status-off"
                                                       name="lessons[status]"
                                                       value="inactive"
                                                       @if (isset($data['lessons']['status']) && ('inactive' == $data['lessons']['status']))
                                                       checked
                                                        @endif>
                                                @lang('common.off')
                                            </label>
                                        </div>
                                    </div>
                                    <!-- /.status -->
                                </div>
                                <!-- /.fieldset-info lesson -->

                                <!-- .fieldset info course -->
                                <?php $isEmpty = true ?>
                                @if (!empty($data['courses']) && !$isEmpty)
                                    <div class="box box-success with-border">
                                        <div class="box-header">
                                            <h3 class="box-title">@lang('lesson.infoCourse')</h3>
                                            <div class="box-tools pull-right">
                                                <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
                                            </div>
                                        </div>
                                        <div class="box-body">

                                            <div class="form-group">
                                                <label>@lang('lesson.course')</label>
                                                <select class="form-control"
                                                        name="lessons[courses][]"
                                                        init="selectize"
                                                        multiple="multiple"
                                                        data-placeholder="@lang('lesson.selectCourse')"
                                                        style="width: 100%;">
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

                                        </div>
                                    </div>
                                @endif
                            <!-- /.fieldset info course -->

                                @if ($isEdit)
                                <!-- .fieldset info share -->
                                    <div class="box box-success with-border">
                                        <div class="box-header">
                                            <h3 class="box-title">@lang('lesson.infoShare')</h3>
                                            <div class="box-tools pull-right">
                                                <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
                                            </div>
                                        </div>
                                        <div class="box-body">
                                            <!-- .share -->
                                            <div class="form-group">
                                                <label class="control-label">
                                                    @lang('lesson.shareLesson')
                                                </label>
                                                <div class="form-control no-padding no-border">
                                                    <label for="share-on">
                                                        <input type="radio"
                                                               init="iCheck"
                                                               data-icheck-class="iradio_flat-green"
                                                               data-increase-area="20%"
                                                               id="share-on"
                                                               name="lessons[allow_share]"
                                                               value="1"
                                                               class="flat-green"
                                                               checked>
                                                        @lang('common.on')
                                                    </label>
                                                    <label for="share-off">
                                                        <input type="radio"
                                                               init="iCheck"
                                                               data-icheck-class="iradio_flat-red"
                                                               data-increase-area="20%"
                                                               id="share-off"
                                                               name="lessons[allow_share]"
                                                               value="0"
                                                               class="flat-red"
                                                               @if (isset($data['lessons']['allow_share']) && ('0' == $data['lessons']['status']))
                                                               checked
                                                                @endif>
                                                        @lang('common.off')
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- /.share -->

                                            <!-- .user-inherit -->
                                            <div class="form-group">
                                                <label>@lang('lesson.userInherit')</label>
                                                <select class="form-control"
                                                        name="lessons[users][]"
                                                        init="selectize"
                                                        multiple="multiple"
                                                        data-placeholder="@lang('lesson.userInherit')"
                                                        style="width: 100%;">
                                                    @foreach($data['users'] as $user)
                                                        <option value="{!! $user->id !!}"
                                                                @if (!empty($data['usersId']) && in_array($user->id, $data['usersId']))
                                                                selected="selected"
                                                                @endif>
                                                            {!! $user->name !!}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!-- /.user-inherit -->

                                            <!-- .note -->
                                        <!-- <div class="form-group">
                                        <label for="note" class="control-label">@lang('lesson.note')</label>
                                        <textarea init="ckeditor" class="form-control" rows="3" id="note" name="lessons[note]" placeholder="@lang('lesson.note') ...">
                                        {!! $data['lessons']['note'] or '' !!}
                                                </textarea>
                                            </div> -->
                                            <!-- /.note -->

                                        </div>
                                    </div>
                                    <!-- /.fieldset info share -->
                                @endif

                                <input type="hidden" name="lessons[id]"
                                       data-folder="{!! $data['lessons']['folderVideo'] or '' !!}"
                                       value="{!! $data['lessons']['id'] or '' !!}">
                                <input type="hidden" name="lessons[tmpVideo]"
                                       value="{!! $data['lessons']['video'] or '' !!}">
                                <input type="hidden" name="lessons[tmpAttach]"
                                       value="{!! $data['lessons']['attach'] or '' !!}">
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer no-padding">
                            <div class="mailbox-controls series-action-bottom text-right">
                                @if(!$isEdit)
                                    <button type="submit" name="saveAndCreate" class="btn btn-success btn-sm">
                                        <i class="fa fa-save"></i>
                                        @lang('common.saveAndCreate')
                                    </button>
                                @endif
                                <button type="submit" name="save" class="btn btn-success btn-sm">
                                    <i class="fa fa-save"></i>
                                    @lang('common.save')
                                </button>
                                <a href="{!! URL::action('\Backend\Controllers\LessonsController@index') !!}">
                                    <button type="button" class="btn btn-danger btn-sm">
                                        <i class="fa fa-remove"></i>
                                        @lang('common.cancel')
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /. box -->
                </div>
                <!-- /.col -->
            </form>
        </div>
    </section>

@stop