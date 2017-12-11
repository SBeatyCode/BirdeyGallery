<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/functions.php'; ?>
   
    <div class="header" id='signup-header'>
        <header class="header--banner"><h1>Sign Up</h1></header>
        <p class="header--text">
           Register Your New Account Here!
        </p> <!-- /header-text -->
        
    <?php 
        $username = sanitize($_POST['username']);

//if the username entered doesn't already exist - continue           
        if(!usernameExists($username)) {
            $name = sanitize($_POST['name']);
            $password = sanitize($_POST['password']);
            $dob = sanitize($_POST['dob']);
            $image = 'default.jpeg';

//check if something was entered for about. If it was, sanitize it. If not, give it a default value
            if(!empty($_POST['about'])) {
                $about = sanitize($_POST['about']);
            } else {
                $about = 'User has not posted a description about themselves yet.';
            }

//encrypt the secrect password reset answers
            $fave_pet = password_hash(sanitize($_POST['fave_pet']), PASSWORD_BCRYPT, array('cost' => 12));
            $fave_food = password_hash(sanitize($_POST['fave_food']), PASSWORD_BCRYPT, array('cost' => 12));
            $born_at = password_hash(sanitize($_POST['born_at']), PASSWORD_BCRYPT, array('cost' => 12));


    //encrypt the password
           $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

            $stmt = $db->prepare("INSERT into ba_users (username, name, password, date_of_birth, image, about, fave_pet, fave_food, born_at) VALUES(:username, :name, :password, :date_of_birth, :image, :about, :fave_pet, :fave_food, :born_at)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':date_of_birth', $dob);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':about', $about);
            $stmt->bindParam(':fave_pet', $fave_pet);
            $stmt->bindParam(':fave_food', $fave_food);
            $stmt->bindParam(':born_at', $born_at);
            $stmt->execute();

            echo "<h3 class='confirmation-message-success'>Your new account has been created!</h3>";
/*set a boolean variable, this will be set to 'true' if nothing goes wrong. If it's true and everything passes then show confirmation, otherwise reload the page as it was before being submitted */
            $displayImageForm = true;
        } else {
//display error message if user is trying to enter a duplicate username 
             echo "<h3 class='confirmation-message-fail'>That username already exists. Please try another one</h3>";
        }

        if($displayImageForm) {
    //after account is created, display the new form to upload an image

    ?>
           </div> <!-- /header -->
          
          <div class="main" id='signup-main'>
            <h3 class="main--heading">Account Created Successfully!</h3>
            <p>Log in now to join the fun!</p>
            <div class="main--content">
                <div class='upload-buttons'>
                    <a class="btn-birdey-wrapper" href="login.php"><input type="button" class="btn-birdey" value="Login"></a>
                </div> <!-- /upload-buttons -->
            </div> <!-- /content -->
          </div> <!-- /main -->
       
    <?php
        }
        
        else {
            //display the original page with an error message if there was an error
            
        ?>
        
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
              <form enctype="multipart/form-data" method="post" name="signupForm">
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
                       <label class='upload-section--label' for="image">Choose an image to upload as a profile image: </label>
                       <input type="file" name="image">
                       <small>~Adding a profile image is optional~</small>
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
        <script src="js/signup.js"></script>
    </div> <!-- /main -->

        <?php
        };
    ?>