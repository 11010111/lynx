import {mobileMenu} from "./mobile-menu.js";
import {alignment} from "./alignment.js";
import {scrollToTop} from "./scroll-top.js";
import {fixedNavigationOnScrollDesktop, fixedNavigationOnScrollMobile} from "./fixed-navigation.js";
import {containerColors} from "./container-colors.js";
import {equalHeight} from "./equal-height.js";

fixedNavigationOnScrollDesktop()
fixedNavigationOnScrollMobile()
mobileMenu()
containerColors()
alignment()
equalHeight()
scrollToTop()

// Detect Browser Dark Scheme
if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
  document.body.classList.add('dark-scheme')
}

console.log('WE LOVE TYPO3')
