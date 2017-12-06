<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>
            
<div class="container" id='profileImageContainer'>
    <div class="header" id='profileImageHeader'>
        <header class="header--banner"><h1>Edit Profile Image</h1></header>
        <p class="header--text">
           Update Your Profile Image Here!
        </p> <!-- /header-text -->
    </div> <!-- /header -->
    
    <div class='main' id='profileImageMain'>
        <div class="main--content">
            <form enctype="multipart/form-data" method="post" name="profileImageForm" id="profileImageForm">
                <div class='upload-section'>
                   <label class='upload-section--label' for="image">Choose an image to upload as a profile image: </label>
                   <input type="file" name="image" id="profileImageUpload">
                </div> <!-- /upload-section -->
            </form> <!-- /signupFormImage -->

            <div class='upload-buttons'>
                <button class="btn-birdey upload-buttons--btn" id='profileImage--submit' type="button" name="profileImage--submit">Submit</button>
            </div> <!-- /upload-buttons -->
            <a class="btn-birdey-wrapper" href="edit-profile.php"><input type="button" class="btn-birdey" value="Edit Profile"></a>
        </div> <!-- /content -->
    </div> <!-- /main -->                                                                              
</div> <!-- /container -->


<?php include 'includes/footer.php'; ?>