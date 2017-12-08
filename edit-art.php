<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<?php

    if(isset($_GET['art_id']) {
        $art_id = $_GET['art_id']
        $_SESSION['art_id'] = $art_id;
    } else {
        header("Location: index.php");
    }
       
    $stmtDB = $db->prepare("SELECT * FROM ba_art WHERE art_id = :art_id");
    $stmtDB->bindParam(':art_id', $art_id);
    $stmtDB->execute();

    while($row = $stmtDB->fetch(PDO::FETCH_ASSOC)) {
        $db_title = $row['art_title'];
        $db_image = $row['image'];
        $db_date = $row['dateCreated'];
        $db_description = $row['description'];
        $db_tag = $row['tag'];;
    }

?>

<div class="container" id="editArtContainer">
    <div class="header" id="editArtHeader">
        <header class="header--banner"><h1>Edit Art</h1></header>
        <p class="header--text">
           Edit your Art Information
        </p> <!-- /header-text -->
    </div> <!-- /header -->
    
    <div class="main" id="editArtMain">
        <h3 class="main--heading">Edit the information about your art here:</h3>

        <div class="main--content">
            <div class='upload-wrapper'>
              <form enctype="multipart/form-data" method="post" id="editArtForm" name="editArtForm">
                   <div class='upload-section'>
                      <label>Current Image</label>
                       <img class='upload-section-img' src='images/art/<?php echo $db_image; ?>'>
                   </div> <!-- /upload-section-->
                   
                   <div class='upload-section'>
                      <label>Current Image</label>
                       <h3>Want to update your artwork's image? Edit it <a class="header--text--link" href="edit-art-image.php">here</a>!</h3>
                   </div> <!-- /upload-section-->
                   
                    <div class='upload-section'>
                        <label class='upload-section--label' for="artName">Title of Piece</label>
                        <input type="text" value="<?php echo $db_title; ?>" name="art_title">
                    </div> <!-- /upload-section -->
                    
                    <div class='upload-section'>
                       <label class='upload-section--label' for="artTag">Select a Tag For Your Art</label>
                        <select id="artTag" value="<?php echo $db_tag; ?>">
                            <option>Painting</option>
                            <option>Watercolor</option>
                            <option>Pencil</option>
                            <option>Pen/Ink</option>
                            <option>Digital</option>
                            <option>Pixel</option>
                            <option>Photograghy</option>
                            <option>Other</option>
                        </select>
                    </div> <!-- /upload-section -->

                    <div class='upload-section'>
                        <label class='upload-section--label' for="artDate">Date Created </label>
                        <input type="date" class="date" name="art_date" value="<?php echo $db_date; ?>">
                    </div> <!-- /upload-section -->

                    <div class='upload-section'>
                        <label class='upload-section--label' for="description">Write a description</label>
                        <textarea class='responsive-textarea' value="<?php echo $db_description; ?>" name="description"></textarea>
                    </div> <!-- /upload-section -->

                    <div class='upload-buttons'>
                        <button class="btn-birdey upload-buttons--btn" type="reset" name="reset">Reset</button>
                        <button class="btn-birdey upload-buttons--btn" type="button" name="editArtSubmit">Submit</button>
                    </div> <!-- /upload-section -->
              </form>
            </div> <!-- /upload-wrapper -->

        </div> <!-- /content -->
    </div> <!-- /main -->
</div> <!-- /container -->


<?php include 'includes/footer.php'; ?>