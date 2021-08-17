/**
 * EqualHeight
 * @param selector
 * @param groups
 */
function equalHeight(selector = '.equal-height', groups = true) {
    let elements = document.querySelectorAll(selector)

    if (!elements) return

    let equalHeight = 0

    let read = function() {
        elements.forEach(function(el) {
            if (groups) {
                let parent = el.parentElement
                let dataHeight = parent.getAttribute(
                    'data-equal-height'
                )

                if (el.clientHeight > dataHeight) {
                    parent.setAttribute(
                        'data-equal-height',
                        Math.floor(el.clientHeight).toString()
                    )
                }
            } else {
                if (el.clientHeight > equalHeight) {
                    equalHeight = Math.floor(el.clientHeight)
                }
            }
        })
    }

    let write = function() {
        elements.forEach(function(el) {
            if (groups) {
                let parent = el.parentElement
                let dataHeight = parent.getAttribute(
                    'data-equal-height'
                )
                el.style.height = dataHeight + 'px'
            } else {
                el.style.height = equalHeight + 'px'
            }
        })
    }

    let resize = function() {
        elements.forEach(function(el) {
            if (groups) {
                let parent = el.parentElement
                parent.setAttribute(
                    'data-equal-height',
                    '0'
                )
            } else if (equalHeight > 0) {
                equalHeight = 0
            }
            el.style.height = 'auto'
        })
        read()
        write()
    }

    resize()
    window.addEventListener('resize', resize)
}

// Basic init
equalHeight()

// Custom init example without groups
equalHeight('.example-class', false)
