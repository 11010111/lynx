/**
 * Mobile Menu Click Events
 */
function mobileMenu (): void {
  const mobileMenu = document.querySelector<HTMLDivElement>('.mobile-menu')

  if (!mobileMenu) {
    return
  }

  const parents = mobileMenu.querySelectorAll<HTMLUListElement>('.has-children')

  parents.forEach(parent => {
    if (parent.firstElementChild?.classList.contains('active')) {
      parent.classList.add('parent-open')
    }

    parent.addEventListener('click', () => {
      if (parent.classList.contains('parent-open')) {
        parent.classList.toggle('parent-open')
        return
      }

      parents.forEach(element => {
        element.classList.remove('parent-open')
      })

      parent.classList.add('parent-open')
    })
  })
}

export { mobileMenu }
