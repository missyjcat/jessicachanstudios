jQuery(document).ready(function($) {
        
    // Hide submenu of front page
    $('#front-subnav').hide();
    
    // slide subnav down depending on position of the window; highlight current menu item
    function windowScroll() {
        if (window.pageYOffset > 65) {
            $('#front-subnav').slideDown('fast');   
        };
        if (window.pageYOffset < 65) {
            $('#front-subnav').hide();
            $('#menu-item-1185,#menu-item-1186,#menu-item-1187,#menu-item-1188').css('color', '#000');
        };
        if ( $('#webdesign').offset().top - 80 <= window.pageYOffset && window.pageYOffset < $('#graphicdesign').offset().top - 80) {
        $('#menu-item-1185 a').css('color', '#ed145b');
        } else {
            $('#menu-item-1185 a').css('color', '#000');
        };
        if ( $('#graphicdesign').offset().top - 80 <= window.pageYOffset && window.pageYOffset < $('#webdevelopment').offset().top - 80) {
        $('#menu-item-1186 a').css('color', '#ed145b');
        } else {
            $('#menu-item-1186 a').css('color', '#000');
        };
        if ( $('#webdevelopment').offset().top - 80 <= window.pageYOffset && window.pageYOffset < $('#uiux').offset().top - 80) {
        $('#menu-item-1187 a').css('color', '#ed145b');
        } else {
            $('#menu-item-1187 a').css('color', '#000');
        };
        if ( $('#uiux').offset().top - 80 <= window.pageYOffset && window.pageYOffset < document.body.offsetHeight) {
        $('#menu-item-1188 a').css('color', '#ed145b');
        } else {
            $('#menu-item-1188 a').css('color', '#000');
        };

    };

    
    $(window).scroll(function() {
        windowScroll();    
    });
    
    // Prevent the default action when the submenu items are clicked on the home page
    $('.menu-item-1185 a, .menu-item-1186 a, .menu-item-1187 a, .menu-item-1188 a').click(function(e) {
            e.preventDefault();
    });
    
    // Animate the scroll of the homepage menu items
    $('.home .menu-item-1185').click(function() {
        $('html, body').animate({scrollTop: $("#webdesign").offset().top - 80}, 400);
    });
    
    $('.home .menu-item-1186').click(function() {
        $('html, body').animate({scrollTop: $("#graphicdesign").offset().top - 80}, 400);
    });
    
    $('.home .menu-item-1187').click(function() {
        $('html, body').animate({scrollTop: $("#webdevelopment").offset().top - 80}, 400);
    });
    
    $('.home .menu-item-1188').click(function() {
        $('html, body').animate({scrollTop: $("#uiux").offset().top - 80}, 400);
    });
    
    $('.home .menu-item-1307').click(function() {
        $('html, body').animate({scrollTop: $('body').offset().top}, 200);
    });
    
});

