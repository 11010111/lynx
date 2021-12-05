/**
 * CONVERT IMG TAG TO SVG
 */
(function ConvertIMGSVG() {
    let images = document.querySelectorAll('.svg')

    if (!images) return

    images.forEach(function(image) {
        let extSplit = image.src.split('.')
        let extension = extSplit[extSplit.length - 1].toLowerCase()

        if (extension === 'svg') {
            let xhr = new XMLHttpRequest()
            xhr.open("GET", image.src)
            xhr.overrideMimeType("image/svg+xml")
            xhr.addEventListener('load', function() {
                let svg = xhr.responseXML.documentElement

                image.classList.forEach(function(name) {
                    if (name !== 'svg') {
                        svg.classList.add(name)
                    }
                })

                //svg.classList.add('fade-in')
                image.parentElement.replaceChild(svg, image)
            })
            xhr.send()
        }
    })
})();