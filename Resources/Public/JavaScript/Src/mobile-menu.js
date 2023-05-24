/**
 * Mobile Menu Click Events
 */
const mobileMenu = () => {
  const mobileMenu = document.querySelector('.mobile-menu')

  if (!mobileMenu) return

  const parent = mobileMenu.querySelectorAll('.has-children')

  parent.forEach((par) => {
    if (par.firstElementChild.classList.contains('active')) {
      par.classList.add('parent-open')
    }

    par.addEventListener('click', () => {
      if (!par.classList.contains('parent-open')) {
        parent.forEach((p) => {
          p.classList.remove('parent-open')
        })

        par.classList.add('parent-open')
      } else {
        par.classList.toggle('parent-open')
      }
    })
  })
}

export { mobileMenu }
