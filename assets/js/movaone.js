document.addEventListener("DOMContentLoaded", function () {
    // フォーカス検出のためのイベントリスナー設定
    document.addEventListener("mousedown", () => {
        window.mouseDown = true;
    });

    document.addEventListener("mouseup", () => {
        window.mouseDown = false;
    });

    document.addEventListener("keydown", (e) => {
        if (e.key === "Tab") {
            window.keyboardFocus = true;
            window.mouseDown = false;
        }
    });

    // メニュー関連の要素を取得
    const menuButton = document.querySelector(".header__menu__button");
    const menu = document.getElementById("header-menu-modal");
    const closeMenuButton = document.querySelector(".header__menu__close");

    // メニューの状態を管理
    let isMenuOpen = false;

    // メニューを開く関数
    const openMenu = () => {
        menu.setAttribute("aria-hidden", "false");
        menuButton.classList.add("active");
        menuButton.setAttribute("aria-expanded", "true");
        isMenuOpen = true;
    };

    // メニューを閉じる関数
    const closeMenu = () => {
        menu.setAttribute("aria-hidden", "true");
        menuButton.classList.remove("active");
        menuButton.setAttribute("aria-expanded", "false");
        isMenuOpen = false;
    };

    // メニューの開閉を切り替える関数
    const toggleMenu = () => {
        if (isMenuOpen) {
            closeMenu();
        } else {
            openMenu();
        }
    };

    // クリックイベントの設定
    menuButton.addEventListener("click", (e) => {
        e.preventDefault();
        toggleMenu();

        if (window.mouseDown) {
            menuButton.classList.add("mouse-focus");
            menuButton.classList.remove("keyboard-focus");
        }
    });

    // フォーカスイベントの設定
    menuButton.addEventListener("focus", (e) => {
        if (window.mouseDown) {
            // マウスクリックでのフォーカス
            e.target.classList.add("mouse-focus");
            e.target.classList.remove("keyboard-focus");
        } else {
            // キーボードでのフォーカス
            e.target.classList.add("keyboard-focus");
            e.target.classList.remove("mouse-focus");
            openMenu();
        }
    });

    // Escキーでメニューを閉じる
    document.addEventListener("keydown", (e) => {
            if (e.key === "Escape" && isMenuOpen) {
                menuButton.classList.remove("keyboard-focus");
                closeMenu();
        }
    });

    // メニュー内のリンクがクリックされた時にメニューを閉じる
    const menuLinks = document.querySelectorAll("#header-menu-modal a");
    menuLinks.forEach((link) => {
        link.addEventListener("click", () => {
            closeMenu();
        });
    });

    // メニューを閉じるボタンのクリックイベント
    closeMenuButton.addEventListener("click", () => {
        closeMenu();
    });

    closeMenuButton.addEventListener("focus", (e) => {
        menuButton.classList.remove("keyboard-focus");
        closeMenu();
    });

    // ページ内リンクのスムーススクロール
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
