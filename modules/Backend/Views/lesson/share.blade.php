<div class="modal fade" id="modal-share-{!! $lesson->id !!}" tabIndex="-1">
    <div class="modal-dialog">
        <form method="POST" action="{!! URL::action('\Backend\Controllers\LessonsController@share', array('id' => $lesson->id)) !!}">
            {!! csrf_field(csrf_token()) !!}
            <!-- .modal-content -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">@lang('common.share') "{!! $lesson->name !!}"</h4>
                </div>
                <div class="modal-body">
                    <!-- .table-list -->
                    <div class="table-list overflow-hidden">
                        <!-- .header-list -->
                        <div class="row-group header-list">
                            <!-- .row -->
                            <div class="row">
                                <!-- .checkbox -->
                                <div class="col-md-1">
                                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                                </div>
                                <!-- /.checkbox -->
                                <!-- .name -->
                                <div class="col-md-10">@lang('common.account')</div>
                                <!-- /.name -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.header-list -->

                        <!-- .content-list -->
                        <div class="row-group content-list">
                        @if(!empty($users) && $users->count() > 0)
                            @foreach($users as $user)
                            <!-- .row -->
                            <div class="row">
                                <!-- .checkbox -->
                                <div class="col-md-1">
                                    <input type="checkbox"
                                       init="iCheck"
                                       data-icheck-class="icheckbox_flat-blue"
                                       data-increase-area="20%"
                                        name="users[]" 
                                        value="{!! $user->id !!}"
                                        @if (in_array($user->id, $lesson->users->pluck('id')->toArray()))
                                        checked
                                        @endif>
                                </div>
                                <!-- /.checkbox -->

                                <!-- .name -->
                                <div class="col-md-10">
                                {!! $user->name !!}
                                </div>
                                <!-- /.name -->
                            </div>
                            <!-- /.row -->
                            @endforeach
                         @endif   
                        </div>
                        <!-- .content-list -->

                    </div>
                    <!-- /.table-list -->

                </div>
                <div class="modal-footer">
                        <input type="hidden" name="allow_share" value="1">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-trash-o" aria-hidden="true"></i> Yes
                        </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="fa fa-times"></i> Close
                        </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </form>
    </div>
    <!-- /.modal-dialog -->
</div>
