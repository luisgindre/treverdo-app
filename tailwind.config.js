import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

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
            colors: {
                'treverdo': {
                    '50': '#fdfde8',
                    '100': '#f7facd',
                    '200': '#f0f6a0',
                    '300': '#e2ed69',
                    '400': '#d0e03b',
                    '500': '#b9ce1d',
                    '600': '#8b9e12',
                    '700': '#697813',
                    '800': '#535f15',
                    '900': '#465116',
                    '950': '#252d06',
                },
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography],
};
