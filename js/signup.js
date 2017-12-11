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
    
    $('#signup-submit').click( function() {
        if(validateForm($('#signup-name').val(), $('#name-error'))) {
            formsValidated += 1;
        }
        
        if(validateForm($('#signup-username').val(), $('#username-error'))) {
            formsValidated += 1;
        }
        
        if(validateForm($('#signup-password').val(), $('#password-error'))) {
            formsValidated += 1;
        }
        
        if(validateForm($('#signup-dob').val(), $('#dob-error'))) {
            formsValidated += 1;
        }
        
        if(validateForm($('#signup-fave_pet').val(), $('#fave-pet-error'))) {
            formsValidated += 1;
        }
        
        if(validateForm($('#signup-fave_food').val(), $('#fave-food-error'))) {
            formsValidated += 1;
        }
        
        if(validateForm($('#signup-born_at').val(), $('#born-at-error'))) {
            formsValidated += 1;
        }
        
        
    //if the forms are validated, then process the AJAX request.
        if(formsValidated == 7) {
            
            //submit the form, then make the ajax call
            $('#signupForm').submit();
            
            $.ajax({
                method: "POST",
                url: "signup-action.php", //signup-action.php
                data: $('#signupForm').serialize(),
                cache: false
            })
            .done(function(data) {
                $('#signup-header').remove();
                $('#signup-main').remove();
                $('#signup-container').append(data);
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