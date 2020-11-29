const defaultTheme = require('tailwindcss/defaultTheme');
module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    darkMode: 'media', // or 'media' or 'class'
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito','Vazir', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },

    plugins: [
        require('@tailwindcss/ui'),
        require('tailwindcss-rtl'),
      ],
};


// module.exports = {
//     purge: [],
//     darkMode: false, // or 'media' or 'class'
//     theme: {
//               extend: {
//                   fontFamily: {
//                       sans: ['Nunito', ...defaultTheme.fontFamily.sans],
//                   },
//               },
//           },
//     variants: {},
//     plugins: [],
//   }