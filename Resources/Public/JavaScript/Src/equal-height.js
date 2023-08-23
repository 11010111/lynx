/**
 * Equal Height
 */
function equalHeight () {
  const elements = document.querySelectorAll('[data-equal-height]')

  if (!elements) return

  let groups = []

  elements.forEach(el => {
    let groupName = el.getAttribute('data-equal-height')

    if (!groups[groupName]) {
      groups[groupName] = []
      groups[groupName]['height'] = 0
      groups[groupName]['elements'] = document.querySelectorAll(`[data-equal-height="${groupName}"]`)
    }
  })

  function resize () {
    reset(groups)

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
function equalHeightMobile () {
  const elements = document.querySelectorAll('[data-equal-height-mobile]')

  if (!elements) return

  let groups = []

  elements.forEach(el => {
    let groupName = el.getAttribute('data-equal-height-mobile')

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

function reset (groups) {
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

export { equalHeight, equalHeightMobile }
