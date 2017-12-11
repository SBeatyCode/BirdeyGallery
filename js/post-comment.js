$(document).ready(function() {
    $('#viewImageSubmit').click( function() {           
        $.ajax({
            method: "POST",
            url: "view-image-action.php",
            data: $('#viewImageCommentForm').serialize(),
            cache: false
        })
        .done(function(data) {
            $('#viewImageHeader').remove();
            $('#viewImageMain').remove();
            $('#viewImageContainer').append(data);
            window.scrollTo(0, 0);
        })
        .fail(function(data) {
            alert('Something went wrong with the server request. Please try again, or contact the network administrator.');
            console.log(data.statusText);
            console.log(data);
            window.scrollTo(0, 0);
        })
    });
});