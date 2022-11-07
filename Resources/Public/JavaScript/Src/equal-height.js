/**
 * Equal Height
 */
;(function EqualHeight (self) {
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

  self.resize = function () {
    reset()

    for (const groupsKey in groups) {
      groups[groupsKey]['elements'].forEach(function (el) {
        el.style.height = `${groups[groupsKey]['height']}px`
      })
    }
  }

  self.resize()
  window.addEventListener('resize', self.resize)
})(window.equalHeight = self)