var swiper_banner = new Swiper(".mySwiperBanner", {
    slidesPerView: 3,
    spaceBetween: 5,
    scrollbar: {
        el: ".swiper-scrollbar",
        hide: true,
    },
    breakpoints: {
        993: {
            slidesPerView: 3,
        },
        768: {
            slidesPerView: 2,
        },
        300: {
            slidesPerView: 1,
        },
    },
});

var swiper_outstanding = new Swiper(".outstanding", {
    spaceBetween: 10,
    slidesPerView: 3,
    freeMode: true,
    watchSlidesProgress: true,
});
var swiper_outstanding2 = new Swiper(".contentOutstanding", {
    spaceBetween: 10,
    slidesPerView: 1,
    thumbs: {
        swiper: swiper_outstanding,
    },
});

var swiper_adv = new Swiper(".swiperAdv", {
    spaceBetween: 10,
    slidesPerView: 1,
    freeMode: true,
    watchSlidesProgress: true,
    allowTouchMove: false,
});

var swiper_adver = new Swiper(".mySwiperAdver", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 200,
        modifier: 1,
        slideShadows: false,
    },
    scrollbar: {
        el: ".swiper-scrollbar",
        hide: true,
    },
    thumbs: {
        swiper: swiper_adv,
    },
    on: {
        slideChange: function () {
            $(".swiper-slide .slide-content-adv").hide();

            var activeSlide = this.slides[this.activeIndex];
            $(activeSlide).find(".slide-content-adv").show();
        },
    },
});

var swiper_styling = new Swiper(".mySwiperStyling", {
    slidesPerView: 4,
    breakpoints: {
        993: {
            spaceBetween: 20,
            slidesPerView: 4,
        },
        768: {
            spaceBetween: 20,
            slidesPerView: 2.3,
        },
        300: {
            spaceBetween: 10,
            slidesPerView: 1.3,
        },
    },
});

var swiper_video = new Swiper(".mySwiperVideo", {
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

var swiper_official = new Swiper(".mySwiperOfficial", {
    slidesPerView: 5,
    breakpoints: {
        768: {
            spaceBetween: 10,
        },
        300: {
            spaceBetween: 5,
        },
    },
});
