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

var totalSelectBoxes = 0;
var selectedCount = 0;
//Add attribute product to cart
function addAttributeCart(id) {
    var formData = new FormData();
    formData.append("product_id", id);
    $.ajax({
        url: window.location.origin + "/getAttributeToCart",
        type: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: formData,
        dataType: "json",
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.error == 0) {
                $("#offcanvasRight").offcanvas("show");
                var attributes = response.attribute;
                var boxHtml = "";
                $.each(attributes, function (index, attribute) {
                    boxHtml +=
                        '<div class="mb-3"><label for="attributeSelect' +
                        index +
                        '" class="name-attribute-sp">' +
                        attribute.name +
                        "</label>";
                    boxHtml +=
                        '<select id="attributeSelect' +
                        index +
                        '" class="form-select select-attribute-sp">';
                    boxHtml += '<option value="">Choose Attribute</option>';
                    $.each(attribute.value, function (id, value) {
                        boxHtml +=
                            '<option value="' +
                            value.id +
                            '">' +
                            value.name +
                            "</option>";
                    });
                    boxHtml += "</select></div>";
                });
                $(".box-attribute").html(boxHtml);
                totalSelectBoxes = $(".select-attribute-sp").length;
            }
        },
        error: function (xhr, status, error) {
            toastr.error(xhr.responseJSON.message);
        },
    });
}

$(".box-attribute").on("change", ".select-attribute-sp", function () {
    var attributeName = $(this).attr("id");
    var attributeValue = $(this).val();
    if (attributeValue !== "") {
        selectedCount++;
    } else {
        selectedCount--;
    }

    if (selectedCount === totalSelectBoxes) {
        var selectedAttributes = {};
        $(".select-attribute-sp").each(function () {
            attributeName = $(this).attr("id");
            attributeValue = $(this).val();
            selectedAttributes[attributeName] = attributeValue;
        });

        $.ajax({
            url: window.location.origin + "/getProductAttribute",
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: { attributes_value: selectedAttributes },
            dataType: "json",
            success: function (response) {
                if (response.error == 0) {
                    $(".footer-box-attr-sp").css("display", "block");
                    var productHtml = '<div class="box-sp-add-cart">';
                    productHtml += "<span>" + response.product.name + "</span>";

                    if (response.product.info_value.length > 0) {
                        productHtml += "<span>";
                        $.each(
                            response.product.info_value,
                            function (index, attributeValue) {
                                productHtml += ", " + attributeValue;
                            }
                        );
                        productHtml += "</span>";
                    }
                    productHtml +=
                        '<div class="box-line-money-sp"> <div></div> <p class="total-sp-value" >' +
                        formatNumber(response.product.total_money) +
                        " VND </p></div>";
                    productHtml += "</div>";
                    $(".box-cart-attribute").html(productHtml);
                    var footerValueCart = `<div class="line-total-quantity">
                            <span>Total quantity of product</span>
                            <div class="d-flex align-items-center">
                                <span class="money-total-cart">${formatNumber(
                                    response.product.total_money
                                )}</span>
                                (<span class="number-sp-cart">${
                                    response.product.length
                                } </span>)
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button class="btn-add-cart add-sp-value-cart" data-cart-product-id="${
                                response.product.id
                            }" data-cart-product-value="${
                        response.product.value_id
                    }">Add Cart</button>
                            <button class="btn-add-buy">Buy Now</button>
                        </div>`;
                    $(".footer-box-attr-sp").html(footerValueCart);
                }
            },
            error: function (xhr, status, error) {
                toastr.error(xhr.responseJSON.message);
            },
        });
    }
});

$(document).on("click", ".btn-add-cart.add-sp-value-cart", function () {
    var productId = $(this).data("cart-product-id");
    var productValue = $(this).data("cart-product-value");
    var formData = new FormData();
    formData.append("product_id", productId);
    formData.append("product_value", productValue);
    $.ajax({
        url: window.location.origin + "/addToCart",
        type: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: formData,
        dataType: "json",
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.error == 0) {
                toastr.success(response.message);
                //Update cart icon
                getCart(function (cartItems) {
                    $(".point-cart").html(cartItems.length);
                });
            }
        },
        error: function (xhr, status, error) {
            toastr.error(xhr.responseJSON.message);
        },
    });
});

function formatNumber(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
