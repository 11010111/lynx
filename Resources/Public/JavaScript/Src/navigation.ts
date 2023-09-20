/**
 * Set Navigation Background on scroll
 */
function pageScroll (): void {
  scroll()
  window.addEventListener('scroll', scroll)
}

/**
 * Scroll Padding Top Variable
 */
function scrollPaddingTop (): void {
  const root = document.querySelector<HTMLHtmlElement>(':root')
  const pageNavigation = document.querySelector<HTMLDivElement>('.page-navigation')

  if (!pageNavigation || !root) {
    return
  }

  function resize (): void {
    if (pageNavigation && root) {
      root.style.setProperty('--scroll-padding-top', Math.floor(pageNavigation.clientHeight) + 'px')
    }
  }

  resize()
  window.addEventListener('resize', resize)
}

function scroll (): void {
  window.scrollY > 0 ? document.body.classList.add('page-scroll') : document.body.classList.remove('page-scroll')
}

export { pageScroll, scrollPaddingTop }
