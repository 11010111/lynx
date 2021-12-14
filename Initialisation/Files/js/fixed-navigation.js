/**
 * Desktop
 * Set Fixed Navigation On Scroll
 */
(function FixedNavigationOnScrollDesktop() {
    let desktop = document.querySelector('.desktop')

    if (!desktop) return

    let navigation = desktop.querySelector('.desktop-container')

    if (!navigation) return;

    let desktopHeight = navigation.clientHeight

    let scroll = function() {
        if (window.scrollY > desktopHeight) {
            desktop.classList.add('desktop-fixed')
        } else {
            desktop.classList.remove('desktop-fixed')
        }
    }

    scroll()
    window.addEventListener('scroll', scroll)
})();

/**
 * Mobile
 * Set Fixed Navigation On Scroll
 */
(function FixedNavigationOnScrollMobile() {
    let mobile = document.querySelector('.mobile')

    if (!mobile) return

    let mobileHeight = mobile.clientHeight

    let scroll = function() {
        if (window.scrollY > mobileHeight) {
            mobile.classList.add('mobile-fixed')
        } else {
            mobile.classList.remove('mobile-fixed')
        }
    }

    scroll()
    window.addEventListener('scroll', scroll)
})();