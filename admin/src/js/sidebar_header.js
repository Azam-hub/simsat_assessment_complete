


$(".head").click(function () {
    $(this).next().slideToggle();
    if ($(this).find(".chevron").css("transform") == "matrix(0, 1, -1, 0, 0, 0)") {
        $(this).find(".chevron").css("transform", "rotate(0deg)");
    } else {
        $(this).find(".chevron").css("transform", "rotate(90deg)");
    }
});

// ------ Header --------
$(".user-btn").click(function () {
    $(".user-dialog-box").toggle()
})

$('body').click(function (evt) {
    if ($(evt.target).closest('.user-dialog-box, .user-btn').length) {
        return;
    }
    $('.user-dialog-box').hide()
});
