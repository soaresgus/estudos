module.exports = {
  content: ["./src/**/*.tsx"],
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        brand: {
          300: '#996DFF',
          500: '#8257E5',
        }
      },
      borderRadius: {
        md: '4px',
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('tailwind-scrollbar'),
  ],
}
