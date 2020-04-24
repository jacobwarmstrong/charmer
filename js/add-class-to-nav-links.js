/*
Adds bootstrap class to navbar links
*/

var menu = document.getElementById('primary-menu');
console.log(menu.children);
console.log(menu.childElementCount);
for(i = 0; i < menu.childElementCount; i++){
    menu.children.item(i).firstElementChild.className = 'nav-link';
    console.log( menu.children.item(i).firstElementChild);
}