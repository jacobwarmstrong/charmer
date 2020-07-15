//Image Lightbox hover

var $categoryBtn = $('.btn');
var $tagBadges = $('.badge');
var $window = $(window);

var timer;
var mouseMoving = false;
var imageInfo = document.getElementById('image-info');
var closeButton = document.getElementById('close-button');
var leftButton = document.getElementById('left-arrow');
var rightButton = document.getElementById('right-arrow');
var areas = [imageInfo, closeButton];
if(leftButton != null) {
    areas.push(leftButton);
}
if(rightButton != null) {
    areas.push(rightButton);
}
var onInfo = false;

function switchDisplay(state) {
    var opacity;
    switch(state) {
        case 'on':
            opacity = 1.0;
            break;
        case 'off':
            opacity = 0;
            break;
        default:
            opacity = 0;
            console.log('your switch failed');
    }
    for(i=0;i<areas.length;i++) {
        areas[i].style.opacity = opacity;
    }
}

function changeState() {
    if (onInfo == false) {
        switchDisplay('off');
    } else {
        switchDisplay('on');
    }
}

switchDisplay('off');

document.addEventListener('mousemove', function() {
    switchDisplay('on');
    clearTimeout(timer);
    timer = setTimeout(changeState, 1200);
});

for(i=0;i<areas.length;i++) {
    console.log('yeah buddy');
    areas[i].addEventListener('mouseover', function() {
        onInfo = true;
        switchDisplay('on');
    });
    areas[i].addEventListener('mouseout', function() {
        onInfo = false;
        switchDisplay('off');
    });
}

console.log( $window.width() );

//on load 
if ($window.width() <= 425) {
    $categoryBtn.removeClass('btn-outline-light');
    $categoryBtn.addClass('btn-secondary');
    $tagBadges.each(function() {
        $(this).addClass('badge-primary');
        $(this).removeClass('badge-pill-outline-light');
    });
}

//on resize check again
$window.resize(function() {
    if ($window.width() <= 425) {
        $categoryBtn.removeClass('btn-outline-light');
        $categoryBtn.addClass('btn-secondary');
        $tagBadges.each(function() {
            $(this).addClass('badge-primary');
            $(this).removeClass('badge-pill-outline-light');
        });
    }
});
