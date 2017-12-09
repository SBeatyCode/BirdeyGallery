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
        Welcome Back, <span class="header--username"><?php echo $_SESSION['name']; ?></span>!
    </div> <!-- /header -->
       
        <?php
            } else {
                
        ?>
        <p class="header--text">
           Welcome to Birdey Gallery! This is a site to showcase the art and photography of Birdeynamnam. Take a look around, and enjoy!
        </p> <!-- /header-text -->
        <p class="header--text">Start by checking out the <a class="header--text--link" href="gallery.php">Gallery</a>, or <a class="header--text--link" href="login.php">log in</a> to post your own art and post comments!</p>
    </div> <!-- /header -->
       
        <?php
            }
        ?>
    
    <div class="main">
        <h3 class="main--heading">Recent Art Postings</h3>

        <div class="main--content">
            <div class="frontpage-images">
               
               <?php
           //get the 4 most recent images from the database     
                    $stmt = $db->prepare("SELECT * FROM ba_art LIMIT 4");
                    $stmt->execute();

                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $art_id = $row['art_id'];
                        $artist_id = $row['artist_id'];
                        $title = $row['art_title'];
                        $image = $row['image'];
                        
                        $stmtName = $db->prepare("SELECT * FROM ba_users WHERE user_id = :user_id");
                        $stmtNAME->bindParam(':user_id', $artist_id);
                        $stmtName->execute();

                        while($row = $stmtName->fetch(PDO::FETCH_ASSOC)) {
                            $user_id = $row['user_id'];
                            $username = $row['username'];
                        }
            //get artist name
                ?>
                
                <div class="frontpage-images--image-wrapper">
                    <a href=""><img class="frontpage-images--image" id="image-1" src="images/art/<?php echo $image; ?>"></a>
                    <label><em><?php echo $title; ?></em> by <a class="frontpage-images--link" href="profile.php?user_id=<?php echo $user_id; ?>"><?php echo $username; ?></a></label>
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