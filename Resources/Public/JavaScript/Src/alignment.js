/**
 * Container Alignment
 */
export function alignment () {
  let alignment = document.querySelectorAll('[data-alignment]')

  if (!alignment) {
    return
  }

  let isTouchDevice = function () {
    return window.matchMedia('(pointer: coarse)').matches
  }

  let resize = function () {
    let contentMain = document.querySelector('.content-main')

    if (!contentMain) {
      return
    }

    let mainRect = contentMain.getClientRects()[0]

    alignment.forEach(function (container) {
      let align = container.getAttribute('data-alignment')
      let maxWidth = container.getAttribute('data-maxwidth')

      if (align) {
        if (maxWidth == null) {
          let style = getComputedStyle(container)
          let maxW = style['max-width']
          maxWidth = Math.floor(maxW.replace('px', ''))
          container.setAttribute('data-maxwidth', maxWidth)
        }

        let rem = mainRect.left

        if (window.innerWidth - maxWidth > 0) {
          if (isTouchDevice()) {
            container.style.maxWidth = Number(maxWidth) + Math.floor(Number(window.innerWidth - maxWidth) / 2) + 'px'
          } else {
            container.style.maxWidth = Number(maxWidth) + Math.floor(Number(window.innerWidth - maxWidth - 8) / 2) + 'px'
          }

          container.style.width = `calc(100% + ${rem}px`
        } else {
          container.style.width = `calc(100% + ${rem}px`
        }

        if (align === 'left') {
          container.style.marginLeft = `${-rem}px`
        } else {
          container.style.marginRight = `${-rem}px`
        }
      }
    })
  }

  resize()
  window.addEventListener('resize', resize)
}
