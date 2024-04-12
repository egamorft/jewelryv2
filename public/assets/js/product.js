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
document
    .getElementById("fileInput")
    .addEventListener("change", function (event) {
        const files = event.target.files;
        const imageContainer = document.getElementById("imageContainer");
        imageContainer.innerHTML = "";
        const maxImages = 8;
        for (let i = 0; i < Math.min(files.length, maxImages); i++) {
            const file = files[i];
            const reader = new FileReader();
            reader.onload = function (e) {
                const imgContainer = document.createElement("div");
                imgContainer.className = "image-preview";

                const img = document.createElement("img");
                img.src = e.target.result;
                img.alt = "Image";

                const removeIcon = document.createElement("span");
                removeIcon.innerHTML = "&#10006;";
                removeIcon.className = "remove-image";
                removeIcon.addEventListener("click", function () {
                    imgContainer.remove();
                });

                imgContainer.appendChild(img);
                imgContainer.appendChild(removeIcon);
                imageContainer.appendChild(imgContainer);
            };

            reader.readAsDataURL(file);
        }
    });
getReview();

$(".title-content-search").on("keyup", function (event) {
    if (event.key === "Enter") {
        let searchKeyword = $(this).val();
        getReview(searchKeyword);
    }
});

function getReview(searchKeyword) {
    $(".content-review").html("");
    let data = {};
    let product_id = $('input[name="product_id"]').val();
    data.product_id = product_id;
    if (searchKeyword != "") {
        data.keyword = searchKeyword;
    }

    $.ajax({
        url: window.location.origin + "/get-review",
        type: "GET",
        data: data,
        success: function (response) {
            if (response.error == 0) {
                let reviews = response.data.data;
                let reviewContainer = $(".content-review");

                reviews.forEach(function (review) {
                    let item = $("<div>").addClass("item-content-review");
                    let left = $("<div>").addClass("item-left-review");
                    let stars = $("<div>").addClass(
                        "d-flex align-items-center"
                    );

                    for (let i = 0; i < 5; i++) {
                        if (i < review.star) {
                            let starImg = $("<img>")
                                .attr(
                                    "src",
                                    `${window.location.origin}/assets/images/star.png`
                                )
                                .addClass("icon-rate-name");
                            stars.append(starImg);
                        } else {
                            let starImg = $("<img>")
                                .attr(
                                    "src",
                                    `${window.location.origin}/assets/images/Icon-star.png`
                                )
                                .addClass("icon-rate-name");
                            stars.append(starImg);
                        }
                    }

                    stars.append(
                        $("<span>").text("Very good").css("font-size", "14px")
                    );
                    left.append(stars);

                    let comment = $("<div>")
                        .addClass("comment")
                        .text(review.content);
                    left.append(comment);

                    let swiperContainer = $("<div>").addClass(
                        "swiper mySwiperComment"
                    );
                    let swiperWrapper = $("<div>").addClass("swiper-wrapper");

                    for (let i = 0; i < review.image.length; i++) {
                        let swiperSlide = $("<div>").addClass("swiper-slide");
                        let img = $("<img>")
                            .attr(
                                "src",
                                `${
                                    window.location.origin +
                                    "/" +
                                    review.image[i].src
                                }`
                            )
                            .addClass("img-slide-review");
                        swiperSlide.append(img);
                        swiperWrapper.append(swiperSlide);
                    }

                    swiperContainer.append(swiperWrapper);
                    left.append(swiperContainer);

                    let right = $("<div>").addClass("item-right-review");
                    let title = $("<p>")
                        .css("font-size", "13px")
                        .css("margin-bottom", "5px")
                        .text(review.user_name + " This is your review.");
                    let descriptionText = "";
                    if (review.type_age == 1) {
                        descriptionText = "age 10 years old";
                    } else if (review.type_age == 2) {
                        descriptionText = "age 20 years old";
                    } else if (review.type_age == 3) {
                        descriptionText = "age 30 years old";
                    } else {
                        descriptionText = "age Over 40 years old";
                    }
                    let description = $("<p>")
                        .css("font-size", "13px")
                        .css("margin-bottom", "5px")
                        .text(descriptionText);
                    right.append(title, description);

                    item.append(left, right);
                    reviewContainer.append(item);
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
            }
        },
        error: function (xhr, status, error) {},
    });
}
