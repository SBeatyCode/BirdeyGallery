<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/functions.php'; ?> 
   
    <div class="header" id='signup-header'>
        <header class="header--banner"><h1>Sign Up</h1></header>
        <p class="header--text">
           Register Your New Account Here!
        </p> <!-- /header-text -->
        
    <?php
//if the submit button is pressed, and the fields are all filled, take the user information and create a new user account
        if(isset($_POST['submit'])) {
    //set a boolean variable, this will be set to 'false' is anything goes wrong. If it's true and everything passes then show confirmation
            $noErrors = true;
            
            if(!empty($_POST['name']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['dob']) && !empty($_POST['about']) && !empty($_POST['fave_pet']) && !empty($_POST['fave_food']) && !empty($_POST['born_at'])) {
                $username = sanitize($_POST['username']);
                
     //if the username entered doesn't already exist - continue           
                if(!usernameExists($username)) {
                    $name = sanitize($_POST['name']);
                    $password = sanitize($_POST['password']);
                    $dob = sanitize($_POST['dob']);
                    
        //encrypt the secrect password reset answers
                    $fave_pet = password_hash(sanitize($_POST['fave_pet']), PASSWORD_BCRYPT, array('cost' => 12));
                    $fave_food = password_hash(sanitize($_POST['fave_food']), PASSWORD_BCRYPT, array('cost' => 12));
                    $born_at = password_hash(sanitize($_POST['born_at']), PASSWORD_BCRYPT, array('cost' => 12));
                    $to_visit = password_hash(sanitize($_POST['to_visit']), PASSWORD_BCRYPT, array('cost' => 12));
                    
        //check if the file uploaded is an image
                    if(checkImage($_FILES["image"]["name"])) {
        //rename the image before uploading
                        $temp = explode(".", $_FILES["image"]["name"]);
                        $newfilename = round(microtime(true)) . '.' . end($temp);
                        $image = $newfilename;
                        $destination = 'images/profilePics/' . $newfilename;
                        
                //encrypt the password
                        $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

                        if(move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                            $stmt = $db->prepare("INSERT into ba_users (username, name, password, date_of_birth, isAdmin, image, fave_pet, fave_food, born_at, to_visit) VALUES(:username, :name, :password, :date_of_birth, :isAdmin, :image, :fave_pet, :fave_food, :born_at, :to_visit)");
                            $stmt->bindParam(':username', $username);
                            $stmt->bindParam(':name', $name);
                            $stmt->bindParam(':password', $password);
                            $stmt->bindParam(':date_of_birth', $dob);
                            $stmt->bindValue(':isAdmin', 0);
                            $stmt->bindParam(':image', $image);
                            $stmt->bindParam(':fave_pet', $fave_pet);
                            $stmt->bindParam(':fave_food', $fave_food);
                            $stmt->bindParam(':born_at', $born_at);
                            $stmt->bindParam(':to_visit', $to_visit);
                            $stmt->execute();

                            echo "<h3 class='bg-success confirm-msg'>Your new account has been created!</h3><br><br>";
                            echo "<a href='login.php'><button class='btn btn-birdey'>Click to log in</button></a>";
                        } else {
        //display error message if there wjas a problem uploading the image 
                            echo "<h3 class='bg-danger warning-msg'>Something went wrong when uploading the image. Please try again, or contact the Web Administrator.</h3><br><br>";
                        }
                    } else {
    //display error message if the file being uploaded isn't an image
                        echo "<h3 class='bg-danger warning-msg'>Only images can be uploaded. Please upload a jpg, jpeg, gif, or png file only.</h3><br><br>";
                    }
                } else {
    //display error message if user is trying to enter a duplicate username 
                    echo "<h3 class='bg-danger warning-msg'>That username already exists. Please try another one</h3><br><br>";
                }
            } else {
  //display error message if fields were left blank 
                echo "<h3 class='confirmation-message-fail'>Please Complete All Fields</h3>";
                $noErrors = false;
            }
        }
        
        if($noErrors) {
            //display confirmation and the rest of the page
        } else {
            //display the original page - maybe just include it here?
        }

    ?>
    
</div> <!-- /header -->