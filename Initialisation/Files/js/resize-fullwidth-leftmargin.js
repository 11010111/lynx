/**
 * Resize FullWidth Container
 */
(function ResizeFullWidthLeftMargin(self) {
    let content = document.querySelectorAll('.content')

    if (!content) {
        return
    }

    content.forEach(function(container) {
        let full = container.querySelectorAll('.full')

        if (!full) {
            return
        }

        let contentMain = document.querySelector('.content-main')
        let mainRect = contentMain.getClientRects()[0]
        let rem = mainRect.left

        self.resize = function() {
            full.forEach(function(el) {
                let firstDiv = el.querySelector('div')
                let rect = container.getClientRects()[0]

                firstDiv.style.width = 'unset'
				firstDiv.style.maxWidth = 'unset'

                if (window.innerWidth > rect.width + 2 * rem) {
                    firstDiv.style.width = firstDiv.clientWidth + rect.left + 'px'
                } else {
                    firstDiv.style.right = -rem + 'px'
                }
            });
        }

        self.resize()

        window.addEventListener('resize', self.resize)
    });
})(window.fullWidth = self);
