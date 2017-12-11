$(document).ready(function() {
    $('#editArtImageSubmit').click((e) => {
        let formData = new FormData($('#editArtImageForm')[0]);

        $.ajax({
            type: "POST",
            url: "edit-art-image-action.php",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
        .done(function(data) {
            $('#editArtImageHeader').remove();
            $('#editArtImageMain').remove();
            $('#editArtImageContainer').append(data);
        })
        .fail(function(data) {
            alert('Something went wrong with the server request. Please try again, or contact the network administrator.');
            console.log(data.statusText);
            console.log(data);
            window.scrollTo(0, 0);
        })
    });
});