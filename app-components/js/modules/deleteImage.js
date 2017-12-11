$(document).ready(function() {
//delete an image - only possible is the user is the one viewing their artwork. checks for confirmation first.
    $('#deleteImage').click(() => {
        let deleteConfirm = confirm("Are you sure you want to delete this image?");
        if(deleteConfirm) {
            $.ajax({
                type: "POST",
                url: "view-image-delete.php",
                data: {delete: 'true'},
                cache: false,
            })
            .done(function(data) {
                $('#viewImageHeader').remove();
                $('#viewImageMain').remove();
                $('#viewImageContainer').append(data);
            })
            .fail(function(data) {
                alert('Something went wrong with the server request. Please try again, or contact the network administrator.');
                console.log(data.statusText);
                console.log(data);
                window.scrollTo(0, 0);
            })
        }
    });
});