const accordions = document.querySelectorAll('.accordion')

accordions.forEach(acc => {
  const header = acc.querySelector('.accordion-header')
  const content = acc.querySelector('.accordion-content')

  if (!header || !content) {
    return
  }

  content.style.height = content.clientHeight + 'px'
  acc.classList.toggle('accordion-close')

  header.addEventListener('click', () => {
    acc.classList.toggle('accordion-close')
  })

  window.addEventListener('resize', () => {
    if (acc.classList.contains('accordion-close')) {
      acc.classList.remove('accordion-close')
      content.style.height = 'auto'
      content.style.height = content.clientHeight + 'px'
      acc.classList.add('accordion-close')
    } else {
      content.style.height = 'auto'
      content.style.height = content.clientHeight + 'px'
    }
  })
})
