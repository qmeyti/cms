$(document).ready(function () {

    /**
     * Make Chart
     */
    $('.sortable').nestedSortable({
        handle: 'div',
        items: 'li',
        rtl: true,

        stop: function (event, ui) {

            let item = $(ui.item[0]).attr('data-id');
            let parent = $(ui.item[0]).parents('li.item').attr('data-id');

            $.ajax({ //Process the form using $.ajax()
                type: 'POST', //Method type
                url: SAVE_ORDER_ROUTE, //Your form processing file URL
                data: {parent, item, _token: CSRF_TOKEN}, //Forms name
                dataType: 'json',
                success: function (data) {
                    if (data.status === 'success') {

                        doAlert(data.message, 'success');

                    }
                }, error: function (data) {

                    doAlert(data.message);

                }
            });

        },

        toleranceElement: '> div'
    });

});
