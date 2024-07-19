/** @type {import('tailwindcss').Config} */
export default {
  content: ['./**/*.{php,html}'],
  theme: {
    extend: {
      colors: {
        primary: "#0b57d0",
        "primary-hovered": "#174ea6",
        "primary-light": "#f0f4f9",
      }
    },
  },
  plugins: [],
}

