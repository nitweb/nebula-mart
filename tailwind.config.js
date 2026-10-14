import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

const v = (name) => `rgb(var(--color-${name}) / <alpha-value>)`;

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],

    theme: {
        extend: {
            colors: {
                ink: v('ink'),
                paper: v('paper'),
                bg: v('bg'),
                line: v('line'),
                star: v('star'),
                success: v('success'),
                danger: v('danger'),
                primary: {
                    DEFAULT: v('primary'),
                    dark: v('primary-dark'),
                    soft: v('primary-soft'),
                    100: v('primary-100'),
                    200: v('primary-200'),
                    300: v('primary-300'),
                },
                accent: {
                    DEFAULT: v('accent'),
                    dark: v('accent-dark'),
                    soft: v('accent-soft'),
                },
            },
            fontFamily: {
                display: 'var(--font-display)',
                sans: ['var(--font-body)', 'Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};