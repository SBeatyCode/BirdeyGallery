let dropdownMenu = document.getElementById('navbar-dropmenu');
let menuButton = document.getElementById('menu-button');
let navitems = document.getElementsByClassName('navbar--mobile--menu--list-item');


let toggleMenu = () => {
    if(dropdownMenu.style.height == '14em' || dropdownMenu.style.height == '10.5em') {
        dropdownMenu.style.height = '0';
        for(let i = 0; i < navitems.length; i++) {
            navitems[i].style.display = 'none';
        }
    } else {
        if(navitems.length == 8) {
            dropdownMenu.style.height = '14em';
        } else {
            dropdownMenu.style.height = '10.5em';
        }
        setTimeout(() => {
            for(let i = 0; i < navitems.length; i++) {
                navitems[i].style.display = 'block';
            }
        }, 600);
    }
}


menuButton.addEventListener('click', toggleMenu);