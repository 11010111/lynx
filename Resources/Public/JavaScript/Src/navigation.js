/**
 * Set Navigation Background on scroll
 */
function pageScroll () {
  scroll()
  window.addEventListener('scroll', scroll)
}

/**
 * Scroll Padding Top Variable
 */
const scrollPaddingTop = () => {
  const root = document.querySelector(':root')
  const pageNavigation = document.querySelector('.page-navigation')

  if (!pageNavigation) return

  function resize () {
    root.style.setProperty('--scroll-padding-top', Math.floor(pageNavigation.clientHeight) + 'px')
  }

  resize()
  window.addEventListener('resize', resize)
}

function scroll () {
  if (window.scrollY > 0) {
    document.body.classList.add('page-scroll')
  } else {
    document.body.classList.remove('page-scroll')
  }
}

export { pageScroll, scrollPaddingTop }
