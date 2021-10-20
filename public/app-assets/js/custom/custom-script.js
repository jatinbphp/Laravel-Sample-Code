$(document).ready(function() {
    if ($('.dropify').length) {
        setTimeout(function() {
            $('.dropify').dropify();
        }, 1000);
        // Used events
        let drEvent = $('.dropify-event').dropify();
        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.filename + "\" ?");
        });
        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });
    }
    $(document).on("click", ".btnMetaUserSave", function(e) {
        $("body").toggleClass("sidebar-true");
        $(".sidenav-overlay").fadeToggle();
    });
    $(".top-header-container-block ul.navbar-list.right .sidenav-trigger").click(function() {
        $("body").toggleClass("sidebar-true");
        $(".sidenav-overlay").fadeToggle();
    });
    $("body .sidenav-overlay").click(function() {
        $("body").removeClass("sidebar-true");
        $(".sidenav-overlay").fadeOut();
    });
    if (jQuery(window).width() >= 200 && jQuery(window).width() <= 992) {
        $(".main-toggle").click(function() {
            $('.main-toggle .menu-icon').toggleClass('close-icon');
            $('.mobile-menu-block-main .sidenav').slideToggle("fast");
        });
        // Show hide popover
        $(document).on("click", function(e) {
            var $trigger = $(".main-toggle");
            //if ($trigger !== e.target && !$trigger.has(e.target).length && !$(e.target).parents("li.mobileMenu").length) {
            if ($trigger !== e.target && !$trigger.has(e.target).length) {
                $('.main-toggle .menu-icon').removeClass('close-icon');
                $(".mobile-menu-block-main .sidenav").hide();
            }
        });
        $('.menu2').click(function(event) {
            event.preventDefault();
            $('.menu2 .menu-icon').toggleClass('close-icon');
            $('#slide-out2').toggle('slide');
        });
    }
});