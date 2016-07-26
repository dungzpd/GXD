<div class="list-exams">
    @if (!empty($exams))
        <form method="POST" action="/exams/complete" id="complete-exams">
            {!! csrf_field(csrf_token()) !!}
            <div class="exams">
                <?php $index = 1; ?>
                @foreach ($exams as $id => $exam)
                    <?php $answers = !empty(json_decode($exam->answes, true)) ? json_decode($exam->answes, true) : []; ?>
                    @if (count($answers) > 0)
                        <div class="row">
                            <div class="question">
                                <b>Question {!! $index !!}:</b> {!! $exam->question !!}
                            </div>
                            <div class="answers">
                                <ul>
                                    @forelse($answers as $answer)
                                        <li class="answer answer-1">
                                            <?php
                                            switch ($exam->type) {
                                                case 'radio':
                                                    $input = '<input class="question" type="' . $exam->type . '" name="question[' . $exam->id . ']" value="' . $answer['percent'] . '"/>';
                                                    break;
                                                case 'checkbox':
                                                    $input = '<input class="question" type="' . $exam->type . '" name="question[' . $exam->id . '][]" value="' . $answer['percent'] . '"/>';
                                                    break;
                                            }
                                            ?>
                                            <label>
                                                {!! $input !!}
                                                {!! $answer['name'] !!}
                                            </label>
                                        </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <!-- /.row -->
                        <?php $index++; ?>
                    @endif
                @endforeach
            </div>
            <div class="clearfix"></div>
            <input class="hidden" name="teacher_id" value="{!! $extra['teacher_id'] !!}">
            <input class="hidden" name="course_id" value="{!! $extra['course_id'] !!}">
            <input class="hidden" name="lesson_id" value="{!! $extra['lesson_id'] !!}">
            <!-- .toolbar-bottom -->
            <div class="toolbar-bottom text-center">
                <button class="complete-exams btn btn-md btn-success" type="submit">
                    <i class="fa fa-save"></i>
                    Hoàn thành
                </button>
            </div>
            <!-- /.toolbar-bottom -->
        </form>
    @endif
</div>

<!-- Modal -->
<div id="exams-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
