/**
 * Equal Height
 */
export function equalHeight () {
  let elements = document.querySelectorAll('[data-equal-height]')

  if (!elements) return

  let groups = []

  elements.forEach(function (el) {
    let groupName = el.getAttribute('data-equal-height')

    if (!groups[groupName]) {
      groups[groupName] = []
      groups[groupName]['height'] = 0
      groups[groupName]['elements'] = document.querySelectorAll(`[data-equal-height="${groupName}"]`)
    }
  })

  let reset = function () {
    for (const groupsKey in groups) {
      groups[groupsKey]['height'] = 0
      groups[groupsKey]['elements'].forEach(function (el) {
        el.style.height = 'auto'

        if (el.clientHeight > groups[groupsKey]['height']) {
          groups[groupsKey]['height'] = el.clientHeight
        }
      })
    }
  }

  let resize = function () {
    reset()

    for (const groupsKey in groups) {
      groups[groupsKey]['elements'].forEach(function (el) {
        el.style.height = `${groups[groupsKey]['height']}px`
      })
    }
  }

  resize()
  window.addEventListener('resize', resize)
  window.equalHeight.resize = equalHeight.resize
}
