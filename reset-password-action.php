<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/functions.php'; ?>

<div class="container" class="lostPasswordContainer">
    <div class="header" class="lostPasswordHeader">
        <header class="header--banner"><h1>Lost Password</h1></header>
<?php
            $password = sanitize($_POST['password']);

            $user_id = $_SESSION['reset_id'];
//encrypt the password
            $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

            $stmt = $db->prepare("UPDATE ba_users set password = :password WHERE user_id = :user_id");
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':user_id', $user_id);

            $stmt->execute();

//clear the Session reset variables and clear the session
            $_SESSION['reset-auth'] = null;
            $_SESSION['resetPassword'] = null;
            $_SESSION['reset_id'] = null;
            session_unset();
            session_destroy();

            $noErrorsResetAction = true;
        
        if($noErrorsResetAction) {
    //if no errors, display confirmation
?>
            <h3 class='confirmation-message-success'>Password has been reset successfully!</h3>
        </div> <!-- /header -->

        <div class='main'>
            <div class="main--content">
                <a class="btn-birdey-wrapper" href="login.php"><input type="button" class="btn-birdey" value="Log In"></a>
            </div> <!-- /content -->
        </div> <!-- /main -->
    
<?php
        } else {
?>
                <h3 class='confirmation-message-fail'>The passwords do not match. Please try again.</h3>
            </div> <!-- /header -->
            
           <div class="main" id="resetPasswordMain">
        <h3 class="main--heading">Found you! Now you can reset your password.</h3>

        <div class="main--content">
            <form enctype="multipart/form-data" method="post" name="resetPassForm" id="lostPassActionForm">
                   <label class='error-message' id='reset-password-match-error' name='reset-password-match-error'></label>
                    <div class='upload-section'>
                        <label class='upload-section--label' for="password">Password</label>
                        <label class='error-message' id='reset-password-error'></label>
                        <input type="password" placeholder="Password" name="password" id='reset-password'>
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
        }
?>