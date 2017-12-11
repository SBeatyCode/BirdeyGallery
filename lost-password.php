<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<div class="container" id="lostPasswordContainer">
    <div class="header" class="lostPasswordHeader">
        <header class="header--banner"><h1>Lost Password</h1></header>
        <p class="header--text">
           Forgot Your Password? Reset It Here!
        </p> <!-- /header-text -->
    </div> <!-- /header -->
    
    <div class="main" id="lostPasswordMain">
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

                <button class="btn-birdey" type="button" name="submit" id="lostPasswordSubmit">Submit</button>
            </form> <!-- /loginForm -->
        </div> <!-- /content -->
    </div> <!-- /main -->
</div> <!-- /container -->


<?php include 'includes/footer.php'; ?>