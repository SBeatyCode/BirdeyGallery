$(document).ready(function() {
//variable to check if the fields on the form has been validated. Only run AJAX call if it's true
    let formsValidated = 0;
    
    //function to see if a given form element is empty or not, takes an input, and a label
    let validateForm = (formElement, errorElement) => {
        if (formElement.trim() == "") {
            errorElement.html('*~~ You must enter a value in the field. ~~*');
            return false;
        } else {
            errorElement.html('');
            return true;
        }
    }

    //validate all the fields
    
    $('#editArtSubmit').click( function() {     
        if(validateForm($('#art_title').val(), $('#art_title-error'))) {
            formsValidated += 1;
        }
        
        if(validateForm($('#art_date').val(), $('#art_date-error'))) {
            formsValidated += 1;
        }
        
        
    //if the forms are validated, then process the AJAX request.
        if(formsValidated == 2) {
            $.ajax({
                method: "POST",
                url: "edit-art-action.php",
                data: $('#editArtForm').serialize(),
                cache: false
            })
            .done(function(data) {
                $('#editArtMain').remove();
                $('editArtContainer').append(data);
                window.scrollTo(0, 0);
            })
            .fail(function(data) {
                alert('Something went wrong with the server request. Please try again, or contact the network administrator.');
                console.log(data.statusText);
                console.log(data);
                window.scrollTo(0, 0);
            })
        //reset the validation counter so it can't be resuubmitted over and over
            formsValidated = 0;
            
        } else {
        //forms not validated
            formsValidated = 0;
        }
    });
});