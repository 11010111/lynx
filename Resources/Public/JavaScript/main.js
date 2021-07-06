/*!
 * Site Package v1.0.0 ()
 * Copyright 2021 Konstantin Schneider
 * Licensed under the GPL-2.0-or-later license
 */
console.log("WE LOVE TYPO3");

/**
 * SCROLL TO TOP
 */
(function ScrollToTop() {

    let toTop = document.createElement('div');
    toTop.className = 'scroll-top';
    toTop.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><g class="icon-color">' +
        '<path d="M8 6.664l3.536 3.536.707-.707L8 5.25 3.757 9.493l.707.707z"/></g></svg>';

    toTop.addEventListener('click', function() {
        document.body.scrollIntoView();
    });

    let footer = document.querySelector('footer')

    if (footer) footer.appendChild(toTop)

    window.addEventListener('scroll', function() {
        if (window.scrollY > 250) {
            toTop.classList.add('scroll-top-active');
        } else {
            toTop.classList.remove('scroll-top-active');
        }
    });

})();

/**
 * CONVERT IMG TAG TO SVG
 */
(function ConvertIMGSVG() {

    let images = document.querySelectorAll('.svg');

    if (images != null) {
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
    }

})();

/**
 * Resize FullWidth Container
 */
(function ResizeFullWidthLeftMargin(self) {
    let container0 = document.querySelectorAll('.container--0')

    if (container0) {
        container0.forEach(function(container) {
            let container1 = container.querySelectorAll('.container--1')

            if (container1) {
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
            }
        });
    }
})(window.fullWidth = self);

/**
 * Language Select / First detect
 */
(function LanguageSelect() {
    let language = document.querySelector('#language-disabled')

    if (language) {
        let hreflang = language.querySelectorAll('.hreflang')

        let sessionLocale = window.sessionStorage.getItem('locale')
        let userLocale = window.navigator.language.split('-')[0]

        if (hreflang) {
            hreflang.forEach(function(el) {
                let existLocale = el.getAttribute('data-hreflang').split('-')[0]

                el.addEventListener('click', function() {
                    window.sessionStorage.setItem('locale', existLocale)
                });
            });

            if (!sessionLocale) {
                hreflang.forEach(function(el) {
                    let existLocale = el.getAttribute('data-hreflang').split('-')[0]
                    let link = el.firstElementChild

                    if (userLocale === existLocale) {
                        window.sessionStorage.setItem('locale', existLocale)
                        if (link) link.click()
                    }
                });
            } else {
                hreflang.forEach(function(el) {
                    let existLocale = el.getAttribute('data-hreflang').split('-')[0]
                    let link = el.querySelector('a')

                    if (sessionLocale === existLocale) {
                        window.sessionStorage.setItem('locale', existLocale)
                        if (link) link.click()
                    }
                });
            }
        }
    }
})();

/**
 * Resize Video to Container Width
 */
(function ContainerWidthEmbedVideo() {
    let video = document.querySelectorAll('.video-embed-item')

    let resize = function() {
        video = document.querySelectorAll('.video-embed-item')

        video.forEach(function(el) {
            let factor = el.parentElement.parentElement.clientWidth / el.width
            el.style.width = el.parentElement.parentElement.clientWidth + 'px'
            el.style.height = el.height * factor + 'px'
        });
    }

    if (video) {
        resize()
        window.addEventListener('resize', resize)
    }
})();

/**
 * Set Fixed Navigation On Scroll
 */
(function FixedNavigationOnScroll() {

    let desktop = document.querySelector('.desktop')
    let mobile = document.querySelector('.mobile')

    if (desktop) {
        let navigation = desktop.querySelector('.desktop-container')
        let height = navigation.clientHeight

        window.addEventListener('scroll', function() {
            if (window.scrollY > height) {
                desktop.classList.add('desktop-fixed')
            } else {
                desktop.classList.remove('desktop-fixed')
            }
        })
    }

    if (mobile) {
        let height = mobile.clientHeight

        window.addEventListener('scroll', function() {
            if (window.scrollY > height) {
                mobile.classList.add('mobile-fixed')
            } else {
                mobile.classList.remove('mobile-fixed')
            }
        })
    }

})();