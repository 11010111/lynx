# Lynx

![Lynx v2.1.0](https://img.shields.io/badge/Lynx-v2.1.0-blue)

# Development

## Install npm packages
`npm install`

## Watch tailwindcss, SASS and TypeScript
`npm run dev`

OR

`npm run watch`

OR

`npm start`

# Documentations
- [tailwindcss](https://tailwindcss.com/docs/editor-setup)
- [SASS](https://sass-lang.com/documentation/)
- [TypeScript](https://www.typescriptlang.org/docs/)
- [TypeScript tutorials](https://www.totaltypescript.com/)
- [TypeScript tutorials (YouTube)](https://www.youtube.com/@mattpocockuk)

# Examples

## SCSS

```scss
@import 'functions';
@import 'mixins';

// Variables
:root {
    // Use the mixin 
    @include rem-var(--test-variable, 40); // The number should be in px.

    // OR use the function
    --test-variable: #{to-rem(40)}; // The number should be in px.
}

// Classes
div {
    margin: to-rem(40) 0; // The number should be in px.
}
```

## ViewHelper

### Lynx wrapper
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

### Lynx container
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

### Replace a string
PHP [str_replace()](https://www.php.net/manual/de/function.str-replace)
```html
<lynx:replace search="test" replace="ist" subject="Das test ok." />
{lynx:replace(search:'test', replace:'ist', subject:'Das test ok.')}
```
> OUTPUT: Das ist ok.

### Substring
PHP [substr()](https://www.php.net/manual/de/function.substr.php)
```html
<lynx:substring string="Hallo Welt!..." offset="0" length="-1" />
{lynx:substring(string:'Hallo Welt!...', offset:'0', length:'-1')}
```
> OUTPUT: Hallo Welt!..

### Split string
PHP [explode()](https://www.php.net/manual/de/function.explode.php)
```html
<lynx:split string="Dies ist ein Test." separator=" " />
{lynx:split(separator:' ', string:'Dies ist ein Test.')}
```
```json
[
  "Dies",
  "ist",
  "ein",
  "Test."
]
```

#### Inline notation
```html
<f:for each="{lynx:split(separator:' ', string:'Dies ist ein Test.')}" as="item">
    <f:if condition="{item}">
        <p>{item}</p>
    </f:if>
</f:for>
```
```html
<p>Dies</p>
<p>ist</p>
<p>ein</p>
<p>Test.</p>
```

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
<div class="slider-content">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper">
    <!-- Slides -->
    <div class="slider-cell">Slide 1</div>
    <div class="slider-cell">Slide 2</div>
    <div class="slider-cell">Slide 3</div>
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
  import Swiper from 'swiper'
  import { Navigation, Pagination } from 'swiper/modules'

  const swiperContainer = new Swiper('.slider-content', {
    modules: [Navigation, Pagination],
    loop: true,
    slideClass: 'slider-cell',
    pagination: {
      el: '.swiper-pagination',
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    scrollbar: {
      el: '.swiper-scrollbar',
    }
  })
</script>
```

## TCEFORM.tsconfig
```typoscript
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
