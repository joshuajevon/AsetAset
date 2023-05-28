import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./public/js/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Roboto", ...defaultTheme.fontFamily.sans],
            },

            colors: {
                cBlack: "#000000",
                cGold: "#C5AF66",
                cWhite: "#FFFFFF",
                cLightGrey: "#EFEFEF",
                cDarkGrey: "#D9D9D9",
            },
        },
    },

    plugins: [forms],
};
