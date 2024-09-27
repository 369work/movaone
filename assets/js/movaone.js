document.addEventListener("DOMContentLoaded", function () {
    const menuButton = document.querySelector(".header__menu__button");
    const menu = document.getElementById("menu-1");
    const open = document.querySelector("svg.open");
    const close = document.querySelector("svg.close");

    if (menuButton && menu) {
        menuButton.addEventListener("click", function () {
            menu.classList.toggle("hidden");
            open.classList.toggle('hidden');
            close.classList.toggle('hidden');
        });
    }
});
