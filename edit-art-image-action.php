<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/functions.php'; ?>

<?php

    if(isset($_SESSION['art_id'] && $_SESSION['art_id'] != null) {
        $art_id = $_SESSION['art_id'];
    } else {
        header("Location: index.php");
    }
?>

<div class="container" id="editArtImageContainer">
    <div class="header" id="editArtImageHeader">
        <header class="header--banner"><h1>Edit Art</h1></header>
        <p class="header--text">
           Change your Art's Image
        </p> <!-- /header-text -->
        
<?php
  
//check if the file uploaded is an image
    if(checkImage($_FILES["image"]["name"])) {
//rename the image before uploading
        $temp = explode(".", $_FILES["image"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $image = $newfilename;
        $destination = 'images/art/' . $newfilename;

        if(move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
            $stmt = $db->prepare("UPDATE ba_art SET image = :image WHERE art_id = :art_id");
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':art_id', $art_id);
            $stmt->execute();
            
            $noErrors = true;
            echo "<h3 class='confirmation-message-success'>Image Has Been Updated!</h3>";
        }
    } else {
        //display error message if the file being uploaded isn't an image
        echo "<h3 class='confirmation-message-fail'>Only images can be uploaded. Please upload a jpg, jpeg, gif, or png file only.</h3>";
    }
       
    if($noErrors) {
        //display confirmation
?>
   </div> <!-- /header -->
    
    <div class="main" id="editArtImageMain">
    <h3 class="main--heading">The image for your artwork has been successfully updated!</h3>
        <div class="main--content">
            <a class="btn-birdey-wrapper" href="view-image.php?art_id=<?php echo $art_id; ?>"><input type="button" class="btn-birdey" value="View Art"></a>
        </div> <!-- /content -->
    </div> <!-- /main -->
<?php
    } else {
?>
   
    </div> <!-- /header -->
    
    <div class="main" id="editArtImageMain">
    <h3 class="main--heading">Edit the information about your art here:</h3>
        <div class="main--content">
            <div class='upload-wrapper'>          
              <form enctype="multipart/form-data" method="post" id="editArtImageForm" name="editArtImageForm">
                  <div class='upload-section'>
                    <label>Current Image</label>
                    <img class='upload-section-img' src='images/art/<?php echo $db_image; ?>'>
                  </div> <!-- /upload-section-->
                  
                  <div class='upload-section'>
                   <label class='upload-section--label' for="image">Choose a new image to upload: </label>
                   <input type="file" name="image">
                </div> <!-- /upload-section -->
                
                <div class='upload-buttons'>
                    <button class="btn-birdey upload-buttons--btn" type="button" name="editArtImageSubmit">Submit</button>
                </div> <!-- /upload-section -->
              </form>
            </div> <!-- /upload-wrapper -->
        </div> <!-- /content -->
    </div> <!-- /main -->
   
<?php
    }      
?>