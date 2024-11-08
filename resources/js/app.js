document.addEventListener("DOMContentLoaded", function () {
    const links = document.querySelectorAll(".nav-link");

    function setActiveLink() {
        const currentHash = window.location.hash || "#kezdolap";

        links.forEach(link => {
            if (link.getAttribute("href") === currentHash) {
                link.classList.add("active-link");
            } else {
                link.classList.remove("active-link");
            }
        });
    }

    setActiveLink(); // Set the initial active link
    window.addEventListener("hashchange", setActiveLink); // Update on hash change
});