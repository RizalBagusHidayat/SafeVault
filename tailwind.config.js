/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./node_modules/preline/dist/*.js",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            keyframes: {
                slideUp: {
                    "0%": { transform: "translateY(100%)", opacity: "0" },
                    "100%": { transform: "translateY(0)", opacity: "1" },
                },
                slideDown: {
                    "0%": { transform: "translateY(0)", opacity: "1" },
                    "100%": { transform: "translateY(100%)", opacity: "0" },
                },
            },
            animation: {
                slideUp: "slideUp 0.3s ease-out",
                slideDown: "slideDown 0.3s ease-out",
            },
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
    plugins: [require("preline/plugin")],
};
