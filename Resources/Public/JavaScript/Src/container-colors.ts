/**
 * Set Container Background Color and Font Color
 */
function containerColors (): void {
  const backgrounds = document.querySelectorAll<HTMLElement>('[data-background]')
  const foregrounds = document.querySelectorAll<HTMLElement>('[data-foreground]')

  backgrounds.forEach(element => {
    element.style.backgroundColor = element.getAttribute('data-background') ?? ''
  })

  foregrounds.forEach(element => {
    element.style.color = element.getAttribute('data-foreground') ?? ''
  })
}

export { containerColors }
