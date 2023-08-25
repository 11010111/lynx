function isTouchDevice () {
  return (('ontouchstart' in window) || (navigator.maxTouchPoints > 0) || (navigator.msMaxTouchPoints > 0))
}

function isTouch () {
  isTouchDevice() ? document.body.classList.add('touch') : document.body.classList.remove('touch')
}

export default isTouch
export { isTouchDevice }
