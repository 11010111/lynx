/**
 * Accordion
 */
(function Accordion() {
  let accordions = document.querySelectorAll('.accordion')

  if (!accordions) {
    return
  }

  setTimeout(function () {
    accordions.forEach(acc => {
      let header = acc.querySelector('.accordion-header')
      let content = acc.querySelector('.accordion-content')

      if (!header) {
        return
      }

      content.style.height = `${content.clientHeight}px`
      acc.classList.toggle('accordion-close')

      header.addEventListener('click', function () {
        acc.classList.toggle('accordion-close')
      })
    })
  })
})();
