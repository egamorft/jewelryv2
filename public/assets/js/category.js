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
    $("#slider-range").slider({
        range: true,
        min: 130,
        max: 500,
        values: [130, 250],
        slide: function (event, ui) {
            $("#amount-min").val(ui.values[0] + "VND");
            $("#amount-max").val(ui.values[1] + "VND");
        },
        create: function (event, ui) {
            var initValues = $(this).slider("option", "values");
            $("#amount-min").val(initValues[0] + "VND");
            $("#amount-max").val(initValues[1] + "VND");
        },
    });
});
