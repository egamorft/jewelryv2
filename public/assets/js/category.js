var svgExpand = document.querySelector(".svg-expand");
var svgCollapse = document.querySelector(".svg-collapse");
var boxProductCategory = document.querySelector(".box-product-category");
var iconCart = document.querySelectorAll(".icon-cart-product");
var iconHeart = document.querySelectorAll(".icon-heart-product");
var boxInforSP = document.querySelectorAll(".box-info-sp");
var rectExpand = document.querySelectorAll(".svg-expand rect");
var rectCollapse = document.querySelectorAll(".svg-collapse rect");

svgExpand.addEventListener("click", function () {
    boxProductCategory.classList.remove(
        "box-product-category-six",
        "box-product-category-four"
    );
    boxProductCategory.classList.add("box-product-category-four");
    iconCart.forEach(function (item) {
        item.style.display = "inline-block";
    });
    iconHeart.forEach(function (item) {
        item.style.display = "inline-block";
    });
    boxInforSP.forEach(function (item) {
        item.style.display = "inline-block";
    });
    rectExpand.forEach(function (rect) {
        rect.style.fill = "#000000";
    });
    rectCollapse.forEach(function (rect) {
        rect.style.fill = "#ddd";
    });
});

svgCollapse.addEventListener("click", function () {
    boxProductCategory.classList.remove(
        "box-product-category-six",
        "box-product-category-four"
    );
    boxProductCategory.classList.add("box-product-category-six");
    iconCart.forEach(function (item) {
        item.style.display = "none";
    });
    iconHeart.forEach(function (item) {
        item.style.display = "none";
    });
    boxInforSP.forEach(function (item) {
        item.style.display = "none";
    });
    rectCollapse.forEach(function (rect) {
        rect.style.fill = "#000000";
    });
    rectExpand.forEach(function (rect) {
        rect.style.fill = "#ddd";
    });
});

function fourActive() {
    var layoutStandard = document.querySelector("#m-layout-standard");
    var layoutWide = document.querySelector("#m-layout-wide");
    layoutStandard.style.display = "none";
    layoutWide.style.display = "block";
    boxProductCategory.classList.remove(
        "box-product-category-six",
        "box-product-category-four"
    );
    boxProductCategory.classList.add("box-product-category-four");
    iconCart.forEach(function (item) {
        item.style.display = "inline-block";
    });
    iconHeart.forEach(function (item) {
        item.style.display = "inline-block";
    });
    boxInforSP.forEach(function (item) {
        item.style.display = "inline-block";
    });
}

function sixActive() {
    var layoutStandard = document.querySelector("#m-layout-standard");
    var layoutWide = document.querySelector("#m-layout-wide");
    layoutStandard.style.display = "block";
    layoutWide.style.display = "none";
    boxProductCategory.classList.remove(
        "box-product-category-six",
        "box-product-category-four"
    );
    boxProductCategory.classList.add("box-product-category-six");
    iconCart.forEach(function (item) {
        item.style.display = "none";
    });
    iconHeart.forEach(function (item) {
        item.style.display = "none";
    });
    boxInforSP.forEach(function (item) {
        item.style.display = "none";
    });
}

$(function () {
    var url = new URL(window.location.href);
    var minPrice = url.searchParams.get('price_min');
    var maxPrice = url.searchParams.get('price_max');

    if (!minPrice) {
        minPrice = 100000;
    }

    if (!maxPrice) {
        maxPrice = 1000000;
    }

    $("#slider-range").slider({
        range: true,
        min: 100000,
        max: 10000000,
        step: 100000,
        values: [minPrice, maxPrice],
        slide: function (event, ui) {
            var amountMin = formatMoney(ui.values[0]);
            var amountMax = formatMoney(ui.values[1]);

            $("#amount-min").val(amountMin);
            $("#amount-max").val(amountMax);

            $("#hidden-min").val(ui.values[0]);
            $("#hidden-max").val(ui.values[1]);
        },
        create: function (event, ui) {
            var initValues = $(this).slider("option", "values");
            var amountMin = formatMoney(initValues[0]);
            var amountMax = formatMoney(initValues[1]);

            $("#amount-min").val(amountMin);
            $("#amount-max").val(amountMax);

            $("#hidden-min").val(initValues[0]);
            $("#hidden-max").val(initValues[1]);
        },
    });

    function formatMoney(amount) {
        return new Intl.NumberFormat("vi-VN", {
            style: "currency",
            currency: "VND",
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        }).format(amount);
    }
});
