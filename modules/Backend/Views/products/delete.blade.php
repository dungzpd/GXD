<div class="modal fade" id="modal-delete-{!! $item->id !!}" tabIndex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">@lang('common.delete') "{!! $item->name !!}"</h4>
            </div>
            <div class="modal-body">
                <p class="">
                    <span class="lead"><i class="fa fa-question fa-lg"></i> </span> 
                    @lang('products.cfDelMsg')
                </p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{!! URL::action('\Backend\Controllers\ProductController@delete', array('id' => $item->id)) !!}">
                    {!! csrf_field(csrf_token()) !!}
                    <input type="hidden" name="currentPage" value="{!!$currentPage!!}">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-trash-o" aria-hidden="true"></i> Yes
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-times"></i> Close
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
