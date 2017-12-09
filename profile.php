<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<?php

    if(isset($_GET['id'])) {
        $user_id = $_GET['id'];
        
        $stmt = $db->prepare("SELECT * FROM ba_users WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['user_id'];
            $name = $row['name'];
            $db_username = $row['username'];
            $user_image = $row['image'];
            $about = $row['about'];
            $image = $row['image'];
        }
    }

//get the number of artworks they've created, as well as the art itself

    $stmtArt = $db->prepare("SELECT * FROM ba_art WHERE artist_id = :artist_id");
    $stmtArt->bindParam(':artist_id', $user_id);
    $stmtArt->execute();

    $numberOfPieces = $stmtArt->rowCount();
?>

<div class="container">
    <div class='profile-container'>
        <aside>
            <div class='profile-wrapper'>
                <div class='profile'>
                   <header><h1><?php echo $db_username; ?>'s Profile</h1></header>
                    <img class='profile--pic' src="images/profilePics/<?php echo $image; ?>">
                    <div class='profile--info'>
                        <div><?php echo $db_username; ?></div><br>
                        <div>Number of Art Pieces: <em><?php echo $numberOfPieces; ?></em></div>
                        <div class='profile--about'>
                            <p><em><?php echo $about; ?></em></p>
                        </div>

                         <!-- Display edit link, only if the user is the one logged in and viewing their own profile -->
                        <?php
                            if($user_id == $_SESSION['user_id']) {
                        ?>
                        <div><a class='profile-gallery--link' href="edit-profile.php">Edit Profile</a></div>
                        <h3>Post new art by clicking <a class='profile-gallery--link' href="upload-art.php">here</a>!</h3>
                        <?php
                            }
                        ?>
                    </div> <!-- /profile--info -->
                </div> <!-- /profile -->
            </div> <!-- /profile-wrapper -->
        </aside>

        <div class='profile-gallery'>
            
           <?php
    //display the art in the gallery section
                while($row = $stmtArt->fetch(PDO::FETCH_ASSOC)) {
                    $art_id = $row['art_id'];
                    $title = $row['art_title'];
                    $image = $row['image'];
                    $artist = $row['artist']
            ?>
            
            <div class="profile-gallery--image-wrapper">
                <img class="profile-gallery--image" src="images/art/<?php echo $image; ?>">
                <label><a class="profile-gallery--link" href="view-image.php?art_id=<?php echo $art_id; ?>"><?php echo $title; ?></a></label>
            </div> <!-- /profile-gallery--image-wrapper -->
            
            <?php
                }
            
                if($numberOfPieces <= 0) {
                    
            ?>
               
               <h3>Sorry, this user hasn't shared any art yet!</h3>

            <?php
                }
            ?>
            
        </div> <!-- profile-gallery -->
    </div> <!-- /profile-container -->
</div> <!-- /container -->

<div class='modal' id='modal'>
   <div id='modal-close'>&times;</div>
    <div class='modal-image-wrapper'>
        <img class='modal-image' id='modal-image' src=''>
    </div> <!-- /modal-box -->
</div> <!-- /modal -->

<script src="js/modal.js"></script>

<?php include 'includes/footer.php'; ?>