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

var nav = jQuery('.main-navigation');
nav.hover(function() {
    nav.animate({
      backgroundColor: '#ffffff',
    }, 200, function() {
        console.log('what');
    });            
});
nav.mouseleave(function() {
    nav.animate({
      backgroundColor: 'transparent',
    }, 200, function() {
        console.log('what');
    });            
});
