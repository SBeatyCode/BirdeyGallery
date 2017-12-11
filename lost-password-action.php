<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/functions.php'; ?>
       
<?php
//get the data for the user-entered username and password, and try a querry
    $username = sanitize($_POST['username']);
    $dob = sanitize($_POST['dob']);

    $stmt = $db->prepare("SELECT * FROM ba_users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

//if the query can be completeed using the provided user name, continue
    if(($stmt->rowCount()) > 0 ) {
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $db_dob = $row['date_of_birth'];
            $id = $row['user_id'];
        }
//if the stored date of birth matches the user-entered one, continue to next verification page
        if($dob == $db_dob) {
            $_SESSION['resetPassword'] = true;
            $_SESSION['reset_id'] = $id;
            $noErrors = true;
        } else {
//the date of birth provided by the user and stored and the database don't match - display error message 
            echo "<h3 class='confirmation-message-fail'>The entered Date of Birth does not match the username. Please try again.</h3>";
        }
    } else {
//query using the provided username gave no results - display error message 
        echo "<h3 class='confirmation-message-fail'>No user by that name could be found. Please try again.</h3>";
    }

    if($noErrors) {
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
    } else {
?>
   
    <div class="main" class="lostPasswordMain">
        <h3 class="main--heading">Give us your username and your date of birth, and we'll try to find you.</h3>

        <div class="main--content">
            <form enctype="multipart/form-data" method="post" name="lostPassForm" id="lostPasswordForm">
                <div class='upload-section'>
                    <label for="username">Username</label>
                    <label class='error-message' id='lost-username-error'></label>
                    <input class="form-control" type="text" placeholder="Username" name="username" id="lostUsername">
                </div> <!-- /upload-section -->

                <div class='upload-section'>
                    <label for="artDate">Date of Birth </label>
                    <label class='error-message' id='lost-dob-error'></label>
                    <input type="date" class="date" name="dob" id='lost-dob'>
                </div> <!-- /upload-section -->

                <button class="btn-birdey" id='login-form-button' type="button" name="submit" id="lostPasswordSubmit">Submit</button>
            </form> <!-- /loginForm -->
        </div> <!-- /content -->
        <script src="js/lost-password.js"></script>
    </div> <!-- /main -->
   
<?php
    }
?>       