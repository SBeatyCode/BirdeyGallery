<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<?php

    if(isLoggedIn()) {
        //checking to see that the user is logged in, if they aren't they shouldn't be able to reach this page, so will be redirected to index
    } else {
        header("Location: index.php");
    }

?>

<div class="container" id="uploadArtContainer">
    <div class="header" id="uploadArtHeader">
        <header class="header--banner"><h1>Upload Art</h1></header>
        <p class="header--text">
           Post a New Work of Art Here!
        </p> <!-- /header-text -->
    </div> <!-- /header -->
    
    <div class="main" id="uploadArtMain">
        <h3 class="main--heading">Please select the image you would like to upload, then you can fill out the information about it.</h3>
        <div class="main--content">
            <div class='upload-wrapper'>
              <form enctype="multipart/form-data" method="post" name="uploadArtForm" id="uploadArtForm">
                    <div class='upload-section'>
                       <label class='upload-section--label' for="image">Choose an image to upload: </label>
                       <input type="file" name="image" id="uploadArtImage">
                    </div> <!-- /upload-section -->

                    <div class='upload-buttons'>
                        <button class="btn-birdey upload-buttons--btn" type="button" name="uploadArtSubmit" id="uploadArtSubmit">Submit</button>
                    </div> <!-- /upload-section -->
              </form>
            </div> <!-- /upload-wrapper -->

        </div> <!-- /content -->
    </div> <!-- /main -->
</div> <!-- /container -->


<?php include 'includes/footer.php'; ?>