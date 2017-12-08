<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/functions.php'; ?>
       

<div class="header" id="editProfileHeader">
        <header class="header--banner"><h1>Edit Profile</h1></header>
        <p class="header--text">
           Change Your Personal Information Here
        </p> <!-- /header-text -->
    

<?php
    $user_id = $_SESSION['user_id'];

    $stmtDB = $db->prepare("SELECT * FROM ba_users WHERE user_id = :user_id");
    $stmtDB->bindParam(':user_id', $user_id);
    $stmtDB->execute();

    while($row = $stmtDB->fetch(PDO::FETCH_ASSOC)) {
        $db_username = $row['username'];
        $db_password = $row['password'];
    }

    
    $username = sanitize($_POST['username']);

//check to see if the username already exists - if not, then continue
    if($username == $db_username) {
        $sameName = true;
    }

    if(!usernameExists($username) || $sameName) {
    //get the rest of the data from POST
        $name = sanitize($_POST['name']);
        $password = sanitize($_POST['password']);
        $dob = sanitize($_POST['dob']);
        $about = sanitize($_POST['about']);

//encrypt the new password, if the password was changed
        if($password != $db_password) {
            $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
        }
        
        
    //encrypt the secrect password reset answers
        $fave_pet = password_hash(sanitize($_POST['fave_pet']), PASSWORD_BCRYPT, array('cost' => 12));
        $fave_food = password_hash(sanitize($_POST['fave_food']), PASSWORD_BCRYPT, array('cost' => 12));
        $born_at = password_hash(sanitize($_POST['born_at']), PASSWORD_BCRYPT, array('cost' => 12));
        

        $stmt = $db->prepare("UPDATE ba_users set name = :name, username = :username, password = :password, date_of_birth = :date_of_birth, about = :about, fave_pet = :fave_pet,  fave_food = :fave_food, born_at = :born_at WHERE user_id = :user_id");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':date_of_birth', $dob);
        $stmt->bindParam(':about', $about);
        $stmt->bindParam(':fave_pet', $fave_pet);
        $stmt->bindParam(':fave_food', $fave_food);
        $stmt->bindParam(':date_of_birth', $dob);
        $stmt->bindParam(':born_at', $born_at);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        $noError = true;    

        $_SESSION['username'] = $username;
        $_SESSION['name'] = $name;
    } else {
//display error message if the username already exists
        echo "<h3 class='confirmation-message-fail'>That username already exists. Please try another one</h3>";
    }
    
    if ($noError) {
        echo "<h3 class='confirmation-message-success'>User information has been updated!</h3>";
?>
  
   </div> <!-- /header -->
    
    <div class="main" id="editProfileMain">
        <h3 class="main--heading">Edit Your Information Here</h3>
        
        <h3>Want to edit your profile image? Edit it <a class="header--text--link" href="edit-profile-image.php">here</a>!</h3>

        <div class="main--content">
            <a class='btn-birdey-wrapper' href="profile.php?id=<?php echo $user_id; ?>"><input type='button' class='btn-birdey' value='Profile'></a>
        </div> <!-- /content -->
    </div> <!-- /main -->
    
<?php
    } else {
?>
       </div> <!-- /header -->
    
    <div class="main" id="editProfileMain">
        <h3 class="main--heading">Edit Your Information Here</h3>
        
        <h3>Want to edit your profile image? Edit it <a class="header--text--link" href="edit-profile-image.php">here</a>!</h3>
        <div class="main--content">
            <div class='upload-wrapper'>
              <form enctype="multipart/form-data" method="post" id="editProfileForm">
                    <div class='upload-section'>
                        <label class='upload-section--label' for="name">Name</label>
                        <label class='error-message' id='name-error'></label>
                        <input class="form-control" type="text" value="<?php echo $db_name; ?>" name="name" id="editProfileName">
                    </div> <!-- /upload-section -->

                    <div class='upload-section'>
                        <label class='upload-section--label' for="username">Username</label>
                        <label class='error-message' id='username-error'></label>
                        <input class="form-control" type="text" value="<?php echo $db_username; ?>" name="username" id="editProfileUsername">
                    </div> <!-- /upload-section -->

                    <div class='upload-section'>
                        <label class='upload-section--label' for="password">Password</label>
                        <label class='error-message' id='password-error'></label>
                        <input class="form-control" type="password" value="<?php echo $db_password; ?>" name="password" id="editProfilePassword">
                    </div> <!-- /upload-section -->
                        
                    <div class='upload-section'>
                        <label class='upload-section--label' for="artDate">Date of Birth </label>
                        <label class='error-message' id='dob-error'></label>
                        <input type="date" class="date" value="<?php echo $db_dob; ?>" name="dob" id="editProfileDob">
                    </div> <!-- /upload-section -->
                    
                    <div class='upload-section'>
                        <label class='upload-section--label' for="about">About Me</label>
                        <textarea class='responsive-textarea' placeholder="Say something about yourself here, no more than 200 characters." name="about" id="editProfileAbout"><?php echo $db_about; ?></textarea>
                    </div> <!-- /upload-section -->

                   <div class='upload-section'>
                       ~ The following questions are your security questions, and should not be shared with anyone. ~
                   </div> <!-- /upload-section -->
                    
                    <div class='upload-section'>
                       <label class='upload-section--label' for="fave_pet">What's your favorite animal or pet?</label>
                       <label class='error-message' id='fave-pet-error'></label>
                       <input type="text" class="form-control" name="fave_pet" id="editProfileFavePet" placeholder="Your Anwser">
                   </div> <!-- /upload-section -->

                   <div class='upload-section'>
                       <label class='upload-section--label' for="fave_food">What's your favorite food?</label>
                       <label class='error-message' id='fave-food-error'></label>
                       <input type="text" class="form-control" name="fave_food" id="editProfileFaveFood" placeholder="Your Anwser">
                   </div> <!-- /upload-section -->

                   <div class='upload-section'>
                       <label class='upload-section--label' for="born_at">Where were you born?</label>
                       <label class='error-message' id='born-at-error'></label>
                       <input type="text" class="form-control" name="born_at" id="editProfileBornAt" placeholder="Your Anwser">
                   </div> <!-- /upload-section -->

                    <div class='upload-buttons'>
                        <button class="btn-birdey upload-buttons--btn" type="reset" name="reset">Reset</button>
                        <button class="btn-birdey upload-buttons--btn" type="button" name="editProfileSubmit" id="editProfileSubmit">Submit</button>
                    </div> <!-- /upload-section -->
              </form>
            </div> <!-- /upload-wrapper -->
        </div> <!-- /content -->
    </div> <!-- /main -->
    
<?php
    }
?>