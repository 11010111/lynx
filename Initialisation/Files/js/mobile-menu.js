/**
 * Mobile Menu Click Events
 */
(function MobileMenu() {

    let mobileMenu = document.querySelector('.mobile-menu')

    if (!mobileMenu) {
        return
    }

    let parent = mobileMenu.querySelectorAll('.has-children')

    parent.forEach(function(par) {
        if (par.firstElementChild.classList.contains('active')) {
            par.classList.add('parent-open')
        }

        par.addEventListener('click', function() {
            if (!par.classList.contains('parent-open')) {
                parent.forEach(function(p) {
                    p.classList.remove('parent-open')
                })

                par.classList.add('parent-open')
            } else {
                par.classList.toggle('parent-open')
            }
        })
    })

})();
