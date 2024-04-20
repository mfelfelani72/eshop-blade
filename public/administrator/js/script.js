const theme = document.querySelector('.theme');
const themeIcon = document.querySelector('.theme-icon');

document.getElementById("body").setAttribute("data-bs-theme", sessionStorage.getItem('theme'));
if (sessionStorage.getItem('theme') == 'dark') {
    themeIcon.classList.remove("bi-moon");
    themeIcon.classList.add("bi-sun");
}

else {

    themeIcon.classList.remove("bi-sun");
    themeIcon.classList.add("bi-moon");
}



theme.addEventListener('click', () => {

    if (document.getElementById("body").getAttribute("data-bs-theme") == 'dark') {
        document.getElementById("body").setAttribute("data-bs-theme", "light");

        themeIcon.classList.remove("bi-sun");
        themeIcon.classList.add("bi-moon");

        sessionStorage.theme = "light";

    }
    else {
        document.getElementById("body").setAttribute("data-bs-theme", "dark");
        themeIcon.classList.remove("bi-moon");
        themeIcon.classList.add("bi-sun");

        sessionStorage.theme = "dark";
    }
});