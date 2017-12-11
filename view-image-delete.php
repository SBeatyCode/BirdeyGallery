<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/functions.php'; ?>
       

<?php

//if the delete variable set in the JS code is true, then delete the art posting, and all comments attached to it
    if($_POST['delete'] === 'true') {
            $delete_id = $_SESSION['art_id'];
            $stmt = $db->prepare("DELETE FROM ba_art WHERE art_id = :art_id");
            $stmt->bindParam(':art_id', $delete_id);
            $stmt->execute();
        
            $stmt = $db->prepare("DELETE FROM ba_comments WHERE art_id = :art_id");
            $stmt->bindParam(':art_id', $delete_id);
            $stmt->execute();
    } else {
        header("Location: index.php");
    }

?>
       
     
    <div class="header" id="viewImageHeader">
        <header class="header--banner"><h1>Image Deleted</h1></header>
        <h3 class='confirmation-message-success'>Your artwork has been successfully removed!</h3>
    </div> <!-- /header -->
    
    <div class="main" id="viewImageMain">
        <div class="main--content">
           <h3>Image was successfully deleted!</h3>
           <a class="btn-birdey-wrapper" href="profile.php?id=<?php echo $_SESSION['user_id']; ?>"><input type="button" class="btn-birdey" value="Profile"></a>
        </div> <!-- /content -->
        <script src="js/deleteImage.js"></script>
    </div> <!-- /main -->