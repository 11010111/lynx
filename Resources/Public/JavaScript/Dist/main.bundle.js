(()=>{"use strict";function e(){window.scrollY>0?document.body.classList.add("page-scroll"):document.body.classList.remove("page-scroll")}function t(e){var t=function(t){e[t].height=0,e[t].elements.forEach((function(o){o.style.height="auto",o.clientHeight>e[t].height&&(e[t].height=o.clientHeight)}))};for(var o in e)t(o)}const o=function(){"ontouchstart"in window||navigator.maxTouchPoints>0||navigator.msMaxTouchPoints>0?document.body.classList.add("touch"):document.body.classList.remove("touch")};function n(e){var t=e.querySelector(".accordion-header"),o=e.querySelector(".accordion-content");function n(){e.classList.toggle("accordion-close")}t&&o&&(o.style.height=o.clientHeight+"px",n(),t.addEventListener("click",n),window.addEventListener("resize",(function(){if(e.classList.contains("accordion-close"))return e.classList.remove("accordion-close"),o.style.height="auto",o.style.height=o.clientHeight+"px",void e.classList.add("accordion-close");o.style.height="auto",o.style.height=o.clientHeight+"px"})))}var i,c;document.querySelectorAll(".accordion").forEach(n),e(),window.addEventListener("scroll",e),function(){var e=document.querySelector(":root"),t=document.querySelector(".page-navigation");function o(){e.style.setProperty("--scroll-padding-top",Math.floor(t.clientHeight)+"px")}t&&(o(),window.addEventListener("resize",o))}(),function(){var e=document.querySelector(".mobile-menu");if(e){var t=e.querySelectorAll(".has-children");t.forEach((function(e){e.firstElementChild.classList.contains("active")&&e.classList.add("parent-open"),e.addEventListener("click",(function(){e.classList.contains("parent-open")?e.classList.toggle("parent-open"):(t.forEach((function(e){e.classList.remove("parent-open")})),e.classList.add("parent-open"))}))}))}}(),i=document.querySelectorAll("[data-background]"),c=document.querySelectorAll("[data-foreground]"),i.forEach((function(e){e.style.backgroundColor=e.getAttribute("data-background")})),c.forEach((function(e){e.style.color=e.getAttribute("data-foreground")})),function(){var e=document.querySelectorAll("[data-equal-height]");if(e&&0!==e.length){var o=[];e.forEach((function(e){var t=e.getAttribute("data-equal-height");o[t]||(o[t]=[],o[t].height=0,o[t].elements=document.querySelectorAll('[data-equal-height="'.concat(t,'"]')))})),n(),window.addEventListener("resize",n),window.equalHeight={resize:n}}function n(){t(o);var e=function(e){o[e].elements.forEach((function(t){t.style.height="".concat(o[e].height,"px")}))};for(var n in o)e(n)}}(),function(){var e=document.querySelectorAll("[data-equal-height-mobile]");if(e&&0!==e.length){var o=[];e.forEach((function(e){var t=e.getAttribute("data-equal-height-mobile");o[t]||(o[t]=[],o[t].height=0,o[t].elements=document.querySelectorAll('[data-equal-height-mobile="'.concat(t,'"]')))})),n(),window.addEventListener("resize",n),window.equalHeightMobile={resize:n}}function n(){if(t(o),window.innerWidth<768)for(var e in o)o[e].elements.forEach((function(e){e.style.height="auto"}));else{var n=function(e){o[e].elements.forEach((function(t){t.style.height="".concat(o[e].height,"px")}))};for(var i in o)n(i)}}}(),function(){var e=document.querySelector("footer");if(e){var t=document.createElement("div");t.className="scroll-top",t.innerHTML='<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><g class="icon-color"><path d="M8 6.664l3.536 3.536.707-.707L8 5.25 3.757 9.493l.707.707z"/></g></svg>',t.addEventListener("click",(function(){document.body.scrollIntoView()})),e.appendChild(t),window.addEventListener("scroll",(function(){window.scrollY>250?t.classList.add("scroll-top-active"):t.classList.remove("scroll-top-active")}))}}(),window.matchMedia&&window.matchMedia("(prefers-color-scheme: dark)").matches&&document.body.classList.add("dark-scheme"),o(),window.addEventListener("resize",o),window.navigationFixed=function(){document.body.classList.add("page-navigation-fixed"),document.body.scrollIntoView()},console.log("WE LOVE TYPO3")})();