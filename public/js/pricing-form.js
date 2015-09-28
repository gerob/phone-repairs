function loadServices() {
    $('#services').empty(); // empty out the old content
    $('#services').append('<td><i class="fa fa-refresh fa-spin"></i> Loading...</td>');
    $.ajax({
        type: "GET",
        url: '/werx/api/device/' + $("#devices").val() + '/services',
        dataType: "json",
        success: function (data) {
            $('#services').empty(); // empty out the old content
            $.each(data, function (i, item) {
                console.log(item);
                $('<tr>').append(
                    $('<td>').text(item.name),
                    $('<td>').text('$' + (item.pivot.price / 100).toFixed(2)),
                    $('<td>').text(item.pivot.upc),
                    $('<td>').html(
                        '<input type="checkbox" name="services[' + item.id + '][name]" value="' + item.name + '">' +
                        '<input type="hidden" name="services[' + item.id + '][device_service]" value="' + item.pivot.id + '">' +
                        '<input type="hidden" name="services_details[' + item.id + '][price]" value="' + item.pivot.price + '">' +
                        '<input type="hidden" name="services_details[' + item.id + '][upc]" value="' + item.pivot.upc + '">'
                    )
                ).appendTo('#services');
            });
            $('#services').addClass('animated flash');
        }
    });
}


$('#services').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', onTransitionEnd);
function onTransitionEnd() {
  $('#services').removeClass('animated flash');
}

$(function () {
    if ($("#devices").val()) {
        loadServices();
    }

    // Mask on phone input
    $('.phone_us').mask('000-000-0000');
});