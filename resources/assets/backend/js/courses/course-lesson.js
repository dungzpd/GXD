'use strict';
$(function () {
    var fc = {
        url: $(document.body).data('base'),
        path: $(document.body).data('path'),
        init: function (options) {
            return this.each(function () {
                this.self = $(this);
                this.opt = $.extend(true, {}, $.fn.courseLesson.defaults, options);

                fc.refresh.call(this);
            });
        },
        refresh: function () {
            var self = this;

            fc.elements.call(self);
            fc.initSection.call(self);
        },
        elements: function () {
            var self = this;

            self.elements = {
                root: '#wrapper',
                btnAction: '[data-type="actions"]',
                tempSection: '[data-type="row-section-hidden"]'
            };

            self.section = {
                index: 0
            };
        },
        initSection: function () {
            var self = this;
            var btn = self.elements.btnAction;

            if (btn.length) {
                fc.action('click', btn, function () {
                    var task = $(this).data('id');

                    switch (task) {
                        case 'add-section':
                            fc.cloneSection.call(self);
//                            fn.addMore(selector, element.listSection, element.rowSection, element.rowHiddenSection, element.sectionName, element.actionsArea, 'row-section');
                            break;
                        case 'remove-section':
//                            fn.removeMore(selector, element.listSection, element.rowSection);
                            break;
                        default:
                            break;
                    }
                });
            }

        },
        cloneSection: function () {
            var self = this;
            var clone = $(self.elements.tempSection, self);
            
            
        },
        removeSection: function () {
            var self = this;
        },
        action: function (event, obj, callback) {
            $(document).off(event, obj);

            $(document).on(event, obj, function (e) {
                callback.call(this, e);
            });
        },
        delay: (function () {
            var timer = 0;
            return function (callback, ms) {
                clearTimeout(timer);
                timer = setTimeout(callback, ms);
            };
        })(),
        ajax: function (url, type, data, response) {
            $.ajax({
                url: url,
                type: type,
                dataType: "json",
                data: data,
                async: false,
                success: function (rs)
                {
                    response(rs);
                }
            });
        }
    };

    $.fn.courseLesson = function (method) {
        if (fc[method]) {
            return fc[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return fc.init.apply(this, arguments);
        } else {
            $.error('Method ' + method + ' does not exist!');
        }
    };

    $.fn.courseLesson.defaults = {
        root: "#wrapper"
    };

    //----- INIT SHIP MAP -----
    if ($('[init="course-lesson"]').length) {
        $('[init="course-lesson"]').each(function () {
            $(this).courseLesson({
                root: "body"
            });
        });
    }
});
