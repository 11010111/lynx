function initAccordions () {
  document.querySelectorAll<HTMLElement>('.accordion')
    .forEach(initAccordion)
}

function initAccordion (accordion: HTMLElement): void {
  const header = accordion.querySelector<HTMLElement>('.accordion-header')
  const content = accordion.querySelector<HTMLElement>('.accordion-content')

  function toggleAccordion (): void {
    accordion.classList.toggle('accordion-close')
  }

  function resizeAccordion (): void {
    if (!content) {
      return
    }

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
