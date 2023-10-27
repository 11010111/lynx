// const plugin = require('tailwindcss/plugin')

/** @type {import('tailwindcss').Config} */
let tailwindConfig = {
  content: [
    "./Resources/Private/**/*.html",
    "./Resources/Public/JavaScript/**/*.js",
    "./Resources/Public/JavaScript/**/*.ts",
  ],
  theme: {
    fontFamily: {
      sans: ['Inter', 'sans-serif'],
    },
    extend: {
      colors: {
        'primary': 'var(--primary)',
        'secondary': 'var(--secondary)',
      }
    },
  },
  corePlugins: {
    container: false,
  },
  safelist: [
    'text-left',
    'text-center',
    'text-right',
    'text-justify',
    'ml-0',
    'mr-0',
    "flex",
    "flex-col",
    "gap-5",
  ],
}

const screenWidth = [
  '',
  'sm:',
  'md:',
  'lg:',
  'xl:',
  '2xl:',
]

const sizes = [
  '0',
  '0.5',
  '1',
  '1.5',
  '2',
  '2.5',
  '3',
  '3.5',
  '4',
  '5',
  '6',
  '7',
  '8',
  '9',
  '10',
  '11',
  '12',
  '14',
  '16',
  '20',
  '24',
  '28',
  '32',
  '36',
  '40',
  '44',
  '48',
  '52',
  '56',
  '60',
  '64',
  '72',
  '80',
  '96',
]

const widthSizes = [
  'w-1/2',
  'w-1/3',
  'w-2/3',
  'w-1/4',
  'w-3/4',
  'w-1/5',
  'w-4/5',
]

const screenWidthAttributes = [
  'flex-row',
]

const directions = [
  't',
  'b',
]

const types = [
  'p',
  'm',
]

types.forEach(type => {
  directions.forEach(direction => {
    screenWidth.forEach(sw => {
      sizes.forEach(size => {
        tailwindConfig.safelist.push(`${sw}${type}${direction}-${size}`)
      })
    })
  })
})

screenWidthAttributes.forEach(attribute => {
  screenWidth.forEach(sw => {
    tailwindConfig.safelist.push(`${sw}${attribute}`)
  })
})

widthSizes.forEach(width => {
  screenWidth.forEach(sw => {
    tailwindConfig.safelist.push(`${sw}${width}`)
  })
})

module.exports = tailwindConfig

// module.exports = {
//   plugins: [
//     plugin(({ addUtilities }) => {
//       addUtilities({
//         '.container': {
//           marginLeft: 'var(--max-x)',
//           marginRight: 'var(--max-x)',
//           '.container': {
//             marginLeft: '0',
//             marginRight: '0',
//           },
//           '.container-xl': {
//             marginLeft: '0',
//             marginRight: '0',
//           },
//         },
//         '.container-xl': {
//           marginLeft: 'var(--max-x-xl)',
//           marginRight: 'var(--max-x-xl)',
//           '.container': {
//             marginLeft: '0',
//             marginRight: '0',
//           },
//           '.container-xl': {
//             marginLeft: '0',
//             marginRight: '0',
//           },
//         },
//       })
//     })
//   ],
// }
