<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>
            
 <?php

    if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != null) {
       $user_id = $_SESSION['user_id'];
        
        $stmt = $db->prepare("SELECT * FROM ba_users WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $image = $row['image'];
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
    </div> <!-- /main -->                                                                              
</div> <!-- /container -->


<?php include 'includes/footer.php'; ?>