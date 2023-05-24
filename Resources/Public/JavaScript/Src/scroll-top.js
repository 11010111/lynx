/**
 * SCROLL TO TOP
 */
const scrollToTop = () => {
  const footer = document.querySelector('footer')

  if (!footer) return

  const toTop = document.createElement('div')
  toTop.className = 'scroll-top'
  toTop.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><g class="icon-color"><path d="M8 6.664l3.536 3.536.707-.707L8 5.25 3.757 9.493l.707.707z"/></g></svg>'

  toTop.addEventListener('click', () => {
    document.body.scrollIntoView()
  })

  footer.appendChild(toTop)

  window.addEventListener('scroll', () => {
    if (window.scrollY > 250) {
      toTop.classList.add('scroll-top-active')
    } else {
      toTop.classList.remove('scroll-top-active')
    }
  })
}

export { scrollToTop }
