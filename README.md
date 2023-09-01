Sitepackage for the project "Lynx"
==============================================================

![Lynx v2.0.24](https://img.shields.io/badge/Lynx-v2.0.23-blue)

# LYNX EXAMPLES

## REM CALC

```scss
@import 'functions';
@import 'mixins';

// Variables
:root {
    @include rem-var(--test-variable, 40);

    // or
    --test-variable: #{to-rem(40)};
}

// Classes
div {
    margin: to-rem(40) 0;
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

## Inital install Tailwind & SASS packages
`npm install`

## Watch tailwind & SASS
`npm start`

## Production Build before deploy or push
`npm run build`
