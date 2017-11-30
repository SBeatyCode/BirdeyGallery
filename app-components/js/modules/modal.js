//Getting the images, the modal close button, the modal image, and the modal
let profile_images_Array = Array.from(document.getElementsByClassName('profile-gallery--image'));
let closeBtn = document.getElementById('modal-close');
let modal = document.getElementById('modal');
let modal_image = document.getElementById('modal-image');


//method to open the modal and disply the clicked image
let openModal = (e) => {
    if (e.target.className == 'profile-gallery--image') {
        let src = e.target.getAttribute('src');
        modal_image.setAttribute('src', src);
        modal.style.display = 'flex';
    }
}

//method to close the modal when the close button is clicked
let closeModal = () => {
    modal.style.display = 'none';
}

//add the event listeners on the close button, and all of the images in the image array
closeBtn.addEventListener('click', closeModal);

for(let i = 0; i < profile_images_Array.length; i++) {
    profile_images_Array[i].addEventListener('click', openModal);
}