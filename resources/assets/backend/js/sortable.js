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