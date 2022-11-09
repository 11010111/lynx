import {mobileMenu} from "./mobile-menu";
import {alignment} from "./alignment";
import {scrollToTop} from "./scroll-top";
import {fixedNavigationOnScrollDesktop, fixedNavigationOnScrollMobile} from "./fixed-navigation";
import {containerColors} from "./container-colors";
import {equalHeight} from "./equal-height";

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
