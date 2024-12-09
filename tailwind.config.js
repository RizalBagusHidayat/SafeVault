/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#3490dc",
                secondary: "#f1c40f",
                success: "#2ecc71",
                warning: "#e67e22",
                danger: "#e74c3c",
                info: "#34495e",
                light: "#ecf0f1",
                dark: "#34495e",
            },
        },
    },
    plugins: [],
};
