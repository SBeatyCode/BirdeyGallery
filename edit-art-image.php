<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<?php

    if(isset($_SESSION['art_id']) && $_SESSION['art_id'] != null) {
        $art_id = $_SESSION['art_id'];
    } else {
        header("Location: index.php");
    }
       
    $stmtDB = $db->prepare("SELECT * FROM ba_art WHERE art_id = :art_id");
    $stmtDB->bindParam(':art_id', $art_id);
    $stmtDB->execute();

    while($row = $stmtDB->fetch(PDO::FETCH_ASSOC)) {
        $db_image = $row['image'];
    }

?>

<div class="container" id="editArtImageContainer">
    <div class="header" id="editArtImageHeader">
        <header class="header--banner"><h1>Edit Art</h1></header>
        <p class="header--text">
           Change your Art's Image
        </p> <!-- /header-text -->
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
                   <input type="file" name="image" id="image">
                </div> <!-- /upload-section -->
                
                <div class='upload-buttons'>
                    <button class="btn-birdey upload-buttons--btn" type="button" name="editArtImageSubmit" id="editArtImageSubmit">Submit</button>
                </div> <!-- /upload-section -->
              </form>
            </div> <!-- /upload-wrapper -->
        </div> <!-- /content -->
    </div> <!-- /main -->
</div> <!-- /container -->
  

<?php include 'includes/footer.php'; ?>