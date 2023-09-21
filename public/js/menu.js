document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.getElementById("menu-toggle");
    const menuClose = document.getElementById("menu-close");
    const menuOverlay = document.getElementById("menu-overlay");
    const menu = document.querySelector(".menu");

    menuToggle.addEventListener("click", function () {
        menuOverlay.classList.add("active");
        menu.classList.add("active");
    });

    menuClose.addEventListener("click", function () {
        menuOverlay.classList.remove("active");
        menu.classList.remove("active");
    });
});
