(function ($) {
    $("#complete-exams").submit(function (event) {
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        event.preventDefault();
        $.ajax({
            url : formURL,
            type: "POST",
            data : postData,
            success:function(res){
                $("#exams-modal .modal-title").html(res.success ? 'Hoàn thành bài kiểm tra thành công' : 'Có lỗi trong khi hoàn thành bài kiểm tra');
                $("#exams-modal .modal-body p").html(res.messages);
                $('#exams-modal').modal('show');
            },
            error:function(res) {
                console.log('Error');
            }
        });
    });


})(jQuery);