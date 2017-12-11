<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<div class="container">
    <div class="header">
        <header class="header--banner"><h1>Birdey Gallery</h1></header>
        
        <?php
            if(isLoggedIn()) {
                
        ?>
        Welcome Back, <a class="header--text--link" id="header--frontpage-username" href="profile.php?id=<?php echo $_SESSION['user_id'] ?>"><?php echo $_SESSION['name']; ?></a>!
        <p class="header--text">Start by checking out the <a class="header--text--link" href="gallery.php">Gallery</a>, or <a class="header--text--link" href=upload-art.php>post your own art!</a></p>

       
        <?php
            } else {
                
        ?>
        
        <p class="header--text">
           Welcome to Birdey Gallery! This is a site to share your art, and to discover the art posted by others! Take a look around, and enjoy!
        </p> <!-- /header-text -->
        <p class="header--text">Start by checking out the <a class="header--text--link" href="gallery.php">Gallery</a>, or <a class="header--text--link" href="login.php">log in</a> to post your own art and post comments!</p>
       
        <?php
            }
        ?>

    </div> <!-- /header -->
    
    <div class="main">
        <h3 class="main--heading">Recent Art Postings</h3>

        <div class="main--content">
            <div class="frontpage-images">
               
               <?php
           //get the 4 most recent images from the database     
                    $stmt = $db->prepare("SELECT * FROM ba_art ORDER BY art_id DESC LIMIT 4");
                    $stmt->execute();

                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $art_id = $row['art_id'];
                        $artist_id = $row['artist_id'];
                        $title = $row['art_title'];
                        $image = $row['image'];
                        
            //get artist name
                        $stmtName = $db->prepare("SELECT * FROM ba_users WHERE user_id = :user_id");
                        $stmtName->bindParam(':user_id', $artist_id);
                        $stmtName->execute();

                        while($row = $stmtName->fetch(PDO::FETCH_ASSOC)) {
                            $user_id = $row['user_id'];
                            $username = $row['username'];
                        }
                ?>
                
                <div class="frontpage-images--image-wrapper">
                    <a href="view-image.php?art_id=<?php echo $art_id; ?>"><img class="frontpage-images--image" id="image-1" src="images/art/<?php echo $image; ?>"></a>
                    <label><a class="frontpage-images--link" href="view-image.php?art_id=<?php echo $art_id; ?>"><em><?php echo $title; ?></em></a> by <a class="frontpage-images--link" href="profile.php?id=<?php echo $user_id; ?>"><?php echo $username; ?></a></label>
                </div> <!-- /frontpage-images--image-wrapper -->
                
                <?php
                    }
                
                ?>

                
<!--
                <div class="frontpage-images--image-wrapper">
                    <a href=""><img class="frontpage-images--image" id="image-2" src="images/art/birbsPage.jpg"></a>
                    <label>'KK Slider' by <a class="frontpage-images--link" href="">Nintendo</a></label>
                </div>  /frontpage-images--image-wrapper 
-->
                
            </div> <!-- /frontpage-images -->
            
            <p>
                This is a paragragh that talks a little bit more about the site, maybe!
            </p>
        </div> <!-- /content -->
    </div> <!-- /main -->
</div> <!-- /container -->


<?php include 'includes/footer.php'; ?>