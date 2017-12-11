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

//page one of the lost-password process, once the button is clicked
    
    $('#lostPasswordSubmit').click( function() { 
//validate all the fields
        if(validateForm($('#lostUsername').val(), $('#lost-username-error'))) {
            formsValidated += 1;
        }
        
        if(validateForm($('#lost-dob').val(), $('#lost-dob-error'))) {
            formsValidated += 1;
        }
        
    //if the forms are validated, then process the AJAX request.
        if(formsValidated == 2) {      
            $.ajax({
                method: "POST",
                url: "lost-password-action.php", //signup-action.php
                data: $('#lostPasswordForm').serialize(),
                cache: false
            })
            .done(function(data) {
                $('#lostPasswordMain').remove();
                $('#lostPasswordContainer').append(data);
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
        
        formsValidated = 0;
    });
    
//page two of the lost-password process, once the button is clicked
    
    $('#lostPasswordActionSubmit').click( function() { 
        //validate all the fields
        if(validateForm($('#lost-fave_pet').val(), $('#lost-fave-pet-error'))) {
            formsValidated += 1;
        }
        
        if(validateForm($('#lost-fave_food').val(), $('#lost-fave-food-error'))) {
            formsValidated += 1;
        }
        
        if(validateForm($('#lost-born_at').val(), $('#lost-born-at-error'))) {
            formsValidated += 1;
        }
        
    //if the forms are validated, then process the AJAX request.
        if(formsValidated == 3) {      
            $.ajax({
                method: "POST",
                url: "reset-password.php", //signup-action.php
                data: $('#lostPassActionForm').serialize(),
                cache: false
            })
            .done(function(data) {
                if($('#lostPasswordMain') != undefined || $('#lostPasswordMain') != null ) {
                    $('#lostPasswordMain').remove();
                }
                $('#lostPasswordActionMain').remove();
                $('#lostPasswordContainer').append(data);
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