var nav = document.getElementById('site-navigation');
nav.addEventListener('mouseover', function() {
   console.log('mouseover!');
   nav.classList.add('hovering-nav');
});
nav.addEventListener('mouseout', function() {
   console.log('mouseout!');
   nav.classList.remove('hovering-nav');
});