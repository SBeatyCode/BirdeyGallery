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
    
    $('#login-form-button').click( function() { 
        if(validateForm($('#loginUsername').val(), $('#username-login-error'))) {
            formsValidated += 1;
        }
        
        if(validateForm($('#loginPassword').val(), $('#password-login-error'))) {
            formsValidated += 1;
        }
        
    //if the forms are validated, then process the AJAX request.
        if(formsValidated == 2) {  
            //submit the form, then make the ajax call
            $('#loginForm').submit();
            
            $.ajax({
                method: "POST",
                url: "login-action.php", //signup-action.php
                data: $('#loginForm').serialize(),
                cache: false
            })
            .done(function(data) {
                $('#loginHeader').remove();
                $('#loginMain').remove();
                $('#loginContainer').append(data);
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