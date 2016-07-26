
<div data-type="root-section">
    <label class="col-sm-3 control-label">
        Section
    </label>
    <div class="col-sm-7">
        <div class="list-section row">
            <!-- .list-sections -->
            <div class="col-sm-6">
                <div class="list-sections" data-type="list-section">
                    <!-- .row-section-hidden -->
                    <div class="hidden row-section" data-type="row-section-hidden">
                        <div class="name-section span4">
                            <h5 for="name_section">@lang('courses.nameSection')</h5>
                            <input name="sections[{!! $sections['maxId'] + 1 !!}][name]"
                                   data-type="sectionName"
                                   class="form-control"
                                   value=""
                                   disabled="disabled"
                                   data-maxid="{!! $sections['maxId'] + 1 !!}"
                                   placeholder="@lang('courses.nameSection')">
                        </div>
                        <!-- /.name-section -->
                        <div class="list-lessons">
                            <div class="span4">
                                <h5>Sắp xếp các bài học</h5>
                                <ul init="sortable-list" class="box-sortable" data-section-id="{!! $sections['maxId'] + 1 !!}" data-group="lessons"
                                    data-disabled="false"
                                    data-allows='{"my-lesson": "true", "lesson-shared": "true"}'>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.row-section-hidden -->

                    <!-- .row-section -->
                    @forelse($sections['data'] as $key => $section)
                        <div class="row-section" data-type="row-section">
                            <!-- .name-section -->
                            <div class="name-section span4">
                                <h5 for="name_section">@lang('courses.nameSection')</h5>
                                <input name="sections[{!! $section->id !!}][name]"
                                       class="form-control"
                                       value="{!! $section->name !!}" placeholder="@lang('courses.nameSection')">
                            </div>
                            <!-- /.name-section -->
                            <!-- .sort-lessons -->
                            <?php $lessons = $section->lessons; ?>
                            <div class="span4">
                                <h5>Sắp xếp các bài học</h5>
                                <ul init="sortable-list" class="box-sortable" data-section-id="{!! $section->id !!}" data-group="lessons"
                                    data-disabled="false"
                                    data-allows='{"my-lesson": "true", "lesson-shared": "true"}'>
                                    @if (!empty($lessons))
                                        <?php
                                        $temp = array(
                                                0 => array('detect' => 'my-lesson', 'shared' => 0, 'icon' => 'ion-briefcase'),
                                                1 => array('detect' => 'lesson-shared', 'shared' => 1, 'icon' => 'ion-android-share-alt')
                                        );
                                        ?>

                                        @foreach($lessons as $key => $lesson)
                                            <?php $beShared = $lesson->pivot->be_shared;?>
                                            <li class="bs-item"
                                                data-detect="{!! empty($temp[$beShared]) ?: $temp[$beShared]['detect'] !!}">
                                                <i class="{!! empty($temp[$beShared]) ?: $temp[$beShared]['icon'] !!}"></i>
                                                {!! $lesson->name !!}
                                                <input type="hidden"
                                                       data-section="{!! $section->id !!}"
                                                       data-lesson="{!! $lesson->id !!}"
                                                       data-type="lesson_id"
                                                       name="sections[{!! $section->id !!}][lessons][{!! $lesson->id !!}][lesson_id]"
                                                       value="{!! $lesson->id !!}">
                                                <input type="hidden"
                                                       data-section="{!! $section->id !!}"
                                                       data-lesson="{!! $lesson->id !!}"
                                                       data-type="be_shared"
                                                       name="sections[{!! $section->id !!}][lessons][{!! $lesson->id !!}][be_shared]"
                                                       value="{!! empty($temp[$beShared]) ?: $temp[$beShared]['shared'] !!}">
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <!-- /.sort-lessons -->
                        </div>
                    @empty
                        <!-- .empty section -->
                        <div class="row-section" data-type="row-section">
                            <!-- .name-section -->
                            <div class="name-section">
                                <label for="name_section">@lang('courses.nameSection')</label>
                                <input name="sections[{!! $sections['maxId'] !!}][name]"
                                       class="form-control"
                                       value="" placeholder="@lang('courses.nameSection')">
                            </div>
                            <!-- /.name-section -->
                            <!-- .sort-lessons -->
                            <div class="span4">
                                <h5>Sắp xếp các bài học</h5>
                                <ul init="sortable-list" class="box-sortable" data-section-id="{!! $sections['maxId'] !!}" data-group="lessons"
                                    data-disabled="false"
                                    data-allows='{"my-lesson": "true", "lesson-shared": "true"}'>
                                </ul>
                            </div>
                            <!-- /.sort-lessons -->
                        </div>
                        <!-- /.empty section -->
                    @endforelse
                    <div class="clearfix"></div>
                    <!-- .toolbar -->
                    <div class="toolbar" data-type="actions-area">
                        <button type="button"
                                init="tooltip"
                                class="btn btn-info btn-md"
                                data-type="actions"
                                data-id="add-section"
                                title="@lang('courses.addMoreSection')">
                            <i class="fa fa-copy"></i>
                            @lang('courses.addMoreSection')
                        </button>
                        <button type="button"
                                init="tooltip"
                                class="btn btn-danger btn-md"
                                data-type="actions"
                                data-id="remove-section"
                                title="@lang('courses.removeSection')">
                            <i class="fa fa-remove"></i>
                            @lang('courses.removeSection')
                        </button>
                    </div>
                    <!-- /.toolbar -->
                    <!-- /.row-section -->
                </div>
            </div>
            <!-- /.list-sections -->

            <!-- .list-lessons -->
            <div class="col-sm-6">
                <h5>Ngân hàng bài học của tôi</h5>
                <ul init="sortable-list" class="box-sortable" data-group="lessons"
                    data-disabled="true" data-allows='{"my-lesson": "true"}'>
                    @if(!empty($banks))
                        @foreach($banks as $key => $bank)
                            <li class="bs-item" data-detect="my-lesson">
                                <i class="ion-briefcase"></i>
                                {!! $bank->name !!}
                                <input type="hidden" disabled="disabled"
                                       data-lesson="{!! $bank->id !!}"
                                       data-type="lesson_id"
                                       value="{!! $bank->id !!}">
                                <input type="hidden" disabled="disabled"
                                       data-lesson="{!! $bank->id !!}"
                                       data-type="be_shared"
                                       value="0">
                            </li>
                        @endforeach
                    @endif
                </ul>

                <h5>Các bài học được share</h5>
                <ul init="sortable-list" class="box-sortable" data-group="lessons"
                    data-disabled="true" data-allows='{"lesson-shared": "true"}'>
                    @if(!empty($shared))
                        @foreach($shared as $key => $share)
                            <li class="bs-item" data-detect="lesson-shared">
                                <i class="ion-android-share-alt"></i>
                                {!! $share->name !!}
                                <input type="hidden" disabled="disabled"
                                       data-lesson="{!! $share->id !!}"
                                       data-type="lesson_id"
                                       value="{!! $share->id !!}">
                                <input type="hidden" disabled="disabled"
                                       data-lesson="{!! $share->id !!}"
                                       data-type="be_shared"
                                       value="1">
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <!-- /.list-lessons -->
        </div>


    </div>
</div>
