<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<div class="container" id="loginContainer">
    <div class="header" id="loginHeader">
        <header class="header--banner"><h1>Log In</h1></header>
        <p class="header--text">
           Log In Here, and Share Your Art!
        </p> <!-- /header-text -->
    </div> <!-- /header -->
    
    <div class="main" id="loginMain">
        <h3 class="main--heading">Enter Your Information Here:</h3>
        <div class="main--content">
           <form enctype="multipart/form-data" method="post" name="loginForm" id="loginForm">
                <div class='upload-section'>
                    <label for="username">Username</label>
                    <label class='error-message' id='username-login-error'></label>
                    <input class="form-control" type="text" placeholder="Username" name="username" id="loginUsername">
                </div> <!-- /upload-section -->

                <div class='upload-section'>
                    <label for="password">Password</label>
                    <label class='error-message' id='password-login-error'></label>
                    <input class="form-control" type="password" placeholder="Password" name="password" id="loginPassword">
                </div> <!-- /upload-section -->

                <button class="btn-birdey" id='login-form-button' type="button" name="submit">Submit</button>
            </form> <!-- /loginForm -->
            <p>
                Don't remember your password? <a class='upload--link' href="lost-password.php">Click Here</a>!
            </p>
        </div> <!-- /content -->
    </div> <!-- /main -->
</div> <!-- /container -->


<?php include 'includes/footer.php'; ?>