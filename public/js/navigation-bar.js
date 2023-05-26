let isNavbarOpen = false;
function toggleNavbar() {
    if (!isNavbarOpen) {
        $("#nav-icon-top").addClass("rotate-45 translate-y-[6px]");
        $("#nav-icon-bottom").addClass("-rotate-45 -translate-y-[8px]");
        $("#nav-icon-mid").addClass("opacity-0");
        $("#mobile-nav-links").slideDown();
        isNavbarOpen = true;
    } else {
        $("#nav-icon-top").removeClass("rotate-45 translate-y-[6px]");
        $("#nav-icon-bottom").removeClass("-rotate-45 -translate-y-[8px]");
        $("#nav-icon-mid").removeClass("opacity-0");
        $("#mobile-nav-links").slideUp();
        isNavbarOpen = false;
    }
}
