/**
 * Language Select / First detect - Beta
 */
(function LanguageSelect() {
    let language = document.querySelector('#language-disabled')

    if (!language) {
        return
    }

    let hreflang = language.querySelectorAll('.hreflang')

    let sessionLocale = window.sessionStorage.getItem('locale')
    let userLocale = window.navigator.language.split('-')[0]

    if (!hreflang) {
        return
    }

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
})();
