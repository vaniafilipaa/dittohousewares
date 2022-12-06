jQuery(document).ready(function($){
 
    $(window).scroll(function(){stickyMenu()});

    var navbar = $("#navbar"),
        navbarHeight = navbar.outerHeight(),
        sticky = navbar.offset().top,
        content = $("header").next();
    function stickyMenu() {
        if (window.pageYOffset >= sticky) {
            navbar.addClass("sticky");
            content.css("padding-top", navbarHeight)
        } else {
            navbar.removeClass("sticky");
            content.css("padding-top", 0)
        }
    }
 
});
