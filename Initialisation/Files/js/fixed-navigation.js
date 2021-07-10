/**
 * Set Fixed Navigation On Scroll
 */
(function FixedNavigationOnScroll() {

    let desktop = document.querySelector('.desktop')
    let mobile = document.querySelector('.mobile')

    if (!desktop) {
        return
    }

    let navigation = desktop.querySelector('.desktop-container')
    let desktopHeight = navigation.clientHeight

    window.addEventListener('scroll', function() {
        if (window.scrollY > desktopHeight) {
            desktop.classList.add('desktop-fixed')
        } else {
            desktop.classList.remove('desktop-fixed')
        }
    });

    if (!mobile) {
        return
    }

    let mobileHeight = mobile.clientHeight

    window.addEventListener('scroll', function() {
        if (window.scrollY > mobileHeight) {
            mobile.classList.add('mobile-fixed')
        } else {
            mobile.classList.remove('mobile-fixed')
        }
    });

})();
