$(function () {
    $('.btn-radio').click(function(e) {
        $('.btn-radio').not(this).removeClass('active').removeClass('btn-success')
            .siblings('input').prop('checked',false)
            .siblings('.img-radio').css('opacity','0.5');
        $(this).addClass('active').addClass('btn-success')
            .siblings('input').prop('checked',true)
            .siblings('.img-radio').css('opacity','1');
    });
});
