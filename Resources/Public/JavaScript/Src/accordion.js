function initAccordions () {
  document.querySelectorAll('.accordion')
    .forEach(initAccordion)
}

function initAccordion (accordion) {
  const header = accordion.querySelector('.accordion-header')
  const content = accordion.querySelector('.accordion-content')

  function toggleAccordion () {
    accordion.classList.toggle('accordion-close')
  }

  function resizeAccordion () {
    if (accordion.classList.contains('accordion-close')) {
      accordion.classList.remove('accordion-close')
      content.style.height = 'auto'
      content.style.height = content.clientHeight + 'px'
      accordion.classList.add('accordion-close')
      return
    }

    content.style.height = 'auto'
    content.style.height = content.clientHeight + 'px'
  }

  if (!header || !content) {
    return
  }

  content.style.height = content.clientHeight + 'px'
  toggleAccordion()

  header.addEventListener('click', toggleAccordion)

  window.addEventListener('resize', resizeAccordion)
}

export default initAccordions
