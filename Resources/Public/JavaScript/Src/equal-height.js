/**
 * Equal Height
 */
const equalHeight = () => {
  const elements = document.querySelectorAll('[data-equal-height]')

  if (!elements) return

  let groups = []

  elements.forEach((el) => {
    let groupName = el.getAttribute('data-equal-height')

    if (!groups[groupName]) {
      groups[groupName] = []
      groups[groupName]['height'] = 0
      groups[groupName]['elements'] = document.querySelectorAll(`[data-equal-height="${groupName}"]`)
    }
  })

  const reset = () => {
    for (const groupsKey in groups) {
      groups[groupsKey]['height'] = 0
      groups[groupsKey]['elements'].forEach((el) => {
        el.style.height = 'auto'

        if (el.clientHeight > groups[groupsKey]['height']) {
          groups[groupsKey]['height'] = el.clientHeight
        }
      })
    }
  }

  const resize = () => {
    reset()

    for (const groupsKey in groups) {
      groups[groupsKey]['elements'].forEach((el) => {
        el.style.height = `${groups[groupsKey]['height']}px`
      })
    }
  }

  resize()
  window.addEventListener('resize', resize)
  window.equalHeight = { resize }
}

/**
 * Equal Height Mobile
 */
const equalHeightMobile = () => {
  const elements = document.querySelectorAll('[data-equal-height-mobile]')

  if (!elements) return

  let groups = []

  elements.forEach((el) => {
    let groupName = el.getAttribute('data-equal-height-mobile')

    if (!groups[groupName]) {
      groups[groupName] = []
      groups[groupName]['height'] = 0
      groups[groupName]['elements'] = document.querySelectorAll(`[data-equal-height-mobile="${groupName}"]`)
    }
  })

  const reset = () => {
    for (const groupsKey in groups) {
      groups[groupsKey]['height'] = 0
      groups[groupsKey]['elements'].forEach((el) => {
        el.style.height = 'auto'

        if (el.clientHeight > groups[groupsKey]['height']) {
          groups[groupsKey]['height'] = el.clientHeight
        }
      })
    }
  }

  const resize = () => {
    reset()

    if (window.innerWidth < 768) {
      for (const groupsKey in groups) {
        groups[groupsKey]['elements'].forEach((el) => {
          el.style.height = 'auto'
        })
      }
    } else {
      for (const groupsKey in groups) {
        groups[groupsKey]['elements'].forEach((el) => {
          el.style.height = `${groups[groupsKey]['height']}px`
        })
      }
    }
  }

  resize()
  window.addEventListener('resize', resize)
  window.equalHeightMobile = { resize }
}

export { equalHeight, equalHeightMobile }
