/**
 * EqualHeight
 * @param selector
 * @param groupName
 * @param groups
 */
function equalHeight(selector = '.equal-height', groupName = '', groups = true) {
    let allGroups
    let onlyElements

    if (groupName) {
        allGroups = document.querySelectorAll(groupName)

        if (!allGroups) return
    } else {
        onlyElements = document.querySelectorAll(selector)

        if (!onlyElements) return
    }

    let equalHeight = 0

    let read = function() {
        if (allGroups) {
            allGroups.forEach(function(grp) {
                let elements = grp.querySelectorAll(selector)

                if (!elements) return

                elements.forEach(function(el) {
                    if (groups) {
                        let dataHeight = grp.getAttribute(
                            'data-equal-height'
                        )

                        if (el.clientHeight > dataHeight) {
                            grp.setAttribute(
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
            })
        } else {
            onlyElements.forEach(function(el) {
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
    }

    let write = function() {
        if (allGroups) {
            allGroups.forEach(function(grp) {
                let elements = grp.querySelectorAll(selector)

                if (!elements) return

                elements.forEach(function(el) {
                    if (groups) {
                        let dataHeight = grp.getAttribute(
                            'data-equal-height'
                        )
                        el.style.height = dataHeight + 'px'
                    } else {
                        el.style.height = equalHeight + 'px'
                    }
                })
            })
        } else {
            onlyElements.forEach(function(el) {
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
    }

    let resize = function() {
        if (allGroups) {
            allGroups.forEach(function(grp) {
                let elements = grp.querySelectorAll(selector)

                if (!elements) return

                elements.forEach(function(el) {
                    if (groups) {
                        grp.setAttribute(
                            'data-equal-height',
                            '0'
                        )
                    } else if (equalHeight > 0) {
                        equalHeight = 0
                    }
                    el.style.height = 'auto'
                })
            })

            read()
            write()
        } else {
            onlyElements.forEach(function(el) {
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
    }

    resize()
    window.addEventListener('resize', resize)
}

// Basic init - Basic Group
equalHeight()

// Basic init - Basic Group
equalHeight('.equal-height', '.example-group')

// Custom init example without groups
equalHeight('.example-class', false)
