const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
        listStyleType: {
            none: 'none',
            disc: 'disc',
            circle: 'circle',
            decimal: 'decimal',
            square: 'square',
            roman: 'upper-roman',
        }
    },

    plugins: [
        require('@tailwindcss/forms')
    ],
};
