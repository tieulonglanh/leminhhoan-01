/**
 * Created by admin on 1/13/2016.
 */
$(function () {
    $('#demo').scrollbox({
            direction: 'h',
            distance: 134
    });
    $('#demo-backward').click(function () {
        $('#demo').trigger('backward');
    });
    $('#demo-forward').click(function () {
        $('#demo').trigger('forward');
    });
    $("#slides").slidesjs({
        width: 810,
        height: 332,
        play: {
            active: true,
            auto: true,
            interval: 4000,
        }
    });
    var heightcent = $(".main").height();
    $('div.box-left').css({
        'height': heightcent
    });
    var heightcent1 = $(".content-main").height();
    $('div.box-right').css({
        'height': heightcent1
    });
});

