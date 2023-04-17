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
    "pt-0.5",
    "pt-1",
    "pt-1.5",
    "pt-2",
    "pt-2.5",
    "pt-3",
    "pt-3.5",
    "pt-4",
    "pt-5",
    "pt-6",
    "pt-7",
    "pt-8",
    "pt-9",
    "pt-10",
    "pt-11",
    "pt-12",
    "pt-14",
    "pt-16",
    "pt-20",
    "pt-24",
    "pt-28",
    "pt-32",
    "pt-36",
    "pt-40",
    "pt-44",
    "pt-48",
    "pt-52",
    "pt-56",
    "pt-60",
    "pt-64",
    "pt-72",
    "pt-80",
    "pt-96",
  ]
}
