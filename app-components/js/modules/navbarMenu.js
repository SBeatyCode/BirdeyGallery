let dropdownMenu = document.getElementById('navbar--mobile--menu');
let menuButton = document.getElementById('menu-button');

menuButton.addEventListener('click', toggleMenu);

let toggleMenu = () => {
    if(dropdownMenu.style.height === 0) {
        dropdownMenu.style.height = '21vh';
    } else {
        dropdownMenu.style.height = '0';
    }
}