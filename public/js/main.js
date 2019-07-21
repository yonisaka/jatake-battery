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

$(window).on("load", () => {
    $("#page-loader-wrapper").fadeOut("slow");
});
$(document).ready(() => {
    // product goto

    $(".btn-shop").click(function(e) {
        e.preventDefault();
        if (!$(this).data("link")) return;
        showTermCond();
    });
    window.showTermCond = function($footer = true) {
        let termModal = $("#term-cond-modal");
        termModal.modal();
        let termModalBody = termModal.find(".modal-body");
        let termTerm = termModal.find(".term-condition");

        if (!$footer) {
            termModal.find(".modal-footer").removeClass("d-block");
            termModal.find(".modal-footer").hide();
            return;
        }
        termModal.find(".modal-footer").addClass("d-block");
        termModal.find(".cancel").click(e => {
            termModal.modal("hide");
        });
        termModalBody.scroll(e => {
            let scrollBottom =
                termModalBody.scrollTop() +
                termModalBody.height() -
                termTerm[0].scrollHeight;
            if (scrollBottom == 0) {
                termModal.find(".accept-term").prop("disabled", false);
                termModal.find(".accept-term").click(e => {
                    termModal.find(".continue-term").prop("disabled", false);
                    termModal.find(".continue-term").click(function(e) {
                        window.open($(this).data("link"));
                    });
                });
            }
        });
        termModal.on("hidden.bs.modal", e => {
            termModal.find(".accept-term").prop("disabled", true);
            termModal.find(".accept-term").prop("checked", false);
            termModal.find(".continue-term").prop("disabled", true);
        });
        termModal.find(".continue-term").data("link", $(this).data("link"));
    };

    $(".product-img").slick({
        adaptiveHeight: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        // respondTo: $('.product-img').parent(),
        accessibility: true,
        prevArrow:
            '<button type="button" class="btn p-0 slick-prev"><i class="text-secondary fas fa-arrow-circle-left"></i></button>',
        nextArrow:
            '<button type="button" class="btn p-0 slick-next"><i class="text-secondary fas fa-arrow-circle-right"></i></button>',
        fade: false,
        asNavFor: ".product-img-nav",
        infinite: false,
        useTransform: true,
        cssEase: "cubic-bezier(0.77, 0, 0.18, 1)"
    });
    $(".product-img-nav").slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: false,
        asNavFor: ".product-img",
        dots: false,
        arrows: false,
        focusOnSelect: true
    });

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
