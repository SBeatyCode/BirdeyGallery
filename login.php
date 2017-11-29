<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<div class="container">
    <div class="header">
        <header class="header--banner"><h1>Log In</h1></header>
        <p class="header--text">
           Log In Here, and Share Your Art!
        </p> <!-- /header-text -->
    </div> <!-- /header -->
    
    <div class="main">
        <h3 class="main--heading">Enter Your Information Here:</h3>

        <div class="main--content">
            <div class='upload-section'>
                <label for="username">Username</label>
                <input class="form-control" type="text" placeholder="Username" name="username">
            </div> <!-- /upload-section -->

            <div class='upload-section'>
                <label for="password">Password</label>
                <input class="form-control" type="password" placeholder="Password" name="password">
            </div> <!-- /upload-section -->

            <button class="btn-birdey" id="login-form button" name='submit'>Submit</button>

            <p>
                Don't remember your password? <a class='upload--link' href="lost-password.php">Click Here</a>
            </p>
        </div> <!-- /content -->
    </div> <!-- /main -->
</div> <!-- /container -->


<?php include 'includes/footer.php'; ?>