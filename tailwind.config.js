/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/css/app.css",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
  ...(process.env.NODE_ENV === 'production' ? { cssnano: {} } : {})
}

