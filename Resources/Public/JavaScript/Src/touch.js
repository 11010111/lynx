const isTouchDevice = () => {
  return (('ontouchstart' in window) || (navigator.maxTouchPoints > 0) || (navigator.msMaxTouchPoints > 0))
}

const isTouch = () => {
    if (isTouchDevice()) {
        document.body.classList.add('touch')
    } else {
        document.body.classList.remove('touch')
    }
}

export default isTouch
export { isTouchDevice }