<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/functions.php'; ?>

<?php
    if(isset($_SESSION['resetPassword'] && $_SESSION['resetPassword'] != null)) {
        if(isset($_SESSION['reset_id'] && $_SESSION['reset_id'] != null)) {
            $user_id = $_SESSION['reset_id'];
        }else {
            resetRedirect();
        }
    } else {
        resetRedirect();
    }

//check the user's security questions
    $fave_pet = sanitize($_POST['fave_pet']);
    $fave_food = sanitize($_POST['fave_food']);
    $born_at = sanitize($_POST['born_at']);

    $stmt = $db->prepare("SELECT * FROM ba_users WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $db_fave_pet = $row['fave_pet'];
        $db_fave_food = $row['fave_food'];
        $db_born_at = $row['born_at'];
    }
//compared the values that were entered to the ones stored in the database
    if( password_verify($fave_pet, $db_fave_pet) && password_verify($fave_food, $db_fave_food) && password_verify($born_at, $db_born_at) && password_verify($to_visit, $db_to_visit) ) {
        
        $_SESSION['reset-auth'] = true;
        $noErrorsReset = true;
    } else {
//display error message if not all of the fields match 
        echo "<h3 class='confirmation-message-fail'>One or more of your answers were not correct. Please try again.</h3>";
    }

    if($noErrorsReset) {
?>
   
    <div class="main" class="resetPasswordMain">
        <h3 class="main--heading">Found you! Now just answer your security questions, and you can reset your password.</h3>

        <div class="main--content">
            <form enctype="multipart/form-data" method="post" name="resetPassForm" id="lostPassActionForm">
                    <div class='upload-section'>
                        <label class='upload-section--label' for="password">Password</label>
                        <label class='error-message' id='reset-password-error'></label>
                        <input type="password" placeholder="Password" name="password" id='reset-password'>
                    </div> <!-- /upload-section -->
                    
                    <div class='upload-section'>
                        <label class='upload-section--label' for="password">Password</label>
                        <label class='error-message' id='reset-password-confirm-error'></label>
                        <input type="password" placeholder="Password" name="passwordCheck" id='reset-password-confirm'>
                    </div> <!-- /upload-section -->

                <div class='upload-buttons'>
                    <button class="btn-birdey upload-buttons--btn" type="reset" name="reset">Reset</button>
                    <button class="btn-birdey upload-buttons--btn" id='resetPasswordSubmit' type="button" name="submit">Submit</button>
                </div> <!-- /upload-section -->
            </form> <!-- /loginForm -->
        </div> <!-- /content -->
        <script src="js/lost-password.js"></script>
    </div> <!-- /main -->
   
<?php
    } else {
?>
   
    <div class="main" class="lostPasswordActionMain">
        <h3 class="main--heading">Found you! Now just answer your security questions, and you can reset your password.</h3>

        <div class="main--content">
            <form enctype="multipart/form-data" method="post" name="lostPassActionForm" id="lostPassActionForm">
              <div class='upload-section'>
                   <label class='upload-section--label' for="fave_pet">What's your favorite animal or pet?</label>
                   <label class='error-message' id='lost-fave-pet-error'></label>
                   <input type="text" name="fave_pet" id="lost-fave_pet" placeholder="Your Anwser">
               </div> <!-- /upload-section -->

               <div class='upload-section'>
                   <label class='upload-section--label' for="fave_food">What's your favorite food?</label>
                   <label class='error-message' id='lost-fave-food-error'></label>
                   <input type="text" name="fave_food" id="lost-fave_food" placeholder="Your Anwser">
               </div> <!-- /upload-section -->

               <div class='upload-section'>
                   <label class='upload-section--label' for="born_at">Where were you born?</label>
                   <label class='error-message' id='lost-born-at-error'></label>
                   <input type="text" name="born_at" id="lost-born_at" placeholder="Your Anwser">
               </div> <!-- /upload-section -->

                <div class='upload-buttons'>
                    <button class="btn-birdey upload-buttons--btn" type="reset" name="reset">Reset</button>
                    <button class="btn-birdey upload-buttons--btn" id='lostPasswordActionSubmit' type="button" name="submit">Submit</button>
                </div> <!-- /upload-section -->
            </form> <!-- /loginForm -->
        </div> <!-- /content -->
        <script src="js/lost-password.js"></script>
    </div> <!-- /main -->
   
<?php
    }
?>