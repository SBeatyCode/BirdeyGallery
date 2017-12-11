$(document).ready(function() {
    $('#profileImage--submit').click((e) => {
        
        let formData = new FormData($('#profileImageForm')[0]);

        $.ajax({
            type: "POST",
            url: "edit-profile-image-action.php",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
        .done(function(data) {
            $('#profileImageHeader').remove();
            $('#profileImageMain').remove();
            $('#profileImageContainer').append(data);
        })
        .fail(function(data) {
            alert('Something went wrong with the server request. Please try again, or contact the network administrator.');
            console.log(data.statusText);
            console.log(data);
            window.scrollTo(0, 0);
        })
    });
});