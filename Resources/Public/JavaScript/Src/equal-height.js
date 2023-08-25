/**
 * Equal Height
 */
function equalHeight () {
  const elements = document.querySelectorAll('[data-equal-height]')

  if (!elements || elements.length === 0) {
    return
  }

  let groups = []

  elements.forEach(element => {
    let groupName = element.getAttribute('data-equal-height')

    if (!groups[groupName]) {
      groups[groupName] = []
      groups[groupName]['height'] = 0
      groups[groupName]['elements'] = document.querySelectorAll(`[data-equal-height="${groupName}"]`)
    }
  })

  function resize () {
    reset(groups)

    for (const groupsKey in groups) {
      groups[groupsKey]['elements'].forEach(element => {
        element.style.height = `${groups[groupsKey]['height']}px`
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
function equalHeightMobile () {
  const elements = document.querySelectorAll('[data-equal-height-mobile]')

  if (!elements || elements.length === 0) {
    return
  }

  let groups = []

  elements.forEach(element => {
    let groupName = element.getAttribute('data-equal-height-mobile')

    if (!groups[groupName]) {
      groups[groupName] = []
      groups[groupName]['height'] = 0
      groups[groupName]['elements'] = document.querySelectorAll(`[data-equal-height-mobile="${groupName}"]`)
    }
  })

  function resize () {
    reset(groups)

    if (window.innerWidth < 768) {
      for (const groupsKey in groups) {
        groups[groupsKey]['elements'].forEach(element => {
          element.style.height = 'auto'
        })
      }

      return
    }

    for (const groupsKey in groups) {
      groups[groupsKey]['elements'].forEach(element => {
        element.style.height = `${groups[groupsKey]['height']}px`
      })
    }
  }

  resize()
  window.addEventListener('resize', resize)
  window.equalHeightMobile = { resize }
}

function reset (groups) {
  for (const groupsKey in groups) {
    groups[groupsKey]['height'] = 0
    groups[groupsKey]['elements'].forEach(element => {
      element.style.height = 'auto'

      if (element.clientHeight > groups[groupsKey]['height']) {
        groups[groupsKey]['height'] = element.clientHeight
      }
    })
  }
}

export { equalHeight, equalHeightMobile }
