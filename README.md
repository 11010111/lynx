Sitepackage for the project "Lynx"
==============================================================

# LYNX EXAMPLES

## REM CALC

```scss
@import "functions";
@import "mixins";

// Variables
::root {
    @include rem-var(--test-variable, 40);

    // or

    --test-variable: #{rem(40)};
}

// Classes
div {
    margin: rem(40) 0;
}
```
## LYNX WRAPPER
Render container wrapper for margins and padding with optional parameters
- as = tag name
- render = data array
- class = own class-name

```html
<lynx:wrapper as="section" render="{data}" class="my-class">
    <lynx:container render="{data}">
        Hello World!
    </lynx:container>
</lynx:wrapper>
```

## LYNX CONTAINER
Render container with optional parameters
- as = tag name
- render = data array
- class = own class-name
- wrap = render wrapper data on <lynx:container>

```html
<lynx:container as="section" render="{data}" class="my-class" wrap="true">
    Hello World!
</lynx:container>
```

## REPLACE STRING
PHP str_replace()
```html
<lynx:replace search="test" replace="ist" subject="Das test ok." />
{lynx:replace(search:'test', replace:'ist', subject:'Das test ok.')}
```
> OUTPUT: Das ist ok.

## SUBSTRING
PHP substr()
```html
<lynx:substring string="Hallo Welt!..." offset="0" length="-1" />
{lynx:substring(string:'Hallo Welt!...', offset:'0', length:'-1')}
```
> OUTPUT: Hallo Welt!..

## SPLIT STRING
PHP explode()
```html
<lynx:split string="Dies ist ein Test." separator=" " />
{lynx:split(separator:' ', string:'Dies ist ein Test.')}
```

### INLINE NOTATION
```html
<f:for each="{lynx:split(separator:' ', string:'Dies ist ein Test.')}" as="item">
    <f:if condition="{item}">
        <p>{item}</p>
    </f:if>
</f:for>
```
>OUTPUT: Array
array(4 items)
0 => 'Dies'
1 => 'ist'
2 => 'ein'
3 => 'Test.'

---

## Image to SVG
Example to render svg inline

```html
<f:cObject typoscriptObjectPath="lib.svg" data="{src: 'path/to/the/file.svg'}" />
```

## Render Picture or Image Tag
Picture Tag: (Webp must be set in the settings)

```html
<f:render partial="Picture" arguments="{file: file, loading: 'lazy', class: 'my-class'}" />
<f:render partial="Image" arguments="{file: file, loading: 'lazy', class: 'my-class'}" />
```

## Swiper Slider
Options: https://swiperjs.com/swiper-api

```html
<!-- Slider main container -->
<div class="swiper">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper">
    <!-- Slides -->
    <div class="swiper-slide">Slide 1</div>
    <div class="swiper-slide">Slide 2</div>
    <div class="swiper-slide">Slide 3</div>
    ...
  </div>
  <!-- If we need pagination -->
  <div class="swiper-pagination"></div>

  <!-- If we need navigation buttons -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>

  <!-- If we need scrollbar -->
  <div class="swiper-scrollbar"></div>
</div>

<script>
    import Swiper from 'https://unpkg.com/swiper@7/swiper-bundle.esm.browser.min.js'

    const swiper = new Swiper('.swiper', {
        // Optional parameters
        loop: true,
        slideClass: '.swiper-slide',

        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        // And if we need scrollbar
        scrollbar: {
            el: '.swiper-scrollbar',
        },
    });
</script>
```

## TCEFORM.tsconfig
```html
# Add Mask Field Options
tx_mask_selectbox {
    types {
        mask_c0001 {
            addItems {
                left = Left
                center = Center
                right = Right
            }
        }
    }
}
```

## client-detection.js
Examples usage

```javascript
MobileDetection.isMobile()
MobileDetection.isAndroid()
MobileDetection.isBlackBerry()
MobileDetection.isIOS()
MobileDetection.isOpera()
MobileDetection.isWindows()

BrowserDetection.getBrowser()
BrowserDetection.getOS()
BrowserDetection.getVersion()
```

## countup.min.js
CountUp.js is a dependency-free, lightweight JavaScript class that can be used to quickly create animations that display numerical data in a more interesting way. - Options - https://inorganik.github.io/countUp.js/

```javascript
let demo = new CountUp('myTargetElement', 6781);

if (!demo.error) {
    demo.start();
} else {
    console.error(demo.error);
}
```

## emergency.min.js
Lightweight, high-performance JS plugin for detecting and manipulating elements in the browser. Options - https://github.com/xtianmiller/emergence.js

```html
<div class="element" data-emergence="hidden"></div>

<script>
  let customContainer = document.querySelector('.wrapper');

  emergence.init({
    container: customContainer
  });
</script>

<style>
    .element[data-emergence=hidden] {
      /* Hidden state */
    }
    .element[data-emergence=visible] {
      /* Visible state */
    }
</style>
```

## flatpickr.js
flatpickr is a lightweight and powerful datetime picker. Options: https://flatpickr.js.org/options/

```html
flatpickr("#myID", {
    inline: true,
    enableTime: true,
    minTime: "09:00"
});
```

## in-view.min.js
Get notified when a DOM element enters or exits the viewport. Basic Usage: https://github.com/camwiegert/in-view

```javascript
inView.is(document.querySelector('.someSelector'));
// => true

inView('.someSelector').on('enter', doSomething);

inView.offset(100);
inView.offset(-50);
```

## jarallax.min.js
Smooth parallax scrolling effect for background images, videos. Code in pure JavaScript with NO dependencies + jQuery supported. YouTube, Vimeo and Self-Hosted Videos parallax supported. Usage: https://github.com/nk-o/jarallax

```javascript
jarallax(document.querySelectorAll('.jarallax'), {
    speed: 0.2
});
```

## offside.min.js
Offside.js is a minimal JavaScript kit without library dependencies to push things off-canvas using just class manipulation. It's goal is to provide a super-lightweight, efficient and customizable way of handling off-canvas menus/elements on modern website and web applications. Usage: https://github.com/toomuchdesign/offside

```javascript
let myOffside = offside( '#my-menu', {
    slidingElementsSelector:'#my-content-container',
    buttonsSelector: '#my-button, .another-button',
});
```

## reframe.min.js
Reframe.js is a javascript plugin that makes unresponsive elements responsive. Usage - https://dollarshaveclub.github.io/reframe.js/

```html
reframe('selector');
```

## tippy-bundle.umd.min.js & popper.min.js
is the complete tooltip, popover, dropdown, and menu solution for the web, powered by Popper. Options: https://atomiks.github.io/tippyjs/v6/all-props/

```javascript
tippy('#myButton', {
    content: "I'm a Tippy tooltip!",
});
```

## tobii.min.js
An accessible, open-source lightbox with no dependencies. Options: https://github.com/midzer/tobii

```javascript
const tobii = new Tobii({
    captions: false
});
```

```html
<a href="#" data-type="youtube" data-id="KU2sSZ_90PY" class="lightbox">
  Open YouTube video
</a>

<button type="button" data-type="iframe" data-target="https://www.wikipedia.org" class="lightbox">
  Open Wikipedia
</button>
```
