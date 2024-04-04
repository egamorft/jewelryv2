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
