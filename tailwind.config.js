import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    safelist: [
        'bg-green-400/10',
        'bg-red-400/10',
        'text-red-500',
        'text-red-600',
        'text-green-400',
        'text-green-600',
        'bg-amber-400/10',
        'text-amber-600',
        'animate-spin',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Be Vietnam Pro', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        forms,
        require('tailwind-scrollbar')({ nocompatible: true }),
    ],
    
};
