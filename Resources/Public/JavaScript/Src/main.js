import { mobileMenu } from './mobile-menu'
import { scrollToTop } from './scroll-top'
import { pageScroll, scrollPaddingTop } from './navigation'
import { containerColors } from './container-colors'
import { equalHeight, equalHeightMobile } from './equal-height'
import isTouch from './touch'

pageScroll()
scrollPaddingTop()
mobileMenu()
containerColors()
equalHeight()
equalHeightMobile()
scrollToTop()

// Detect Browser Dark Scheme
if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
  document.body.classList.add('dark-scheme')
}

// Detect Touch Devices
isTouch()
window.addEventListener('resize', isTouch)

window.navigationFixed = () => {
  document.body.classList.add('page-navigation-fixed')
  document.body.scrollIntoView()
}

console.log('WE LOVE TYPO3')
