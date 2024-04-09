var swiper_banner = new Swiper(".mySwiperBannerStyling", {
    slidesPerView: 3,
    spaceBetween: 5,
    scrollbar: {
        el: ".swiper-scrollbar",
        hide: true,
    },
    breakpoints: {
        768: {
            slidesPerView: 3,
        },
        300: {
            slidesPerView: 1,
        },
    },
});

$("#load-more-btn").on("click", function () {
    var offset = $(this).data("offset");
    var styling_id = $('input[name="styling_id"]').val();
    $.ajax({
        url: window.location.origin + "/load-more-products-styling",
        type: "GET",
        data: { offset: offset, styling_id: styling_id },
        success: function (response) {
            if (response.length > 0) {
                response.forEach(function (product) {
                    var finalPrice = formatNumber(
                        product.info.discount > 0
                            ? product.info.price -
                                  (product.info.price * product.info.discount) /
                                      100
                            : product.info.price
                    );
                    $("#product-container").append(
                        '<div class="item-product-shop"><img src="' +
                            product.info.thumbnail_img +
                            '" class="w-100"><div class="box-content-img"><p class="title-contnet-img">' +
                            product.info.name +
                            '</p><p class="title-contnet-img">' +
                            finalPrice +
                            " VND</p></div></div>"
                    );
                });
                $("#load-more-btn").data("offset", offset + response.length);
            } else {
                $("#load-more-btn").remove();
            }
        },
        error: function (xhr, status, error) {
            console.error(error);
        },
    });
});

$("#load-more-styling").on("click", function () {
    var offset = $(this).data("offset");
    $.ajax({
        url: window.location.origin + "/load-more-styling",
        type: "GET",
        data: { offset: offset },
        success: function (response) {
            if (response.length > 0) {
                response.forEach(function (styling) {
                    $(".box-content-styling").append(
                        `<a href="${window.location.origin}/detail-styling/` +
                            styling.id +
                            `"><img src="${window.location.origin}/${styling.src}" class="w-100"><p class="title-styling">` +
                            styling.title +
                            '</p><p class="content-styling">' +
                            styling.describe +
                            "</p></a>"
                    );
                });
                $("#load-more-styling").data(
                    "offset",
                    offset + response.length
                );
            } else {
                $("#load-more-styling").remove();
            }
        },
        error: function (xhr, status, error) {
            console.error(error);
        },
    });
});

function formatNumber(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
