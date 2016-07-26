$(function() {

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function() {
        var clicks = $(this).data('clicks');
        if (clicks) {
            //Uncheck all checkboxes
            $(".content-list input[type='checkbox']").iCheck("uncheck");
            $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
        } else {
            //Check all checkboxes
            $(".content-list input[type='checkbox']").iCheck("check");
            $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
        }
        $(this).data("clicks", !clicks);
    });

    if ($('[init="iCheck"]').length) {
        $('[init="iCheck"]').each(function() {
            var self = this,
                iCheckClass = $(self).data('icheck-class'),
                increaseArea = $(self).data('increase-area');

            $(self).iCheck({
                checkboxClass: iCheckClass,
                radioClass: iCheckClass,
                increaseArea: increaseArea // optional
            });
        });
    }

    // Tooltip
    if ($('[init=tooltip]').length) {
        $('[init=tooltip]').each(function() {
            var self = this;
            $(self).tooltip();
        });
    }


    if ($('[init="ckeditor"]').length) {
        $('[init="ckeditor"]').each(function() {
            var self = this;

            $(self).ckeditor();
        });
    }

});