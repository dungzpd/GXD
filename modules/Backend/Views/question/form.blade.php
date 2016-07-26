@extends('Backend::layouts.default')

@section('title', Lang::get($title))

@section('content')

{!! Breadcrumbs::render($breadcrumbs) !!}
<!-- Main content -->
<section class="content" data-type="root-question">
    <div class="row">
        <form action="{!! $actionForm !!}" method="post" enctype="multipart/form-data"> 
            {!! csrf_field(csrf_token()) !!}  
            <!-- /.col -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <!--<div class="box-header with-border">-->
                        <!--<h3 class="box-title">@lang('question.enterInfo')</h3>-->                   
                        <!-- /.box-tools -->
                    <!--</div>-->
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="table-list form-horizontal overflow-hidden">
                            <div class="row-group content-list">
                                <div class="box-body" data-type="list-answer">
                                    @if(!empty($messages['errors']['common']))
                                    <div class="form-group">                                        
                                        <div class="col-sm-12">
                                            <div class="alert alert-danger" role="alert">
                                                <i class="fa fa-times-circle-o color-white"></i>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                {!! $messages['errors']['common'] !!}
                                            </div>
                                        </div>
                                    </div>                                    
                                    @endif
                                    @if(!empty($messages['success']))
                                    <div class="form-group">                                        
                                        <div class="col-sm-12">
                                            <div class="alert alert-success" role="alert">
                                                <i class="fa fa-check color-white"></i>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                {!! $messages['success'] !!}
                                            </div>
                                        </div>
                                    </div>                                    
                                    @endif
                                    <div class="form-group">
                                        <label for="type_course" class="col-sm-3 control-label">@lang('question.typeCourse')</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="type_course" name="type_course">
                                                <option value="">@lang('question.default')</option>    
                                                @if(!empty($courses))
                                                    @foreach($courses as $course) 
                                                        @if(isset($data['type_course']) || !empty($currentCourse))
                                                            @if(isset($data['type_course'])) 
                                                                <option value="{!! $course->id !!}" {!! ($data['type_course'] == $course->id) ? 'selected' : '' !!}>{!! $course->name !!}</option>       
                                                            @else 
                                                                <option value="{!! $course->id !!}" {!! ($currentCourse == $course->id) ? 'selected' : '' !!}>{!! $course->name !!}</option>    
                                                            @endif                                                            
                                                        @else 
                                                            <option value="{!! $course->id !!}">{!! $course->name !!}</option>    
                                                        @endif     
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <label for="type_lession" class="col-sm-3 control-label">@lang('question.typeLession')</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="type_lession" name="type_lession">
                                                <option value="">@lang('question.default')</option>                                                
                                                @if(!empty($lessons))
                                                    @foreach($lessons as $lesson) 
                                                        @if(isset($data['type_lession']) || !empty($currentLesson))
                                                            @if(isset($data['type_lession'])) 
                                                                <option value="{!! $lesson->id !!}" {!! ($data['type_lession'] == $lesson->id) ? 'selected' : '' !!}>{!! $lesson->name !!}</option>    
                                                            @else 
                                                                <option value="{!! $lesson->id !!}" {!! ($currentLesson == $lesson->id) ? 'selected' : '' !!}>{!! $lesson->name !!}</option>    
                                                            @endif                                                            
                                                        @else 
                                                            <option value="{!! $lesson->id !!}">{!! $lesson->name !!}</option>    
                                                        @endif                                                                                                               
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>                                                                          
                                    <div class="form-group">
                                        <label for="question" class="col-sm-3 control-label">
                                            @lang('question.title')
                                            <i class="fa fa-asterisk color-red font-size-7"></i>                                          
                                        </label>
                                        <div class="col-sm-8">                                            
                                            <textarea id="question" name="question" placeholder="@lang('question.title')" class="wysihtml5 form-control" rows="2">{!! $data['question'] or '' !!}</textarea>                                                  

                                            @if(isset($messages['errors']['question']))
                                                <span class="help-block color-red font-size-13"><i class="fa fa-times-circle-o margin-right-5"></i>{!! $messages['errors']['question'][0] !!}</span>
                                            @endif                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="question_image" class="col-sm-3 control-label">@lang('question.questionImage')</label>
                                        <div class="col-sm-8">
                                            <div class="form-control">
                                                <input type="file" id="question_image" name="question_image"> 
                                            </div>                                            
                                        </div>
                                    </div>                                                                                      
                                    <div class="form-group hidden" data-type="row-answer-hidden">
                                        <label for="answes" class="col-sm-3 control-label">
                                            @lang('question.answes')
                                            <i class="fa fa-asterisk color-red font-size-7"></i>                                          
                                        </label>
                                        <div class="col-sm-6">                                                                                        
                                            <div class="row-group">
                                                <textarea id="answes" name="answes[]" placeholder="@lang('question.answes')" class="form-control" rows="2"></textarea>                                                  
                                            
                                                @if(isset($messages['errors']['answes']))
                                                    <span class="help-block color-red font-size-13"><i class="fa fa-times-circle-o margin-right-5"></i>{!! $messages['errors']['answes'][0] !!}</span>
                                                @endif      
                                            </div>                                            
                                        </div>                                                 
                                        <div class="col-sm-2">
                                            <label>
                                                <input type="checkbox" data-id="type-answer" data-icheck-class="icheckbox_flat-blue" data-increase-area="20%"/>
                                                @lang('question.correct')
                                            </label>
                                            
                                            <select class="form-control hidden" data-type="type-answer" name="type_answer[]">
                                                <option value="0">@lang('question.wrong')</option>
                                                <option value="1">@lang('question.correct')</option>
                                            </select>                                            
                                            
                                            <div class="row-group">
                                                <div class="form-control overflow-hidden asw-image height-auto">
                                                    <input class="fl-left" type="file" id="question_image" name="answer_image[]">                                                     
                                                </div>   
                                            </div>
                                        </div>
                                    </div>
                                    @if(!empty($data)) 
                                        @foreach($data['answes'] as $key => $answer)
                                            @if($key > 0)
                                                <div class="form-group" data-type="row-answer">
                                                    <label for="answes" class="col-sm-3 control-label">
                                                        @lang('question.answes')
                                                        <i class="fa fa-asterisk color-red font-size-7"></i>                                          
                                                    </label>
                                                    <div class="col-sm-6">  
                                                        <div class="row-group">
                                                            <textarea id="answes" name="answes[]" placeholder="@lang('question.answes')" class="form-control" rows="2">{!! $answer !!}</textarea>                                                  

                                                            @if(isset($messages['errors']['answes']))
                                                                <span class="help-block color-red font-size-13"><i class="fa fa-times-circle-o margin-right-5"></i>{!! $messages['errors']['answes'][0] !!}</span>
                                                            @endif 
                                                        </div>                                                                                                                                                         
                                                    </div>  
                                                    <div class="col-sm-2">
                                                        <label>
                                                            <input type="checkbox" data-id="type-answer" data-icheck-class="icheckbox_flat-blue" data-increase-area="20%" {!! $data['type_answer'][$key] == 1 ? 'checked' : '' !!}/>
                                                            @lang('question.correct')
                                                        </label>
                                                        
                                                        <select class="form-control hidden" data-type="type-answer" name="type_answer[]">
                                                            <option value="0" {!! $data['type_answer'][$key] == 0 ? 'selected' : '' !!}>@lang('question.wrong')</option>
                                                            <option value="1" {!! $data['type_answer'][$key] == 1 ? 'selected' : '' !!}>@lang('question.correct')</option>
                                                        </select>
                                                        
                                                         <div class="row-group">
                                                            <div class="form-control overflow-hidden asw-image height-auto">
                                                                <input class="fl-left" type="file" id="question_image" name="answer_image[]">                                                                 
                                                            </div> 
                                                        </div> 
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach                                        
                                    @else 
                                        @for($i = 1; $i < 5; $i++)
                                            <div class="form-group" data-type="row-answer">
                                                <label for="answes" class="col-sm-3 control-label">
                                                    @lang('question.answes')
                                                    <i class="fa fa-asterisk color-red font-size-7"></i>                                          
                                                </label>
                                                <div class="col-sm-6">  
                                                    <div class="row-group">
                                                        <textarea id="answes" name="answes[]" placeholder="@lang('question.answes')" class="form-control" rows="2"></textarea>                                                  

                                                        @if(isset($messages['errors']['answes']))
                                                            <span class="help-block color-red font-size-13"><i class="fa fa-times-circle-o margin-right-5"></i>{!! $messages['errors']['answes'][0] !!}</span>
                                                        @endif 
                                                    </div>                                   
                                                </div>   
                                                <div class="col-sm-2">                                                    
                                                    <label>
                                                        <input type="checkbox" data-id="type-answer" data-icheck-class="icheckbox_flat-blue" data-increase-area="20%"/>
                                                        @lang('question.correct')
                                                    </label>
                                                    
                                                    <select class="form-control hidden" data-type="type-answer" name="type_answer[]">
                                                        <option value="0">@lang('question.wrong')</option>
                                                        <option value="1">@lang('question.correct')</option>
                                                    </select>
                                                    
                                                    <div class="row-group">
                                                        <div class="form-control overflow-hidden asw-image height-auto">                                                            
                                                            <input class="fl-left" type="file" id="question_image" name="answer_image[]"> 
                                                        </div> 
                                                    </div>   
                                                </div>
                                            </div>
                                        @endfor                                        
                                    @endif
                                    
                                    <div class="form-group" data-type="actions-area">
                                        <label class="col-sm-3 control-label"></label>
                                        <div class="col-sm-8">                                            
                                            <button type="button" class="btn btn-info btn-md" data-type="actions" data-id="add-answer">
                                                <i class="fa fa-copy"></i>
                                                @lang('question.addMoreAnswer')
                                            </button>     
                                            <button type="button" class="btn btn-danger btn-md" data-type="actions" data-id="remove-answer">
                                                <i class="fa fa-remove"></i>
                                                @lang('question.removeAnswer')
                                            </button>
                                        </div>
                                    </div>
                                </div>                    
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer no-padding">
                        <div class="mailbox-controls series-action-bottom text-right">                                         
                            <label class="margin-right-10">                                
                                @lang('question.pickOffStatus')
                                <input type="checkbox" data-id="status" data-icheck-class="icheckbox_flat-blue" data-increase-area="20%" {!! isset($data['status']) ? ($data['status'] == 'inactive' ? 'checked' : '') : '' !!}/>                                                                       
                            </label>

                            <select class="form-control hidden" id="status" name="status">
                                <option value="active" {!! isset($data['status']) ? ($data['status'] == 'active' ? 'selected' : '') : '' !!}>@lang('question.on')</option>
                                <option value="inactive" {!! isset($data['status']) ? ($data['status'] == 'inactive' ? 'selected' : '') : '' !!}>@lang('question.off')</option>
                            </select>
                            
                            @if(!$isEdit)
                            <button type="submit" name="saveAndCreate" class="btn btn-success btn-md">
                                <i class="fa fa-save"></i>
                                @lang('question.saveAndCreate')
                            </button>
                            @else
                                @if(!empty($prev))
                                <a href="{!! URL::action('\Backend\Controllers\QuestionController@edit', ['id' => $prev]) !!}">
                                    <button type="button" name="previous" class="btn btn-warning btn-md">
                                @else 
                                <a>
                                    <button type="button" name="previous" class="btn btn-warning btn-md disabled">
                                @endif                                                                                                
                                        <i class="fa fa-chevron-left"></i>
                                        @lang('question.prev')
                                    </button>
                                </a>
                                
                                @if(!empty($next))
                                <a href="{!! URL::action('\Backend\Controllers\QuestionController@edit', ['id' => $next]) !!}">
                                    <button type="button" name="next" class="btn btn-info btn-md">
                                @else 
                                <a>
                                    <button type="button" name="next" class="btn btn-info btn-md disabled">
                                @endif                                  
                                    
                                        <i class="fa fa-chevron-right"></i>
                                        @lang('question.next')
                                    </button>
                                </a>                            
                            @endif
                            <button type="submit" name="save" class="btn btn-success btn-md">
                                <i class="fa fa-save"></i>
                                @lang('question.save')
                            </button>
                            <a href="{!! URL::action('\Backend\Controllers\QuestionController@index') !!}">
                                <button type="button" class="btn btn-danger btn-md">
                                    <i class="fa fa-remove"></i>
                                    @lang('question.cancel')
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