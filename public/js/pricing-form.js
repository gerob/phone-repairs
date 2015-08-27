function loadServices() {
    $('#services').empty(); // empty out the old content
    $('#services').append('<td><i class="fa fa-refresh fa-spin"></i> Loading...</td>');
    $.ajax({
        type: "GET",
        url: '/werx/repairs/' + $("#devices").val(),
        dataType: "json",
        success: function (data) {
            $('#services').empty(); // empty out the old content
            $.each(data, function (i, item) {
                var $tr = $('<tr>').append(
                    $('<td>').text(item.ds_service.name),
                    $('<td>').text('$' + (item.price / 100).toFixed(2)),
                    $('<td>').text(item.upc),
                    $('<td>').html(
                        '<input type="checkbox" name="services[' + item.id + '][name]" value="' + item.ds_service.name + '">' +
                        '<input type="hidden" name="services[' + item.id + '][price]" value="' + item.price + '">' +
                        '<input type="hidden" name="services[' + item.id + '][upc]" value="' + item.upc + '">'
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
});