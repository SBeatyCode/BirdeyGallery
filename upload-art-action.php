<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/functions.php'; ?>    
    
<?php

    if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != null) {
        $artist_id = $_SESSION['user_id'];
    } else {
        header("Location: index.php");
    }

?>

    <div class="header" class="artInfoHeader">
        <header class="header--banner"><h1>Upload Art</h1></header>

<?php

//check if the file uploaded is an image
        if(checkImage($_FILES["image"]["name"])) {
//rename the image before uploading
            $temp = explode(".", $_FILES["image"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $image = $newfilename;
            $destination = 'images/art/' . $newfilename;

            if(move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                $art_title = 'No Title';
                $art_date = date('m-d-Y');
                $description = 'No Description Yet';
                $tag = 'Other';
                
                $stmt = $db->prepare("INSERT into ba_art (artist_id, art_title, image, dateCreated, description) VALUES(:artist_id, :art_title, :image, :dateCreated, :description)");
                $stmt->bindParam(':artist_id', $artist_id);
                $stmt->bindParam(':art_title', $art_title);
                $stmt->bindParam(':image', $image);
                $stmt->bindParam(':dateCreated', $art_date);
                $stmt->bindParam(':description', $description);
                $stmt->execute();

    //get the art_id of the image that was just uploaded
                $stmtID = $db->prepare("SELECT * FROM `ba_art` ORDER BY art_id DESC LIMIT 1");
                $stmtID->execute();

                while($row = $stmtID->fetch(PDO::FETCH_ASSOC)) {
                    $_SESSION['art_id'] = $row['art_id'];
                }
                
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
    ?>
        <h3 class='confirmation-message-success'>Your artwork has been successfully uploaded!</h3>
    </div> <!-- /header -->
    
    <div class="main" id="artInfoMain">
        <h3 class="main--heading">Edit the information about your art here:</h3>

        <div class="main--content">
            <div class='upload-wrapper'>
              <form enctype="multipart/form-data" method="post" id="artInfoForm" name="artInfoForm">
<!--
                   <div class='upload-section'>
                      <label>Image:</label>
                       <img class="frontpage-images--round--image" src="images/profilePics/<?php #echo $image; ?>">      
                   </div>  /upload-section
-->
                   
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
    <script src="js/art-info.js"></script>
    <?php
        } else {
    ?>
       
    </div> <!-- /header -->
    
    <div class="main" id="uploadArtMain">
        <h3 class="main--heading">Please select the image you would like to upload, then you can fill out the information about it.</h3>

        <div class="main--content">
            <div class='upload-wrapper'>
              <form enctype="multipart/form-data" method="post" name="uploadArtForm" id="uploadArtForm">
                    <div class='upload-section'>
                       <label class='upload-section--label' for="image">Choose an image to upload: </label>
                       <input type="file" name="image" id="uploadArtImage">
                    </div> <!-- /upload-section -->

                    <div class='upload-buttons'>
                        <button class="btn-birdey upload-buttons--btn" type="button" name="uploadArtSubmit" id="uploadArtSubmit">Submit</button>
                    </div> <!-- /upload-section -->
              </form>
            </div> <!-- /upload-wrapper -->

        </div> <!-- /content -->
    </div> <!-- /main -->
       
    <?php
        }
    ?>