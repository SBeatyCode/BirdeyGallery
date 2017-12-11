$(document).ready(function() {
    $('#uploadArtSubmit').click((e) => {
        
        let formData = new FormData($('#uploadArtForm')[0]);

        $.ajax({
            type: "POST",
            url: "upload-art-action.php",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
        .done(function(data) {
            $('#uploadArtHeader').remove();
            $('#uploadArtMain').remove();
            $('#uploadArtContainer').append(data);
        })
        .fail(function(data) {
            alert('Something went wrong with the server request. Please try again, or contact the network administrator.');
            console.log(data.statusText);
            console.log(data);
            window.scrollTo(0, 0);
        })
    });
});