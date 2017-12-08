<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/functions.php'; ?>
       
    <div class="header" id="loginHeader">
        <header class="header--banner"><h1>Log In</h1></header>
        <p class="header--text">
           Log In Here, and Share Your Art!
        </p> <!-- /header-text -->
    
    <?php
//set a boolean to check that there weren't any errors
        
//when the submit button is pressed, get the entered userdata, and query the database to log the user in
        $username = sanitize($_POST['username']);
        $password = sanitize($_POST['password']);

        if(!empty($username) && !empty($password)) {
            if(usernameExists($username)) {
                $stmt = $db->prepare("SELECT * FROM ba_users WHERE username = :username");
                $stmt->bindParam(':username', $username);
                $stmt->execute();

                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //verify the password compared to the one stored in the database
                    $db_password = $row['password'];       
                    if(password_verify($password, $db_password)) {          
    //set the SESSION variables and redirect to the front page, if passwords match
                        $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['name'] = $row['name'];

                        //header("Location: index.php");
                        $loginFail = false;
                    } else {
    //display error message if passwords don't match
                        echo "<h3 class='confirmation-message-fail'>The password is incorrect. Please try again.</h3>";
                        $loginFail = true;
                    }
                }
            } else {
//display error message for incorrect username/password
                echo "<h3 class='confirmation-message-fail'>Incorrect username or password. Please try again.</h3>";
                $loginFail = true;
            }
        } else {
//display error message if fields were left blank 
            echo "<h3 class='confirmation-message-fail'>Fields cannot be blank. Please complete all fields.</h3>";
            $loginFail = true;
        }
        
        if($loginFail) {
            
    ?>
          
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

                <button class="btn-birdey" id="login-form button" name='submit'>Submit</button>
            </form> <!-- /loginForm -->
            <p>
                Don't remember your password? <a class='upload--link' href="lost-password.php">Click Here</a>
            </p>
        </div> <!-- /content -->
    </div> <!-- /main -->
    
    <?php
        } else {
            
    ?>
       
       </div> <!-- /header -->
    
     <div class="main" id="loginMain">
        <h3 class="main--heading">You Are Now Logged In!</h3>
        <div class="main--content">
            <a class="btn-birdey-wrapper" href="index.php"><input type="button" class="btn-birdey" value="Home"></a>
        </div> <!-- /content -->
     </div> <!-- /main -->
       
    <?php
        }
    ?>