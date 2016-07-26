$(function () {
    if ($('[init="file-video"]').length) {
        $('[init="file-video"]').each(function () {
            var self = this;
            var path = $(self).data('file-path');
            var fileName = $(self).data('file-name');

            var config = {
                allowedFileTypes: ["video"],
                showUpload: false,
                showCaption: true,
                initialPreviewAsData: true,
                autoReplace: true,
                showUploadedThumbs: false,
                initialPreviewShowDelete: false,
                overwriteInitial: true,
                showDrag: false,
                showZoom: false,
                layoutTemplates: {actionDelete: '', actionUpload: '', actionZoom: '', footer: ''},
                previewFileIconSettings: {
                    mov: '<i class="fa fa-file-movie-o text-warning"></i>'
                },
                previewFileExtSettings: {
                    mov: function (ext) {
                        return ext.match(/(avi|mpg|mkv|mov|mp4|3gp|webm|wmv)$/i);
                    }
                }
            };

            if (path != '') {
                config.initialPreview = [$(self).data('file-path')];
                config.initialPreviewConfig = [{
                        type: "video",
                        filetype: "video/mp4",
                        caption: fileName,
                        url: $(document.body).data('base') + '/delete-videos',
                        size: 1024000,
                        key: 1
                    }];
            }

            $(self).fileinput(config);

            var ajax = function(url, type, data, dataType, response) {
                $.ajax({
                    url: url,
                    type: type,
                    dataType: dataType,
                    data: data,
                    async: false,
                    success: function(rs) {
                        response(rs);
                    }
                });
            };
            
            var btnRemove = $(self).closest('.box-video').find('.fileinput-remove:not([disabled])');
            if(btnRemove.length){
                btnRemove.off('click');
                btnRemove.on('click', function(){
                    var data = $(self).data();
                    if (data.filePath) {
                            var url = data.filePath.replace('stream', 'remove');
                    }
                });

            }



        });
    }
});



