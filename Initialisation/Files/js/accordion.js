/**
 * Accordion
 */
(function Accordion() {
    let accordions = document.querySelectorAll('.accordion')

    if (!accordions) {
        return
    }

    setTimeout(function() {
		accordions.forEach(function(acc) {
            let header = acc.querySelector('header')
            let content = acc.querySelector('.accordion-content')

            if (!header) {
                return
            }

            content.style.height = content.clientHeight + 'px'
            acc.classList.toggle('accordion-close')

            header.addEventListener('click', function() {
                acc.classList.toggle('accordion-close')
            })
        })
	})
})();
