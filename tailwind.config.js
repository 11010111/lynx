/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./Resources/Private/**/*.html",
    "./Resources/Public/JavaScript/**/*.js",
  ],
  theme: {
    colors: {
      'primary': "#321",
    },
    fontFamily: {
      sans: ['Inter', 'sans-serif'],
    },
    extend: {
      spacing: {
        '128': '32rem',
      },
      borderRadius: {
        '4xl': '2rem',
      }
    },
  },
  plugins: [],
  corePlugins: {
    container: false,
  },
  safelist: [
    "text-left",
    "text-center",
    "text-right",
    "text-justify",
    "ml-0",
    "mr-0",
  ]
}
