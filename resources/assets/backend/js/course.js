(function($) {
    "use strict";
    // Atrribute
    var attr = {
        aType: 'data-type',
        aId: 'data-id',
        aMaxId: 'data-section-maxId',
        aGet: 'data-get',
        aBase: 'data-base',
        aPath: 'data-path'
    };

    //Generate attribute
    var generate = function(attr, val) {
        return '[' + attr + '="' + val + '"]';
    };

    //Element in DOM
    var element = {
        body: 'body',
        actions: generate(attr.aType, 'actions'),
        actionsArea: generate(attr.aType, 'actions-area'),
        rootSection: generate(attr.aType, 'root-section'),
        listSection: generate(attr.aType, 'list-section'),
        rowSection: generate(attr.aType, 'row-section'),
        rowHiddenSection: generate(attr.aType, 'row-section-hidden'),
        sectionName: generate(attr.aType, 'sectionName'),
        sectionMaxId: generate(attr.aMaxId, 'sectionMaxId'),

        addSection: generate(attr.aId, 'add-section'),
        removeSection: generate(attr.aId, 'remove-section')
    };

    var settings = $.extend({
        /**
         * Management ajax
         * @param {string} url, {method HTTP} type, {string} dataType, { PlainObject|String|Array} data, {function} response
         * url http::www.url
         * type method GET, POST, PUT, DELETE
         * dataType xml, html, script, json, jsonp, text
         * data send to server
         * response callback function
         */
        ajax: function(url, type, data, dataType, response) {
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
        },
        /**
         * Management action
         * @param {Event} event, {object} obj, {function} callback
         **/
        action: function(event, obj, callback) {
            $(document).on(event, obj, function() {
                callback($(this));
            });
        }
    });

    var fn = {
        init: function() {
            this.self = $(this);
            this.rootSection = $(element.rootSection);

            this.rootSection.length ? fn.checkCaseSection.call(this) : 1 === 1 ;
        },
        checkCaseSection: function() {
            settings.action('click', element.actions, function(selector) {
                var task = selector.attr(attr.aId);
                switch(task) {
                    case 'add-section':
                        fn.addMore(selector, element.listSection, element.rowSection, element.rowHiddenSection, element.sectionName, element.actionsArea, 'row-section');
                        break;
                    case 'remove-section':
                        fn.removeMore(selector, element.listSection, element.rowSection);
                        break;
                    default: break;
                }
            });
        },

        // add more element section
        addMore: function(_this, root, row, clone, elSectionName, actionArea, classRun) {
            var clone = $(clone);
            var sectionName = $(elSectionName, clone);
            var maxId = parseInt(sectionName.attr('data-maxid'));
            
            var _clone = clone.clone();
            _clone.find(elSectionName).removeAttr('disabled');
            _clone.removeClass('hidden').attr(attr.aType, classRun);
            $(actionArea).before(_clone);
            
            var newMaxId =  maxId + 1;
            var newName = 'sections['+ newMaxId +'][name]';
            sectionName.attr('name', newName);
            sectionName.attr('data-maxid', newMaxId);
            $('[init="sortable-list"]', clone).attr('data-section-id', newMaxId);
            //------------
            $(function () {

                if ($('[init="sortable-list"]').length) {
                    $('[init="sortable-list"]').each(function () {
                        var self = this;

                        $(self).sortable({
                            group: $(self).data('group'),
                            sectionId: $(self).data('section-id'),
                            handle: 'li',
                            isValidTarget: function ($item, container) {
                                var allows = $(container.el).data('allows');
                                var detect = $($item).data('detect');

                                if (allows && (detect in allows)) {
                                    return true;
                                }

                                return $item.parent("ul")[0] == container.el[0];
                            },

                            onDragStart: function ($item, container, _super) {
                                // Duplicate items of the no drop area
                                if (!container.options.drop) {

                                    $item.clone().insertAfter($item);
                                }
                                _super($item, container);
                            },
                            onDrop: function ($item, container, _super) {
                                var $clonedItem = $('<li/>').css({height: 0});
                                var sectionId = $(container.el[0]).data('section-id');
                                var children = $item.children('input[type="hidden"]');

                                if (children.length) {
                                    children.each(function () {
                                        var self = this;
                                        var _self = $(this);
                                        var _sectionId = _self.data('section');
                                        var _lessonId = _self.data('lesson');
                                        var _type = _self.data('type');

                                        if (_lessonId && _type) {
                                            _self.attr('name', 'sections[' + sectionId + '][lessons][' + _lessonId + '][' + _type + ']');
                                            _self.attr('data-section', sectionId);
                                        }
                                    });
                                }

                                $clonedItem.animate({'height': $item.height()});
                                $item.animate($clonedItem.position(), function () {
                                    $clonedItem.detach();
                                    _super($item, container);
                                });

                                $('input', $item).attr('disabled', $(container.el).data('disabled'))
                            }
                        });

                    });
                }

            }(jQuery));
            //------------
        },
        // remove element section
        removeMore: function(_this, root, row) {
            var item = _this.closest(root).find(row).last();
            item.length ? item.remove() : 1 === 1 ;
        }
    };

    fn.init();

})(jQuery);