/**
 * Base Initialisation for Container Slider
 */
import Swiper from './plugins/swiper-bundle.esm.browser.min.js'

const swiperContainer = new Swiper('.slider-content', {
    // Optional parameters
    loop: true,
    slideClass: 'slider-cell',

    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    // And if we need scrollbar
    scrollbar: {
        el: '.swiper-scrollbar',
    },
});
