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
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            colors: {
                primary: {"50":"#eff6ff","100":"#dbeafe","200":"#bfdbfe","300":"#93c5fd","400":"#60a5fa","500":"#3b82f6","600":"#2563eb","700":"#1d4ed8","800":"#1e40af","900":"#1e3a8a","950":"#172554"},
                gray: {
                    "50": "#fafafa",
                    "100": "#f4f4f5",
                    "200": "#e4e4e7",
                    "300": "#d4d4d8",
                    "400": "#a1a1aa",
                    "500": "#71717a",
                    "600": "#52525b",
                    "700": "#484849",
                    "800": "#262626",
                    "900": "#18181b",
                    "950": "#09090b"
                }
            },

            animation: {
                'playstation-gradient': 'playstation-gradient 10s ease-in-out infinite',
            },
            keyframes: {
                'playstation-gradient': {
                    '0%': { backgroundPosition: '0% 50%' },
                    '25%': { backgroundPosition: '50% 100%' },
                    '50%': { backgroundPosition: '100% 50%' },
                    '75%': { backgroundPosition: '50% 0%' },
                    '100%': { backgroundPosition: '0% 50%' },
                },
            }
        },
        fontFamily: {
            'body': [
                'Inter',
                'ui-sans-serif',
                'system-ui',
                '-apple-system',
                'system-ui',
                'Segoe UI',
                'Roboto',
                'Helvetica Neue',
                'Arial',
                'Noto Sans',
                'sans-serif',
                'Apple Color Emoji',
                'Segoe UI Emoji',
                'Segoe UI Symbol',
                'Noto Color Emoji'
            ],
            'sans': [
                'Inter',
                'ui-sans-serif',
                'system-ui',
                '-apple-system',
                'system-ui',
                'Segoe UI',
                'Roboto',
                'Helvetica Neue',
                'Arial',
                'Noto Sans',
                'sans-serif',
                'Apple Color Emoji',
                'Segoe UI Emoji',
                'Segoe UI Symbol',
                'Noto Color Emoji'
            ]
        },
    },

    plugins: [forms,
        typography,
        require('flowbite/plugin'),
    ],
};
