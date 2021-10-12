/**
 * Set Container Background Color and Font Color
 */
(function ContainerColors() {
    let init = function() {
        let backgrounds = document.querySelectorAll('[data-background]')
        let foregrounds = document.querySelectorAll('[data-foreground]')

        backgrounds.forEach(function(bg) {
            bg.style.backgroundColor = bg.getAttribute('data-background')
        })

        foregrounds.forEach(function(fg) {
            fg.style.color = fg.getAttribute('data-foreground')
        })
    }

    init()
})();
