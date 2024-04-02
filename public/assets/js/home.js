var swiper = new Swiper(".mySwiperBanner", {
    slidesPerView: 3,
    spaceBetween: 5,
    scrollbar: {
        el: ".swiper-scrollbar",
        hide: true,
    },
});

var swiper = new Swiper(".outstanding", {
    spaceBetween: 10,
    slidesPerView: 15,
    freeMode: true,
    watchSlidesProgress: true,
});
var swiper2 = new Swiper(".contentOutstanding", {
    spaceBetween: 10,
    slidesPerView: 1,
    thumbs: {
        swiper: swiper,
    },
});

var swiper = new Swiper(".mySwiperStyling", {
    slidesPerView: 4,
    spaceBetween: 20,
});

var swiper = new Swiper(".mySwiperOfficial", {
    slidesPerView: 5,
    spaceBetween: 10,
});
