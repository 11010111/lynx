import { mobileMenu } from "./mobile-menu.js";
import { scrollToTop } from "./scroll-top.js";
import { pageScroll, scrollPaddingTop } from "./navigation.js";
import { containerColors } from "./container-colors.js";
import { equalHeight, equalHeightMobile } from "./equal-height.js";

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

window.navigationFixed = () => {
  document.body.classList.add('page-navigation-fixed')
  document.body.scrollIntoView();
}

console.log('WE LOVE TYPO3')
