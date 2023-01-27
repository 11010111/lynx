import { mobileMenu } from "./mobile-menu.js";
import { scrollToTop } from "./scroll-top.js";
import { PageScroll } from "./navigation.js";
import { containerColors } from "./container-colors.js";
import { equalHeight, equalHeightMobile } from "./equal-height.js";

PageScroll()
mobileMenu()
containerColors()
equalHeight()
equalHeightMobile()
scrollToTop()

// Detect Browser Dark Scheme
if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
  document.body.classList.add('dark-scheme')
}

console.log('WE LOVE TYPO3')
