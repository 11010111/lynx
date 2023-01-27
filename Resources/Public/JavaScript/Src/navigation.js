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
