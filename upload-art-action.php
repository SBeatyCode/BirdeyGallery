<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/functions.php'; ?>    
    
<?php

    if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != null) {
        $artist_id = $_SESSION['user_id']
    } else {
        header("Location: index.php");
    }

?>

    <div class="header">
        <header class="header--banner"><h1>Upload Art</h1></header>
        <p class="header--text">
           Post a new work of art here!
        </p> <!-- /header-text -->

<?php
//check if the file uploaded is an image
        if(checkImage($_FILES["image"]["name"])) {
//rename the image before uploading
            $sourcePath = $_FILES['image']['tmp_name'];
            $temp = explode(".", $_FILES["image"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $image = $newfilename;
            $destination = 'images/art/' . $newfilename;

//moving the image        
            if(move_uploaded_file($sourcePath, $destination)) {
                $art_title = 'No Title';
                $art_date = date('m-d-Y');
                $description = 'No Description Yet';
                $tag = 'Other';
                
                $stmt = $db->prepare("INSERT into ba_art (artist_id, art_title, image, dateCreated, description, tag) VALUES(:artist_id, :art_title, :image, :dateCreated, :description, :tag)");
                $stmt->bindParam(':artist_id', $artist_id);
                $stmt->bindParam(':art_title', $art_title);
                $stmt->bindParam(':image', $image);
                $stmt->bindParam(':dateCreated', $art_date);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':tag', $tag);
                $stmt->execute();

                $noErrors = true;
            } else {
//display error message if there wjas a problem uploading the image 
                echo "<h3 class='confirmation-message-fail'>Something went wrong when uploading the image. Please try again, or contact the Web Administrator.</h3>";
            }
        } else {
//display error message if the file being uploaded isn't an image
            echo "<h3 class='confirmation-message-fail'>Only images can be uploaded. Please upload a jpg, jpeg, gif, or png file only.</h3>";
        }

        if($noErrors) {
//get the art_id of the image that was just uploaded
            $stmtID = $db->prepare("SELECT * FROM ba_art ORDER BY art_id DESC LIMIT 1");
            $stmtID->execute();

            while($row = $stmtID->fetch(PDO::FETCH_ASSOC)) {
                $art_id = $row['art_id'];
            }
    ?>
        <h3 class='confirmation-message-success'>Your artwork has been successfully uploaded!</h3>
    </div> <!-- /header -->
    
    <div class="main">
        <h3 class="main--heading">You can edit the information about your art below</h3>
        
        <?php 
//include art-info to update the information about the newly uploaded art-work
            include("art-info.php?art_id=$art_id"); 
        ?>
        
        <div class="main--content">
        </div>
    </div>
    <?php
        } else {
    ?>
       
    </div> <!-- /header -->
    
    <div class="main">
        <h3 class="main--heading">Please fill the information about your art here:</h3>

        <div class="main--content">
            <div class='upload-wrapper'>
              <form enctype="multipart/form-data" method="post">
                    <div class='upload-section'>
                       <label class='upload-section--label' for="image">Choose an image to upload: </label>
                       <input type="file" name="image">
                    </div> <!-- /upload-section -->

                    <div class='upload-section'>
                        <label class='upload-section--label' for="artName">Title of Piece</label>
                        <input type="text" placeholder="Name of Art" name="art_title">
                    </div> <!-- /upload-section -->
                    
                    <div class='upload-section'>
                       <label class='upload-section--label' for="artTag">Select a Tag For Your Art</label>
                        <select id="artTag">
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
                        <input type="date" class="date" name="art_date">
                    </div> <!-- /upload-section -->

                    <div class='upload-section'>
                        <label class='upload-section--label' for="description">Write a description</label>
                        <textarea class='responsive-textarea' placeholder="Say something about the piece here..." name="description"></textarea>
                    </div> <!-- /upload-section -->

                    <div class='upload-buttons'>
                        <button class="btn-birdey upload-buttons--btn" type="reset" name="reset">Reset</button>
                        <button class="btn-birdey upload-buttons--btn" type="submit" name="submit">Submit</button>
                    </div> <!-- /upload-section -->
              </form>
            </div> <!-- /upload-wrapper -->

        </div> <!-- /content -->
    </div> <!-- /main -->
       
    <?php
        }
    ?>