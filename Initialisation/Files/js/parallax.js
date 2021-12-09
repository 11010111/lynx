/**
 * Parallax
 */
(function Parallax() {
    let elementTop = document.querySelectorAll('.parallax-top')
    let elementBottom = document.querySelectorAll('.parallax-bottom')
    let elementLeft = document.querySelectorAll('.parallax-left')
    let elementRight = document.querySelectorAll('.parallax-right')

    let viewport = window.innerHeight

    let speedTop = 15
    let speedBottom = 15
    let speedLeft = 15
    let speedRight = 15

    let move = function(el, direction) {
        if (window.scrollY >= el.parentElement.offsetTop - viewport &&
            window.scrollY <= el.parentElement.offsetTop + el.parentElement.clientHeight + viewport) {
            if (direction === 'top') {
                let pos = (window.scrollY - el.parentElement.offsetTop) / speedTop
                el.style.top = pos + 'px'
            } else  if (direction === 'bottom') {
                let pos = (window.scrollY - el.parentElement.offsetTop) / speedBottom
                el.style.bottom = pos + 'px'
            } else if (direction === 'left') {
                let pos = (window.scrollY - el.parentElement.offsetTop) / speedLeft
                el.style.left = pos + 'px'
            } else if (direction === 'right') {
                let pos = (window.scrollY - el.parentElement.offsetTop) / speedRight
                el.style.right = pos + 'px'
            }
        }
    }

    let scrollEvent = function() {
        elementTop.forEach(function(el) {
            move(el, 'top')
        })
        elementBottom.forEach(function(el) {
            move(el, 'bottom')
        })
        elementLeft.forEach(function(el) {
            move(el, 'left')
        })
        elementRight.forEach(function(el) {
            move(el, 'right')
        })
    }

    scrollEvent()
    window.addEventListener('scroll', scrollEvent, { passive: true })
})();
