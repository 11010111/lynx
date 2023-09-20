function isTouchDevice (): boolean {
  return 'ontouchstart' in window || navigator.maxTouchPoints > 0
}

function isTouch (): void {
  isTouchDevice() ? document.body.classList.add('touch') : document.body.classList.remove('touch')
}

export default isTouch
export { isTouchDevice }
