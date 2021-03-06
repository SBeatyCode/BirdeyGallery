<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<?php

    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        
        $stmt = $db->prepare("SELECT * FROM ba_users WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['user_id'];
            $db_name = $row['name'];
            $db_username = $row['username'];
            $db_password = $row['password'];
            $db_dob = $row['date_of_birth'];
            $db_about = $row['about'];
            $db_fave_pet = $row['fave_pet'];
            $db_fave_food = $row['fave_food'];
            $db_born_at = $row['born_at'];
        }
    } else {
        header("Location: index.php");
    }

?>

<div class="container" id="editProfileContainer">
    <div class="header" id="editProfileHeader">
        <header class="header--banner"><h1>Edit Profile</h1></header>
        <p class="header--text">
           Change Your Personal Information Here
        </p> <!-- /header-text -->
    </div> <!-- /header -->
    
    <div class="main" id="editProfileMain">
        <h3 class="main--heading">Edit Your Information Here</h3>
        
        <h3>Want to edit your profile image? Edit it <a class="header--text--link" href="edit-profile-image.php">here</a>!</h3>

        <div class="main--content">
            <div class='upload-wrapper'>
              <form enctype="multipart/form-data" method="post" id="editProfileForm" name="editProfileForm">
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
                        <input class="form-control" type="password" placeholder="Change Your Password" name="password" id="editProfilePassword">
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
</div> <!-- /container -->


<?php include 'includes/footer.php'; ?>