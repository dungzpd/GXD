/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

(function ($) {
    "use strict";
    //Atrribute
    var attr = {
        aType: 'data-type',
        aId: 'data-id',
        aGet: 'data-get',
        aBase: 'data-base',
        aPath: 'data-path'
    };
    //Generate attribute
    var generate = function (attr, val) {
        return '[' + attr + '="' + val + '"]';
    };
    //Element in DOM
    var element = {
        body: 'body',
        actions: generate(attr.aType, 'actions'),
        actionsArea: generate(attr.aType, 'actions-area'),
        rootQuestion: generate(attr.aType, 'root-question'),
        listAnswer: generate(attr.aType, 'list-answer'),
        rowAnswer: generate(attr.aType, 'row-answer'),
        rowHiddenAnswer: generate(attr.aType, 'row-answer-hidden'),
        addAnswer: generate(attr.aId, 'add-answer'),
        removeAnswer: generate(attr.aId, 'remove-answer'),
        //checkbox map with select
        cbStatus: generate(attr.aId, 'status'),
        cbAnswer: generate(attr.aId, 'type-answer')

    };
    var baseUrl = $(element.body).attr(attr.aBase);
    var urls = {};
    var settings = $.extend({
        //Convert to uppercase 
        convertCase: function (str) {
            var lower = str.toLowerCase();
            return lower.replace(/(^| )(\w)/g, function (x) {
                return x.toUpperCase();
            });
        },
        //Management ajax
        ajax: function (url, type, data, dataType, response) {
            $.ajax({
                url: url,
                type: type,
                dataType: dataType,
                data: data,
                async: false,
                success: function (rs) {
                    response(rs);
                }
            });
        },
        //Management action
        action: function (event, obj, callback) {
            $(document).on(event, obj, function () {
                callback($(this));
            });
        },
        checkAll: function (checkAll, checkOne) {
            if (this.root.length) {
                settings.action('click', checkAll, function (selector) {
                    var val = selector.val();
                    if (val === "off") {
                        selector.val('on');
                        $(checkOne).map(function () {
                            this.checked = true;
                        });
                    } else {
                        selector.val('off');
                        $(checkOne).map(function () {
                            this.checked = false;
                        });
                    }
                });
            }
        },
        popup: function (data) {
            var html = '<div class="modal fade" id="' + data.id + '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">' +
                    '<div class="modal-dialog">' +
                    '<div class="modal-content">' +
                    '<div class="modal-header">' +
                    '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                    '<h4 class="modal-title" id="myModalLabel">' + data.title + '</h4>' +
                    '</div>' +
                    '<div class="modal-body">';
            if (data.content && data.content !== "") {
                html += data.content;
            }
            html += '</div>' +
                    '<div class="modal-footer">';
            if (data.button && data.button !== "") {
                html += '<button type="button" class="btn btn-default" data-dismiss="modal">' + data.button + '</button>';
            }
            if (data.submit && data.submit !== "") {
                html += '<button type="button" class="btn btn-primary" data-type="query-actions" data-id="' + data.data_id + '">' + data.submit + '</button>';
            }
            html += '</div></div></div></div>';

            return html;
        },
        //Delay function
        delay: (function () {
            var timer = 0;
            return function (callback, ms) {
                clearTimeout(timer);
                timer = setTimeout(callback, ms);
            };
        })()
    });

    var fn = {
        init: function () {
            this.self = $(this);
            this.rootQuestion = $(element.rootQuestion);

            this.rootQuestion.length ? fn.checkCaseQuestion.call(this) : 1 === 1;
            this.rootQuestion.length ? fn.checkboxMapSelect.call(this) : 1 === 1;
        },
        checkCaseQuestion: function () {
            settings.action('click', element.actions, function (selector) {
                var task = selector.attr(attr.aId);
                switch (task) {
                    case 'add-answer':
                        fn.addMore(selector, element.listAnswer, element.rowAnswer, element.rowHiddenAnswer, element.actionsArea, 'row-answer');
                        fn.checkboxMapSelect.call(this);
                        break;
                    case 'remove-answer':
                        fn.removeMore(selector, element.listAnswer, element.rowAnswer);
                        break;
                    default:
                        break;
                }
            });
        },
        checkboxMapSelect: function () {
            var iCheckClass = $(element.cbStatus).data('icheck-class'),
                increaseArea = $(element.cbStatus).data('increase-area');

            $(element.cbStatus).iCheck({
                tap: true,
                checkboxClass: iCheckClass,
                radioClass: iCheckClass,
                increaseArea: increaseArea
            }).on('ifChanged', function (e) {
                var divCb = $(this).parent();
                if(divCb.hasClass('checked')) {
                    divCb.closest('.col-sm-8').find('select').val('active');
                } else {
                    divCb.closest('.col-sm-8').find('select').val('inactive');
                }
            }).end();

            if ($(element.cbAnswer).length) {
                $(element.cbAnswer).each(function() {
                    var self = this,
                        iCheckClassAnw = $(self).data('icheck-class'),
                        increaseAreaAnw = $(self).data('increase-area');

                    $(self).iCheck({
                        tap: true,
                        checkboxClass: iCheckClassAnw,
                        radioClass: iCheckClassAnw,
                        increaseArea: increaseAreaAnw
                    }).on('ifChanged', function (e) {
                        var divCb = $(this).parent();
                        if(divCb.hasClass('checked')) {
                            divCb.closest('.col-sm-2').find('select').val('0');
                        } else {
                            divCb.closest('.col-sm-2').find('select').val('1');
                        }   
                    }).end();
                });
            }            
        },
        addMore: function (_this, root, row, clone, actionArea, classRun) {
            var item = _this.closest(root).find(row).last();
            var copy = $(clone).clone().removeClass('hidden').attr(attr.aType, classRun);
            $(actionArea).before(copy);
        },
        removeMore: function (_this, root, row) {
            var item = _this.closest(root).find(row).last();
            item.length ? item.remove() : 1 === 1;
        }
    };

    fn.init();

}(jQuery));



