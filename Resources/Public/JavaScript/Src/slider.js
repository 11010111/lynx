import Swiper, { Navigation, Pagination } from 'swiper'

import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'

const swiperContainer = new Swiper('.slider-content', {
  modules: [Navigation, Pagination],
  loop: true,
  slideClass: 'slider-cell',
  pagination: {
    el: '.swiper-pagination',
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  scrollbar: {
    el: '.swiper-scrollbar',
  }
})
