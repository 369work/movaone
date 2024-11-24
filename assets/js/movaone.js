document.addEventListener("DOMContentLoaded", function () {
    const menuButton = document.querySelector(".header__menu__button");
    const menu = document.getElementById("header-menu-dialog");
    const open = document.querySelector("img.open");
    const close = document.querySelector("img.close");


    if (menuButton && menu) {
        menuButton.addEventListener("click", function () {
            open.classList.toggle("hidden");
            close.classList.toggle("hidden");

            if (menu.hasAttribute("open")) {
                menu.removeAttribute("open");
            } else {
                menu.setAttribute("open", true);
                menu.showModal();
            }

        });

        const menuLinks = menu.querySelectorAll("a");
        menuLinks.forEach((link) => {
            link.addEventListener("click", function () {
                menu.removeAttribute("open");
                close.classList.add("hidden");
                open.classList.remove("hidden");
                menu.close();
                menuButton.focus();
            });
        });

        document.addEventListener("keydown", function (event) {
                if (event.key === "Escape") {
                    menu.classList.remove("open");
                    close.classList.add("hidden");
                    open.classList.remove("hidden");
                    menu.close();
                }
                if (event.key === "Enter" || event.key === " ") {
                    event.preventDefault();
                    menuButton.click();
            }

        });

    }

    const pageLinks = document.querySelectorAll('a[href^="#"]');

    pageLinks.forEach((link) => {
        link.addEventListener("click", function (event) {
            event.preventDefault();
            const targetId = this.getAttribute("href").substring(1);
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop,
                    behavior: "smooth",
                });
            }
        });
    });
});
