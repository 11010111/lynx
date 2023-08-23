/**
 * Set Container Background Color and Font Color
 */
function containerColors () {
  const backgrounds = document.querySelectorAll('[data-background]')
  const foregrounds = document.querySelectorAll('[data-foreground]')

  backgrounds.forEach(bg => {
    bg.style.backgroundColor = bg.getAttribute('data-background')
  })

  foregrounds.forEach(fg => {
    fg.style.color = fg.getAttribute('data-foreground')
  })
}

export { containerColors }
