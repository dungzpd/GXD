$(function() {
    "use trict";

    /* selectize */
    if ($('[init="selectize"]').length) {
        $('[init="selectize"]').each(function() {
            var self = this;

            var config = {
                plugins: ['remove_button'],
                delimiter: ',',
                persist: false,
                create: false
            };

            $(self).selectize(config);
        });
    }

    /* select2 */
    if ($('[init="select2"]').length) {
        $('[init="select2"]').each(function() {
            var self = this;

            var config = {};

            $(self).select2();
        });
    }
}(jQuery));