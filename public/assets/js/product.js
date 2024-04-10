var swiper = new Swiper(".swiperDetailProduct", {
    slidesPerView: 1,
    centeredSlides: false,
    grabCursor: true,
    scrollbar: {
        el: ".swiper-scrollbar",
    },
});

var swiper2 = new Swiper(".recommendedProducts", {
    spaceBetween: 20,
    scrollbar: {
        el: ".swiper-scrollbar",
    },
    breakpoints: {
        768: {
            slidesPerView: 3,
        },
        300: {
            slidesPerView: 2,
        },
    },
});

var comment = new Swiper(".mySwiperComment", {
    spaceBetween: 10,
    breakpoints: {
        768: {
            slidesPerView: 5,
        },
        300: {
            slidesPerView: 3,
        },
    },
});

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
$(document).ready(function () {
    $(".heart-save").click(function () {
        var productId = $(this).data("product-id");
        var heartIcon = $(this);
        $.ajax({
            url: window.location.origin + "/product-interest",
            type: "POST",
            data: {
                product_id: productId,
            },
            success: function (response) {
                if (response.status == 2) {
                    heartIcon.attr(
                        "src",
                        `${window.location.origin}/assets/images/heart.png`
                    );
                } else {
                    heartIcon.attr(
                        "src",
                        `${window.location.origin}/assets/images/heart-solid.svg`
                    );
                }
            },
            error: function (xhr, status, error) {},
        });
    });
});
