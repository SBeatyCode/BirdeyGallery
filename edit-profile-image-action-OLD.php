<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/functions.php'; ?>
<?php include 'includes/header.php'; ?>
              
              
<div class="header" id='profileImageHeader'>
<header class="header--banner"><h1>Edit Profile Image</h1></header>
                
                
<?php
    if(isset($_SESSION['user_id'])) {

        $user_id = $_SESSION['user_id'];
        
        //$image = $_FILES['image']['name'];
        //check if the file uploaded is an image
        if(checkImage($_FILES["image"]["name"])) {
        
        //rename the image before uploading
            $sourcePath = $_FILES['image']['tmp_name'];
            $temp = explode("." , $_FILES["image"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $image = $newfilename;
            $destination = 'images/profilePics/' . $newfilename;
            
            if(move_uploaded_file($sourcePath, $destination)) {
                $stmt = $db->prepare("UPDATE ba_users set image = :image WHERE user_id = :user_id");
                $stmt->bindParam(':user_id', $user_id);
                $stmt->bindParam(':image', $image);
                $stmt->execute();
                
//set a boolean to test if the image upload was successful. If it was, display the success message and page. if not, display error and original page
                $noErrors = true;
            } else {
        //display error message if there wjas a problem uploading the image 
                echo "<h3 class='confirmation-message-fail'>Something went wrong when uploading the image. Please try again, or contact the Web Administrator.</h3>";
            }

        } else {
        //display error message if the file being uploaded isn't an image
             echo "<h3 class='confirmation-message-fail'>Only images can be uploaded. Please upload a jpg, jpeg, gif, or png file only.</h3>";
        }

?>


<?php
            if($noErrors) {
                //display confirmation and the rest of the page
?>
            <p class="header--text">
               Profile Image Added Successfully!
            </p> <!-- /header-text -->
        </div> <!-- /header -->

              <div class="main" id='signup-main'>
                <h3 class="main--heading">You Have Successfully Added a Profile Image!</h3>
                
                <div id='profileImage'>
                   <img class="frontpage-images--image" src="images/profilePics/<?php echo $image; ?>">
                </div> <!-- /profileImage -->
                
                <div class="main--content">
                    <a href='profile.php?id=<?php echo  ?>'><button class='btn-birdey'>To Profile</button></a>
                </div> <!-- /content -->
              </div> <!-- /main -->

<?php
                
        } else {
                //display the image-upload page again with an error message
        
?>
                <p class="header--text">
                   Update Your Profile Image Here!
                </p> <!-- /header-text -->
            </div> <!-- /header -->

            <div class='main' id='profileImageMain'>
                <div class="main--content">
                    <form enctype="multipart/form-data" method="post" name="profileImageForm" id="profileImageForm">
                        <div class='upload-section'>
                           <label class='upload-section--label' for="image">Choose an image to upload as a profile image: </label>
                           <input type="file" name="image">
                        </div> <!-- /upload-section -->
                    </form> <!-- /signupFormImage -->

                    <div class='upload-buttons'>
                        <button class="btn-birdey upload-buttons--btn" id='profileImage--submit' type="button" name="profileImage--submit">Submit</button>
                    </div> <!-- /upload-buttons -->
                    <a class="btn-birdey-wrapper" href="edit-profile.php"><input type="button" class="btn-birdey" value="Edit Profile"></a>
                </div> <!-- /content -->
            </div> <!-- /main -->                  
<?php
        
            }
            
    } else {
        header("Location: index.php");
    }
?>