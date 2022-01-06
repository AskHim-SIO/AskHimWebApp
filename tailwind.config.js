module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
  ],
  theme: {
    extend: {
        fontFamily: { sans: ['Inter var'] },
    },
      colors: {
          transparent: 'transparent',
          current: 'currentColor',
          'white': '#ffffff',
          'purple': '#3f3cbb',
          'midnight': '#121063',
          'metal': '#565584',
          'tahiti': '#3ab7bf',
          'silver': '#ecebff',
          'bubble-gum': '#ff77e9',
          'bermuda': '#78dcca',
          'askHim-blue' : '#2B6CF2',
      },

  },
  variants: {},
  plugins: [
      require('daisyui'),
      require("tailwindcss"),

  ]
}
