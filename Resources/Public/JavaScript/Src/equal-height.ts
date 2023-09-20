type GroupRecord = {
  height: number,
  elements: NodeListOf<HTMLElement>,
}

let windowEqualHeight = {
  resize: () => {},
}

let windowEqualHeightMobile = {
  resize: () => {},
}

/**
 * Equal Height
 */
function equalHeight (): void {
  const elements = document.querySelectorAll<HTMLElement>('[data-equal-height]')

  if (!elements || elements.length === 0) {
    return
  }

  let groups: Record<string, GroupRecord> = {}

  elements.forEach(element => {
    const groupName = element.getAttribute('data-equal-height') ?? ''

    if (!groups[groupName]) {
      groups[groupName] = {
        height: 0,
        elements: document.querySelectorAll<HTMLElement>(`[data-equal-height="${groupName}"]`)
      }
    }
  })

  function resize (): void {
    reset(groups)

    for (const groupsKey in groups) {
      groups[groupsKey].elements.forEach(element => {
        element.style.height = `${groups[groupsKey].height}px`
      })
    }
  }

  resize()
  window.addEventListener('resize', resize)
  windowEqualHeight.resize = resize
}

/**
 * Equal Height Mobile
 */
function equalHeightMobile (): void {
  const elements = document.querySelectorAll<HTMLElement>('[data-equal-height-mobile]')

  if (!elements || elements.length === 0) {
    return
  }

  let groups: Record<string, GroupRecord> = {}

  elements.forEach(element => {
    const groupName = element.getAttribute('data-equal-height-mobile') ?? ''

    if (!groups[groupName]) {
      groups[groupName] = {
        height: 0,
        elements: document.querySelectorAll<HTMLElement>(`[data-equal-height-mobile="${groupName}"]`)
      }
    }
  })

  function resize (): void {
    reset(groups)

    if (window.innerWidth < 768) {
      for (const groupsKey in groups) {
        groups[groupsKey].elements.forEach(element => {
          element.style.height = 'auto'
        })
      }

      return
    }

    for (const groupsKey in groups) {
      groups[groupsKey].elements.forEach(element => {
        element.style.height = `${groups[groupsKey].height}px`
      })
    }
  }

  resize()
  window.addEventListener('resize', resize)
  windowEqualHeightMobile.resize = resize
}

function reset (groups: Record<string, GroupRecord>): void {
  for (const groupsKey in groups) {
    groups[groupsKey].height = 0
    groups[groupsKey].elements.forEach(element => {
      element.style.height = 'auto'

      if (element.clientHeight > groups[groupsKey].height) {
        groups[groupsKey].height = element.clientHeight
      }
    })
  }
}

export { equalHeight, equalHeightMobile }
