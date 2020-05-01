/*
Adds changing color hover
*/

/*var nav = document.getElementById('site-navigation');
nav.addEventListener('mouseover', function() {
   console.log('mouseover!');
   nav.classList.add('hovering-nav');
});
nav.addEventListener('mouseout', function() {
   console.log('mouseout!');
   nav.classList.remove('hovering-nav');
});*/

var header = jQuery('#masthead');

header.hover(function() {
    if( jQuery(document).width() > 1024 ) {
        console.log(jQuery(document).width() > 1024);
        header.animate({
          backgroundColor: '#ffffff',
        }, 200, function() {
        });
        jQuery('.nav-link').css('color', 'rgba(43,47,102,0.8)');
    }
});
header.mouseleave(function() {
    if( jQuery(document).width() > 1024 ) {
        header.animate({
          backgroundColor: 'transparent',
        }, 200, function() {
    });
        jQuery('.nav-link').css('color', '#ffffff');
    }
});

jQuery(".navbar-toggler").click(function() {
    if(jQuery(document).width() < 1024) {
        header.css('backgroundColor', '#ffffff');
        jQuery('.nav-link').css('color', 'rgba(43,47,102,0.8)');
    }
})
