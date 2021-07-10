/**
 * CONVERT IMG TAG TO SVG
 */
(function ConvertIMGSVG() {

    let images = document.querySelectorAll('.svg');

    if (!images) {
        return
    }

    for (let i = 0; i < images.length; i += 1) {
        let extSplit = images[i].src.split('.');
        let extension = extSplit[extSplit.length - 1].toLowerCase();

        if (extension === 'svg') {
            let xhr = new XMLHttpRequest();
            xhr.open("GET",images[i].src);
            xhr.overrideMimeType("image/svg+xml");
            xhr.addEventListener('load', function() {
                let svg = xhr.responseXML.documentElement;
                svg.classList.add('fade-in');
                images[i].parentElement.replaceChild(svg, images[i]);
            });
            xhr.send();
        }
    }

})();
