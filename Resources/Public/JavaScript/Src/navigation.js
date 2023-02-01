/**
 * Set Navigation Background on scroll
 */
export function PageScroll() {
  const scroll = () => {
    if (window.scrollY > 0) {
      document.body.classList.add('page-scroll')
    } else {
      document.body.classList.remove('page-scroll')
    }
  }

  scroll()
  window.addEventListener('scroll', scroll)
}

/**
 * Scroll Padding Top Variable
 */
export function ScrollPaddingTop() {
  const root = document.querySelector(':root')
  const pageNavigation = document.querySelector('.page-navigation')

  if (!pageNavigation) return
  
  const resize = () => {
    root.style.setProperty('--scroll-padding-top', Math.floor(pageNavigation.clientHeight) + 'px')
  }

  resize()
  window.addEventListener('resize', resize)
}
