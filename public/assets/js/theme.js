let themeStorageKey = "theme";
let defaultTheme = "light";
let selectedTheme = localStorage.getItem(themeStorageKey);

if (selectedTheme === null) {
    localStorage.setItem(themeStorageKey, defaultTheme);
    selectedTheme = defaultTheme;
}
if (selectedTheme === 'dark') {
    document.body.setAttribute("data-bs-theme", selectedTheme);
} else {
    document.body.removeAttribute("data-bs-theme");
}

let setTheme = (theme) => {
    localStorage.setItem(themeStorageKey, theme);
    if (theme === 'dark')
        document.body.setAttribute("data-bs-theme", 'dark');
    else
        document.body.removeAttribute("data-bs-theme");
};
