$(function () {
    $("#sc-category a").click(function (e) {
        e.preventDefault();

        $(this).parent().siblings().removeClass('active');
        $(this).parent().addClass('active');
        $("#sc-products .products-card").fadeIn(0);

        var type = $(this).data('type');
        if (type == "all") {
            $("#sc-banner").fadeIn(0);
        } else {
            $("#sc-banner").fadeOut(0);
            $("#sc-products .products-card").map(function () {
                if ($(this).data('type') != type)
                    $(this).fadeOut(0);
            });
        }
    })
});
