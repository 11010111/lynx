/**
 * Resize Video to Container Width
 */
(function ContainerWidthEmbedVideo() {
    let video = document.querySelectorAll('.iframe-embed-item')

    if (!video) {
        return
    }

    let resize = function() {
        video = document.querySelectorAll('.iframe-embed-item')

        video.forEach(function(el) {
            let factor = el.parentElement.parentElement.clientWidth / el.width
            el.style.width = el.parentElement.parentElement.clientWidth + 'px'
            el.style.height = el.height * factor + 'px'
        });
    }

    resize()
    window.addEventListener('resize', resize)
})();
