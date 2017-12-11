<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/functions.php'; ?>
 
<?php          
    if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != null) {
       $user_id = $_SESSION['user_id'];
        
        $stmtIMG = $db->prepare("SELECT * FROM ba_users WHERE user_id = :user_id");
        $stmtIMG->bindParam(':user_id', $user_id);
        $stmtIMG->execute();
        
        while($row = $stmtIMG->fetch(PDO::FETCH_ASSOC)) {
            $db_image = $row['image'];
        }
    } else {
        header("Location: index.php");
    }
?>

<div class="container" id='profileImageContainer'>
    <div class="header" id='profileImageHeader'>
        <header class="header--banner"><h1>Edit Profile Image</h1></header>
        <p class="header--text">
           Update Your Profile Image Here!
        </p> <!-- /header-text -->

<?php

//check if the file uploaded is an image
        if(checkImage($_FILES["image"]["name"])) {
//rename the image before uploading
            $temp = explode(".", $_FILES["image"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $image = $newfilename;
            $destination = 'images/profilePics/' . $newfilename;

            if(move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                $stmt = $db->prepare("UPDATE ba_users set image = :image WHERE user_id = :user_id");
                $stmt->bindParam(':user_id', $user_id);
                $stmt->bindParam(':image', $image);
                $stmt->execute();

                $noErrors = true;
            } else {
//display error message if moving the image doesn't work
                echo "<h3 class='confirmation-message-fail'>There was a problem moving the image. Please try again, or contact the Site Administrator.</h3>";
            }
        } else {
//display error message if the file being uploaded isn't an image
            echo "<h3 class='confirmation-message-fail'>Only images can be uploaded. Please upload a jpg, jpeg, gif, or png file only.</h3>";
        }
        
        if($noErrors) {
            //show confirmation message
?>
       <h3 class='confirmation-message-success'>User image has been updated!</h3>
    </div> <!-- /header -->
    
    <div class='main' id='profileImageMain'>
        <div class="main--content">
            <a class="btn-birdey-wrapper" href="index.php"><input type="button" class="btn-birdey" value="Home"></a>
        </div> <!-- /content -->
    </div> <!-- /main -->
    
<?php
        } else {
?>
          </div> <!-- /header -->
    
        <div class='main' id='profileImageMain'>
            <div class="main--content">
                <form enctype="multipart/form-data" method="post" name="profileImageForm" id="profileImageForm">
                   <div>
                       <img class="frontpage-images--round--image" src="images/profilePics/<?php echo $image; ?>">
                   </div> 

                    <div class='upload-section'>
                       <label class='upload-section--label' for="image">Choose an image to upload as a profile image: </label>
                       <input type="file" name="image" id="profileImageUpload">
                    </div> <!-- /upload-section -->

                    <div class='upload-buttons'>
                        <button class="btn-birdey upload-buttons--btn" id='profileImage--submit' type="button" name="profileImage--submit">Submit</button>
                    </div> <!-- /upload-buttons -->
                </form> <!-- /profileImageForm -->
                <a class="btn-birdey-wrapper" href="edit-profile.php"><input type="button" class="btn-birdey" value="Edit Profile"></a>
            </div> <!-- /content -->
            <script src="js/profile-image.js"></script>
        </div> <!-- /main -->                           
<?php
        }
                    
?>