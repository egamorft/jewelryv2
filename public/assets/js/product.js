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
        let selectedStar = $(
            ".dropdown-menu input[type='radio']:checked"
        ).val();
        let selectedAge = $(".item-age.active-age").data("age");
        $(".content-review").html("");
        getReview(searchKeyword, selectedStar, selectedAge, 1);
    }
});

$(".btn-save-rate").on("click", function () {
    let selectedStar = $(".dropdown-menu input[type='radio']:checked").val();
    $(".dropdown-menu-star").removeClass("show");
    let searchKeyword = $('input[name="keySearch"]').val();
    let selectedAge = $(".item-age.active-age").data("age");
    $(".content-review").html("");
    getReview(searchKeyword, selectedStar, selectedAge, 1);
});

$(".reset-star").on("click", function () {
    $("input[type='radio']").prop("checked", false);
    let selectedAge = $(".item-age.active-age").data("age");
    let searchKeyword = $('input[name="keySearch"]').val();
    let selectedStar = $(".dropdown-menu input[type='radio']:checked").val();
    $(".content-review").html("");
    getReview(searchKeyword, selectedStar, selectedAge, 1);
});

$(".item-age").on("click", function () {
    $(".item-age").removeClass("active-age");
    $(this).addClass("active-age");
});

$(".btn-save-age").on("click", function () {
    $(".dropdown-menu-age").removeClass("show");
    let selectedAge = $(".item-age.active-age").data("age");
    let searchKeyword = $('input[name="keySearch"]').val();
    let selectedStar = $(".dropdown-menu input[type='radio']:checked").val();
    $(".content-review").html("");
    getReview(searchKeyword, selectedStar, selectedAge, 1);
});

$(".reset-age").on("click", function () {
    $(".item-age").removeClass("active-age");
    let selectedAge = $(".item-age.active-age").data("age");
    let searchKeyword = $('input[name="keySearch"]').val();
    let selectedStar = $(".dropdown-menu input[type='radio']:checked").val();
    $(".content-review").html("");
    getReview(searchKeyword, selectedStar, selectedAge, 1);
});
const csrfToken = $('meta[name="csrf-token"]').attr("content");
function getReview(searchKeyword, selectedStar, selectedAge, page) {
    $(".line-see-more").html("");
    let data = {};
    let product_id = $('input[name="product_id"]').val();
    data.product_id = product_id;
    data.page = page;
    if (searchKeyword) {
        data.keyword = searchKeyword;
    }
    if (selectedStar) {
        data.star = selectedStar;
    }
    if (selectedAge) {
        data.age = selectedAge;
    }

    $.ajax({
        url: window.location.origin + "/get-review",
        type: "GET",
        data: data,
        success: function (response) {
            if (response.error == 0) {
                let reviews = response.data.data;
                let reviewContainer = $(".content-review");
                let lineSeeMore = $(".line-see-more");
                let currentPage = response.data.current_page;

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

                    let accordion = $("<div>").addClass(
                        "accordion accordion-flush"
                    );
                    let accordionItem = $("<div>").addClass("accordion-item");
                    let accordionHeader = $("<h2>")
                        .addClass("accordion-header")
                        .attr("id", `flush-heading${review.id}`);
                    let accordionButton = $("<p>")
                        .addClass("accordion-button collapsed feedback-more")
                        .attr("data-bs-toggle", "collapse")
                        .attr("data-bs-target", `#flush-collapse${review.id}`)
                        .attr("aria-expanded", "false")
                        .attr("aria-controls", `flush-collapse${review.id}`)
                        .text(`Feedback (${review.feedback.length})`);

                    let accordionCollapse = $("<div>")
                        .addClass("accordion-collapse collapse")
                        .attr("id", `flush-collapse${review.id}`)
                        .attr("aria-labelledby", `flush-heading${review.id}`)
                        .attr("data-bs-parent", "#accordionFlushExample");

                    let accordionBody = $("<div>").addClass("accordion-body");
                    let contentFeedback =
                        $("<div>").addClass("content-feedback");

                    review.feedback.forEach(function (feedbackItem) {
                        let itemFeedback = $("<div>").addClass("item-feedback");
                        let nameUserFeedback = $("<p>")
                            .addClass("name_user_feedback")
                            .text(feedbackItem.name);
                        let contentUserFeedback = $("<div>")
                            .addClass("content-user-feedback")
                            .text(feedbackItem.content);

                        itemFeedback.append(
                            nameUserFeedback,
                            contentUserFeedback
                        );
                        contentFeedback.append(itemFeedback);
                    });

                    let feedbackForm = $("<form>")
                        .attr(
                            "action",
                            `${window.location.origin}/save-review-feedback`
                        )
                        .attr("method", "post")
                        .attr("enctype", "multipart/form-data");

                    feedbackForm.append(
                        $("<input>")
                            .attr("type", "hidden")
                            .attr("name", "_token")
                            .val(csrfToken),
                        $("<input>")
                            .attr("type", "hidden")
                            .attr("name", "review_id")
                            .val(review.id),
                        $("<input>")
                            .attr("type", "text")
                            .addClass("input-feedback")
                            .attr("name", "name")
                            .attr("maxlength", "255")
                            .attr("placeholder", "Full name"),
                        $("<textarea>")
                            .attr("name", "content")
                            .addClass("input-feedback")
                            .attr("rows", "2")
                            .attr("placeholder", "Content"),
                        $("<div>")
                            .addClass("line-send-feedback")
                            .append(
                                $("<button>")
                                    .attr("type", "submit")
                                    .addClass("btn-send-feedback")
                                    .text("Send")
                            )
                    );

                    accordionBody.append(contentFeedback, feedbackForm);
                    accordionCollapse.append(accordionBody);
                    accordionHeader.append(accordionButton);
                    accordionItem.append(accordionHeader, accordionCollapse);
                    accordion.append(accordionItem);

                    left.append(accordion);

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

                if (reviews.length == 1) {
                    let seeMore = `<span class="btn-see-more-review">See more</span>`;
                    lineSeeMore.append(seeMore);
                }

                $(".btn-see-more-review").on("click", function () {
                    let selectedAge = $(".item-age.active-age").data("age");
                    let searchKeyword = $('input[name="keySearch"]').val();
                    let selectedStar = $(
                        ".dropdown-menu input[type='radio']:checked"
                    ).val();
                    getReview(
                        searchKeyword,
                        selectedStar,
                        selectedAge,
                        currentPage + 1
                    );
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
