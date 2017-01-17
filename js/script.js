var url = "";

$(function() {

    $('.ckbox label').on('click', function () {
        $(this).parents('tr').toggleClass('selected');
    });

    $('.btn-filter').on('click', function () {
        var $target = $(this).data('target');
        if ($target != 'all') {
            $('.table tr').css('display', 'none');
            $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
        } else {
            $('.table tr').css('display', 'none').fadeIn('slow');
        }
    });

    $('.run-all').on('click', function() {
        setUrl();
        $('.summary').each(function() {
            ajaxCall($(this).data('id'));
        });
    });

    $('.run-selected').on('click', function() {
        setUrl();
        $('.checkbox:checked').each(function() {
            ajaxCall($(this).data('id'));
        });
    });
});

function setUrl() {
    url = $('[name="rdoServer"]:checked').val();
}

function ajaxCall(key) {
    start = moment().format("HH:mm:ss")
    $.ajax(url + $('.link' + key).text(), {
        beforeSend: function() {
            $('.status' + key).text("(pending)")
                .attr("class", "pull-right status" + key + " pending");
            $('.job' + key).attr('data-status', 'pending');
        },
        success: function(data) {
            $('.status' + key).text("(successful)")
                .attr("class", "pull-right status" + key + " successful");
            $('.job' + key).attr('data-status', 'successful');
        },
        error: function() {
            $('.status' + key).text("(failed)")
                .attr("class", "pull-right status" + key + " failed");
            $('.job' + key).attr('data-status', 'failed');
            var end = moment().format("HH:mm:ss")
            $('.time' + key).text(moment.utc(moment(end,"HH:mm:ss").diff(moment(start,"HH:mm:ss"))).format("HH:mm:ss"));
        }
    });
}