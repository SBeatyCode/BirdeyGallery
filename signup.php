<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<div class="container" id='signup-container'>
    <div class="header" id='signup-header'>
        <header class="header--banner"><h1>Sign Up</h1></header>
        <p class="header--text">
           Register Your New Account Here!
        </p> <!-- /header-text -->
    </div> <!-- /header -->
    
    <div class="main" id='signup-main'>
        <h3 class="main--heading">Please Fill the Following Information to Create Your Account</h3>
        <p>
           <em>
               *~ When you sign up, you'll be able to leave comments on any of the art posted. Please remember to always be courteous and respectful to everyone in the community. Bigotry, bullying, trolling and the like will not be tollerated. This is a positive, safe space to appreciate art. Have fun! ~*
           </em>
       </p>
        <div class="main--content">
            <div class='upload-wrapper'>
              <form enctype="multipart/form-data" method="post" name="signupForm" id="signupForm">
                    <div class='upload-section'>
                        <label class='upload-section--label' for="name">Name</label>
                        <label class='error-message' id='name-error'></label>
                        <input type="text" placeholder="Your Name" name="name" id='signup-name'>
                    </div> <!-- /upload-section -->

                    <div class='upload-section'>
                        <label class='upload-section--label' for="username">Username</label>
                        <label class='error-message' id='username-error'></label>
                        <input type="text" placeholder="Username (others will see this)" name="username" id='signup-username'>
                    </div> <!-- /upload-section -->

                    <div class='upload-section'>
                        <label class='upload-section--label' for="password">Password</label>
                        <label class='error-message' id='password-error'></label>
                        <input type="password" placeholder="Password" name="password" id='signup-password'>
                    </div> <!-- /upload-section -->
                        
                    <div class='upload-section'>
                        <label class='upload-section--label' for="artDate">Date of Birth </label>
                        <label class='error-message' id='dob-error'></label>
                        <input type="date" class="date" name="dob" id='signup-dob'>
                    </div> <!-- /upload-section -->
                    
                    <div class='upload-section'>
                        <label class='upload-section--label' for="about">About Me</label>
                        <textarea class='responsive-textarea' placeholder="Say something about yourself here, in 200 characters or less. This is optional, but it's fun to share a little something about who you are!" name="about" id='signup-about' maxlength="200"></textarea>
                    </div> <!-- /upload-section -->

                   <div class='upload-section'>
                       ~ The following questions are your security questions, and should not be shared with anyone. ~
                   </div> <!-- /upload-section -->
                    
                    <div class='upload-section'>
                       <label class='upload-section--label' for="fave_pet">What's your favorite animal or pet?</label>
                       <label class='error-message' id='fave-pet-error'></label>
                       <input type="text" name="fave_pet" id="signup-fave_pet" placeholder="Your Anwser">
                   </div> <!-- /upload-section -->

                   <div class='upload-section'>
                       <label class='upload-section--label' for="fave_food">What's your favorite food?</label>
                       <label class='error-message' id='fave-food-error'></label>
                       <input type="text" name="fave_food" id="signup-fave_food" placeholder="Your Anwser">
                   </div> <!-- /upload-section -->

                   <div class='upload-section'>
                       <label class='upload-section--label' for="born_at">Where were you born?</label>
                       <label class='error-message' id='born-at-error'></label>
                       <input type="text" name="born_at" id="signup-born_at" placeholder="Your Anwser">
                   </div> <!-- /upload-section -->

                    <div class='upload-buttons'>
                        <button class="btn-birdey upload-buttons--btn" type="reset" name="reset">Reset</button>
                        <button class="btn-birdey upload-buttons--btn" id='signup-submit' type="button" name="submit">Submit</button>
                    </div> <!-- /upload-section -->
                    
                    <footer>
                       <em>
                           *We will <strong>never</strong> share your personal information*
                       </em>
                    </footer>
              </form>
            </div> <!-- /upload-wrapper -->
        </div> <!-- /content -->
    </div> <!-- /main -->
</div> <!-- /container -->


<?php include 'includes/footer.php'; ?>