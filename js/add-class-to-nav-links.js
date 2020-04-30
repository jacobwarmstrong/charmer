/*
Adds bootstrap class to navbar links
*/

var menu = document.getElementById('primary-menu');
for(i = 0; i < menu.childElementCount; i++){
    menu.children.item(i).firstElementChild.className = 'nav-link';
}

