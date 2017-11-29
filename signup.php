<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<div class="container">
    <div class="header">
        <header class="header--banner"><h1>Sign Up</h1></header>
        <p class="header--text">
           Register Your New Account Here!
        </p> <!-- /header-text -->
    </div> <!-- /header -->
    
    <div class="main">
        <h3 class="main--heading">Please Fill the Following Information to Create Your Account</h3>

        <div class="main--content">
            <div class='upload-wrapper'>
              <form enctype="multipart/form-data" method="post">
                    <div class='upload-section'>
                        <label class='upload-section--label' for="name">Name</label>
                        <input class="form-control" type="text" placeholder="Your Name" name="name">
                    </div> <!-- /upload-section -->

                    <div class='upload-section'>
                        <label class='upload-section--label' for="username">Username</label>
                        <input class="form-control" type="text" placeholder="Username (others will see this)" name="username">
                    </div> <!-- /upload-section -->

                    <div class='upload-section'>
                        <label class='upload-section--label' for="password">Password</label>
                        <input class="form-control" type="password" placeholder="Password" name="password">
                    </div> <!-- /upload-section -->
                        
                    <div class='upload-section'>
                        <label class='upload-section--label' for="artDate">Date of Birth </label>
                        <input type="date" class="date" name="dob">
                        <small>We will never use or share your date of birth. This is purely for identification purposes.</small>
                    </div> <!-- /upload-section -->
                      
                    <div class='upload-section'>
                       <label class='upload-section--label' for="image">Choose an image to upload as an avatar: </label>
                       <input type="file" name="image">
                    </div> <!-- /upload-section -->
                    
                    <div class='upload-section'>
                        <label class='upload-section--label' for="about">About Me</label>
                        <textarea class='responsive-textarea' placeholder="Say something about yourself here, no more than 200 characters." name="about"></textarea>
                    </div> <!-- /upload-section -->

                   <div class='upload-section'>
                       ~ The following questions are your security questions, and should not be shared with anyone. ~
                   </div> <!-- /upload-section -->
                    
                    <div class='upload-section'>
                       <label class='upload-section--label' for="fave_pet">What's your favorite animal or pet?</label>
                       <input type="text" class="form-control" name="fave_pet" placeholder="Your Anwser">
                   </div> <!-- /upload-section -->

                   <div class='upload-section'>
                       <label class='upload-section--label' for="fave_food">What's your favorite food?</label>
                       <input type="text" class="form-control" name="fave_food" placeholder="Your Anwser">
                   </div> <!-- /upload-section -->

                   <div class='upload-section'>
                       <label class='upload-section--label' for="born_at">Where were you born?</label>
                       <input type="text" class="form-control" name="born_at" placeholder="Your Anwser">
                   </div> <!-- /upload-section -->

                    <div class='upload-buttons'>
                        <button class="btn-birdey upload-buttons--btn" type="reset" name="reset">Reset</button>
                        <button class="btn-birdey upload-buttons--btn" type="submit" name="submit">Submit</button>
                    </div> <!-- /upload-section -->
              </form>
            </div> <!-- /upload-wrapper -->
        </div> <!-- /content -->
    </div> <!-- /main -->
</div> <!-- /container -->


<?php include 'includes/footer.php'; ?>