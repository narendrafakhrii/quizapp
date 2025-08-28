import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import { head } from "lodash";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Outfit", ...defaultTheme.fontFamily.sans],
                heading: ["Outfit", "sans-serif"],
            },
        },
    },

    plugins: [forms],
};
