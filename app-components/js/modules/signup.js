$(document).ready(function() {
//variable to check if the fields on the form has been validated. Only run AJAX call if it's true
    let formsValidated = false;
    
//function to see if a given form element is empty or not
    let validateForm = (formElement) => {
//        console.log(formElement);
        if (formElement.trim() == "") {
            return false;
        } else {
            return true;
        }
    }
    
    $('#signup-submit').click( function() {
        
        var testVal = $('#submit-name').val();
        
        if(validateForm(testVal)) {
            formsValidated = true;
        };
    //if the forms are validated, then process the AJAX request.
        if(formsValidated) {
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
            //return an error message
        }
    });
});