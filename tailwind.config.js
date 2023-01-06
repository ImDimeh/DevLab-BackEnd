/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./index.php",
    "./Pages/**/*.{vue,js,ts,jsx,tsx,php}",
  ],
  theme: {



    extend: {
      spacing: {
        '13': '3.25rem',
        'specialmragin':'59rem',
        height: {
          '1141':'71.3125 rem',

        },
        width:{
         '535':'33.4375 rem',
        },
      },
      colors:{
        'gray-dark-2': '#252424',
        'green-one': '#449442',
        'blue-one': '#3B75CD',
        'blue-two': '#0D202B',
        'special-white':"#D9D9D9",
      },
      opacity:{
        '61':'61',
        '20':'20',
        '13':'13',
      },
      fontFamily: {
        'monserrat': ['monserrat','sans-serif' ],
        'serif': ['ui-serif', 'Georgia', ],
        'mono': ['ui-monospace', 'SFMono-Regular', ],
        'display': ['Oswald', ],
        'body': ['"Open Sans"'],
      },
      fontSize: {
        specialsize: '16rem',
      },
    },
  },
  plugins: [],
}
