/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        container: {
            center: true,
            padding: {
                DEFAULT: "2rem",
                sm: "3rem",
                lg: "4rem",
                xl: "5rem",
                "2xl": "6rem",
            },
        },
        extend: {},
    },
    plugins: [],
};
