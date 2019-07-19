$(function() {
    // include library
    let $lib = $("<script></script>").attr("src", "/js/library.js");
    $("head").append($lib);

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    $("#sc-category a").click(function(e) {
        e.preventDefault();

        $(this)
            .parent()
            .siblings()
            .removeClass("active");
        $(this)
            .parent()
            .addClass("active");
        $("#sc-products .products-card").fadeIn(0);

        var type = $(this).data("type");
        if (type == "all") {
            $("#sc-banner").fadeIn(0);
        } else {
            $("#sc-banner").fadeOut(0);
            $("#sc-products .products-card").map(function() {
                if ($(this).data("type") != type) $(this).fadeOut(0);
            });
        }
    });
});

$(window).on("load", () => {});
$(document).ready(() => {
    let img = $("img");
    img.each((i, el) => {
        $("<img/>")
            .on("error", e => {
                $(el).attr(
                    "src",
                    "https://trello-attachments.s3.amazonaws.com/5d0de6ba1fad1a0b455b4016/232x232/d684e1cdd1ea5eea4b763dc16ecef4ed/no_image.png"
                );
            })
            .attr("src", $(el).attr("src"));
    });
});
