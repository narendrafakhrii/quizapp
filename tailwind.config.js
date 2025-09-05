<<<<<<< HEAD
import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
=======
import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import { head } from "lodash";
>>>>>>> b49f9c21450b5bef8add2d293bbd3988c2b1c152

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
<<<<<<< HEAD
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
=======
                sans: ["Outfit", ...defaultTheme.fontFamily.sans],
                heading: ["Outfit", "sans-serif"],
>>>>>>> b49f9c21450b5bef8add2d293bbd3988c2b1c152
            },
        },
    },

    plugins: [forms],
};
