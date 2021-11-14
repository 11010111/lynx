/**
 * Container Alignment
 */
(function Alignment(self) {
    let contentMain = document.querySelector('.content-main')
    let alignment = document.querySelectorAll('[data-alignment]')

    if (!alignment && !contentMain) {
        return
    }

    let mainRect = contentMain.getClientRects()[0]

    self.resize = function() {
        alignment.forEach(function (container) {
            let align = container.getAttribute('data-alignment')
            let maxWidth = container.getAttribute('data-maxwidth')

            if (!align) {
                return
            }

            if (!maxWidth) {
                container.setAttribute('data-maxwidth', container.style.maxWidth)
                maxWidth = container.style.maxWidth
            }

            let rem = mainRect[align]

            if (window.innerWidth - maxWidth >= 0) {
                container.style.maxWidth = maxWidth + (window.innerWidth - maxWidth) + rem + 'px'
                container.style.marginLeft = -rem + 'px'
            } else {
                container.style.marginLeft = -rem + 'px'
            }
        })
    }

    self.resize()
    window.addEventListener('resize', self.resize)
})(window.alignment = self);
