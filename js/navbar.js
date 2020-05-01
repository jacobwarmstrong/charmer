/*
Adds changing color hover
*/

jQuery('#site-navigation').hover(function() {
    jQuery('.nav-link').addClass('dark-navy');
    jQuery(this).addClass('white-bg');
    jQuery(this).removeClass('navbar-dark');
    jQuery(this).addClass('navbar-light');
}, function () {
    jQuery('.nav-link').removeClass('dark-navy');
    jQuery(this).removeClass('white-bg');
    jQuery(this).removeClass('navbar-light');
    jQuery(this).addClass('navbar-dark');
})


