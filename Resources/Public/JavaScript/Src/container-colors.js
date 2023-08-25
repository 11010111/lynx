/**
 * Set Container Background Color and Font Color
 */
function containerColors () {
  const backgrounds = document.querySelectorAll('[data-background]')
  const foregrounds = document.querySelectorAll('[data-foreground]')

  backgrounds.forEach(element => {
    element.style.backgroundColor = element.getAttribute('data-background')
  })

  foregrounds.forEach(element => {
    element.style.color = element.getAttribute('data-foreground')
  })
}

export { containerColors }
