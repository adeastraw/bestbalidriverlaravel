/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./app/Http/Controllers/**/*.php",
  ],
  theme: {
    extend: {
      colors: {
        forest: {
          50: '#eef6f2',
          100: '#d5e9dc',
          200: '#aed3bc',
          300: '#7cb797',
          400: '#4e9973',
          500: '#347e58',
          600: '#276545',
          700: '#205138',
          800: '#1b4332',
          900: '#0f382c',
          950: '#071f18',
        },
        cream: {
          50: '#ffffff',
          100: '#fdfbf7',
          200: '#fbf8f2',
          300: '#f7f1e6',
          400: '#f3ede2',
          500: '#e9dfcf',
        },
        sand: {
          50: '#faf8f5',
          100: '#f5f0e8',
          200: '#ebd9c5',
          300: '#dfc7ab',
          400: '#cca885',
          500: '#b88b64',
          600: '#9b6e4d',
          700: '#7d553d',
          800: '#6c584c',
          900: '#4a3b32',
        },
        terracotta: {
          50: '#fbf4f2',
          100: '#f7e7e3',
          200: '#f0d2ca',
          300: '#e4b3a6',
          400: '#d58d7a',
          500: '#c86d51',
          600: '#b85438',
          700: '#994129',
          800: '#7f3725',
          900: '#693223',
        },
        olive: {
          50: '#f6f7f2',
          100: '#ecefe3',
          200: '#d8dec7',
          300: '#bec9a4',
          400: '#a3b381',
          500: '#87986a',
          600: '#6a7b50',
          700: '#52603e',
          800: '#434e34',
          900: '#39432d',
        }
      },
      fontFamily: {
        sans: ['Plus Jakarta Sans', 'Inter', 'system-ui', 'sans-serif'],
        display: ['Playfair Display', 'Georgia', 'serif'],
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
}
