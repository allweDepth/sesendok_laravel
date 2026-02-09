// import $ from 'jquery';
// window.$ = window.jQuery = $;

// import '../../node_modules/fomantic-ui/dist/semantic.min.js';

// resources/js/app.js

$(function () {
    // Dropdown accordion
    $(".ui.dropdown").dropdown({ on: "hover" });

    // Sidebar init (desktop & mobile)
    $("#main-sidebar").sidebar({
        context: ".ui.pushable",
        transition: "overlay", // muncul di atas konten
        dimPage: true, // gelapkan konten saat mobile
        closable: true, // klik pusher untuk tutup
        mobileTransition: "overlay",
    });

    // Toggle sidebar saat klik hamburger
    $("#sidebar-toggle").on("click", function () {
        $("#main-sidebar").sidebar("toggle");
    });

    // Accordion sidebar
    $(".ui.accordion").accordion({
        exclusive: false,
    });
    $(function () {
        const navbarHeight = $(".ui.top.fixed.menu").outerHeight() || 50;
        $(".ui.pushable").attr(
            "style",
            `margin-top: ${navbarHeight}px !important`,
        );
    });
    console.log("Sidebar default hidden, toggle ready");
});
