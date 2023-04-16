const themeToggles = document.querySelectorAll('.rBWjB')

themeToggles.forEach((themeToggle) => {
    themeToggle.addEventListener('input', () => {
        if (document.documentElement.getAttribute('data-theme') === "light") {
            document.documentElement.setAttribute('data-theme', 'dark');
            localStorage.setItem('theme', 'dark')
            setAllSwitchTo(true);
        } else {
            document.documentElement.setAttribute('data-theme', 'light');

            localStorage.setItem('theme', 'light')
            setAllSwitchTo(false);
        }
    })
})

function setAllSwitchTo(value) {
    themeToggles.forEach((themeToggle) => {
        themeToggle.checked = value;
    });
}


