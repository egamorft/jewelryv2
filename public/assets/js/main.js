$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
$(document).ready(function () {
    $(".icon-heart-product").click(function () {
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
