/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: ["./*.{html,js,php}"],
  theme: {
    extend: {
      fontFamily: {
        'signika': ['Signika', 'sans-serif'],
      },
    },
  },
  plugins: [],
}