# Condo app with stymulus and turbo


### stimulus-carousel
    <div
        data-controller="carousel"
        data-carousel-options-value='{
        "spaceBetween": 30,
        "centeredSlides": true,
        "autoplay": { "delay": 4500,
                      "disableOnInteraction": false },
        "pagination": { "el": ".swiper-pagination",
                        "dynamicBullets": "true" },
        "navigation": { "nextEl": ".swiper-button-next",
                        "prevEl": ".swiper-button-prev"}}'
        class="intro intro-carousel swiper position-relative"
    >

        <div class="swiper-wrapper">
            <div class="swiper-slide">Slide 1</div>
            <div class="swiper-slide">Slide 2</div>
            <div class="swiper-slide">Slide 3</div>
        </div>

        <!-- At the very end of the div element -->
        <div class="swiper-pagination"></div>
        <!-- Navigation buttons (< >) -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>

more options in "https://swiperjs.com/demos"