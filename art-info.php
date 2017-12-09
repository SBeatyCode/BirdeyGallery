<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/functions.php'; ?>
      
<?php

    if(isset($_SESSION['art_id'])) {
        $art_id = $_SESSION['art_id'];
    } else {
        header('index.php');
    }

    $stmtIMG = $db->prepare("SELECT * FROM ba_art WHERE art_id = :art_id");
    $stmtIMG->bindParam(':art_id', $art_id);
    $stmtIMG->execute();

    while($row = $stmtIMG->fetch(PDO::FETCH_ASSOC)) {
        $db_image = $row['image'];
    }

?>
       
    <div class="main" id="artInfoMain">
        <h3 class="main--heading">Edit the information about your art here:</h3>

        <div class="main--content">
            <div class='upload-wrapper'>
              <form enctype="multipart/form-data" method="post" id="artInfoForm" name="artInfoForm">
                   <div class='upload-section'>
                      <label>Image:</label>
                       <img class="frontpage-images--round--image" src="images/profilePics/<?php echo $image; ?>">      
                   </div> <!-- /upload-section-->
                   
                    <div class='upload-section'>
                        <label class='upload-section--label' for="artName">Title of Piece</label>
                        <label class='error-message' id='art_title-error'></label>
                        <input type="text" placeholder="Name of Art" name="art_title" id="art_title">
                    </div> <!-- /upload-section -->
                    
                    <div class='upload-section'>
                       <label class='upload-section--label' for="artTag">Select a Tag For Your Art</label>
                        <select name="art_Tag" id="art_Tag">
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
                        <label class='error-message' id='art_date-error'></label>
                        <input type="date" class="date" name="art_date" id="art_date">
                    </div> <!-- /upload-section -->

                    <div class='upload-section'>
                        <label class='upload-section--label' for="description">Write a description</label>
                        <textarea class='responsive-textarea' placeholder="Say something about the piece here..." name="art_description" id="art_description"></textarea>
                    </div> <!-- /upload-section -->

                    <div class='upload-buttons'>
                        <button class="btn-birdey upload-buttons--btn" type="reset" name="reset">Reset</button>
                        <button class="btn-birdey upload-buttons--btn" type="button" name="submit" id="artInfoSubmit">Submit</button>
                    </div> <!-- /upload-section -->
              </form>
            </div> <!-- /upload-wrapper -->

        </div> <!-- /content -->
    </div> <!-- /main -->