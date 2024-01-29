const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    theme: {
        fontFamily: {
          'custom': ['Poppins', 'Raleway', 'sans-serif'],
        },
        extend: {
          fontFamily:{
            'Raleway':'Raleway',
            'Poppins':'Poppins',
          },
          fontSize: {
            sm: '14px',
            base: '1rem',
            xl: '1.25rem',
            '2xl': '1.563rem',
            '3xl': '1.953rem',
            '4xl': '2.441rem',
            '5xl': '3.052rem',
            '6xl':"65px"
          },
      
          screens: {
            'sm': '640px',
            'md': '768px',
            'lg': '1024px',
            'lg2': '1250px',
            'xl': '1280px',
            '2xl': '1400px',
          },
          colors:{
            "orange":"#FF820F",
            "black34":'#343434',
            "blackob":"#0B0B0B",
            "black2":"#12141D",
            "gray":"#7E7E7E",
            "gray2":"#717171",
            "gray3":"#ADADAD",
            "gray4":"#f5f5f5",
            "orange2":"#200c00",
            "orange3":"#FF5000",
            "green":"#63EB4D",
            
          },
          borderRadius: {
            'none': '0',
            'sm': '0.125rem',
            DEFAULT: '0.25rem',
            DEFAULT: '5px',
            'md': '0.375rem',
            'lg': '0.5rem',
            'full': '9999px',
            'large': '12px',
          }
        },
      },
    plugins: [require('@tailwindcss/forms')],
};
