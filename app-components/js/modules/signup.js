$(document).ready(function() {
//variable to check if the fields on the form has been validated. Only run AJAX call if it's true
    let formsValidated = 0;
    
    //function to see if a given form element is empty or not, takes an input, and a label
    let validateForm = (formElement, errorElement) => {
    //        console.log(formElement);
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
            $.ajax({
                method: "POST",
                url: "../test.php"
            })
            .done(function(data) {
    //            console.log(data);
                $('#signup-header').remove();
                $('#signup-main').remove();
                $('#signup-container').append(data);
                window.scrollTo(0, 0);
            })
            .fail(function() {
                alert('Something went wrong with the server request. Please try again, or contact the network administrator.');
            })
            
        } else {
            formsValidated = 0;
        }
    });
});