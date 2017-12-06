$(document).ready(function() {
    $('#profileImage--submit').on('click', (e) => {
            $.ajax({
                type: "POST",
                url: "edit-profile-image-action.php",
                data: new FormData($('#profileImageForm')[0]),
                cache: false,
                contentType: false,
                processData: false
            })
            .done(function(data) {
                $('#profileImageHeader').remove();
                $('#profileImageMain').remove();
                $('#profileImageContainer').append(data);
                window.scrollTo(0, 0);
            })
            .fail(function(data) {
                alert('Something went wrong with the server request. Please try again, or contact the network administrator.');
                console.log(data.statusText);
                console.log(data);
            })
    });
});