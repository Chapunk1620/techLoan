import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';


const plugin = require('tailwindcss/plugin');
const forms = require('@tailwindcss/forms');
const typography = require('@tailwindcss/typography');
/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {'custom-gradient': 'linear-gradient(to right, #4F46E5, #9D4EDD)',
            },
            colors: {'custom-blues': '#579ed1',
            },
        },
    },

    plugins: [
        forms,
        typography,
        plugin(function({ addUtilities }) {
        const newUtilities = {
            '.glass-effect': {
            backdropFilter: 'blur(2.5px)',
            WebkitBackdropFilter: 'blur(3.7px)',
            },
        };

        addUtilities(newUtilities, ['responsive', 'hover']);
        }),
    ],
};
