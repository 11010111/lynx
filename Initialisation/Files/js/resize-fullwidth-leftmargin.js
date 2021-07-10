/**
 * Resize FullWidth Container
 */
(function ResizeFullWidthLeftMargin(self) {
    let container0 = document.querySelectorAll('.container--0')

    if (!container0) {
        return
    }

    container0.forEach(function(container) {
        let container1 = container.querySelectorAll('.container--1')

        if (!container1) {
            return
        }

        let contentMain = document.querySelector('.content-main')
        let mainRect = contentMain.getClientRects()[0]
        let rem = mainRect.left

        self.resize = function() {
            container1.forEach(function(el) {
                let firstDiv = el.querySelector('div')
                let rect = container.getClientRects()[0]

                el.style.position = 'relative'

                firstDiv.style.maxWidth = 'unset'
                firstDiv.style.position = 'absolute'
                firstDiv.style.width = 'unset'
                firstDiv.style.left = '0px'

                if (window.innerWidth > rect.width + 2 * rem) {
                    firstDiv.style.right = -rect.left + 'px'
                } else {
                    firstDiv.style.right = -rem + 'px'
                }

                el.style.height = firstDiv.clientHeight + rect.left + 'px'
            });
        }

        self.resize()

        window.addEventListener('resize', self.resize)
    });
})(window.fullWidth = self);
