<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<div class="container">
    <div class="header">
        <header class="header--banner"><h1>Art Gallery</h1></header>
        <p class="header--text">
           View all uploaded artwork by all users!
        </p> <!-- /header-text -->
    </div> <!-- /header -->
    
    <div class="main">
        <h3 class="main--heading">Gallery</h3>

        <p>
            Click an image to go to the artist's page.
        </p>
        
        <h4><p>View By Tag:</p></h4>
        
        <ul class="main--filters--wrapper">
            <li class="main--filters" id="Watercolor">Watercolor</li>
            <li class="main--filters--spacing">&diams; &nbsp;</li>
            <li class="main--filters" id="paint">Painting</li>
            <li class="main--filters--spacing">&diams; &nbsp;</li>
            <li class="main--filters" id="Watercolor">Pencils</li>
            <li class="main--filters--spacing">&diams; &nbsp;</li>
            <li class="main--filters" id="Watercolor">Pen/Ink</li>
            <li class="main--filters--spacing">&diams; &nbsp;</li>
            <li class="main--filters" id="Watercolor">Digital</li>
            <li class="main--filters--spacing">&diams; &nbsp;</li>
            <li class="main--filters" id="Watercolor">Pixel Art</li>
            <li class="main--filters--spacing">&diams; &nbsp;</li>
            <li class="main--filters" id="Watercolor">Photography</li>
            <li class="main--filters--spacing">&diams; &nbsp;</li>
            <li class="main--filters" id="Watercolor">Other</li>
        </ul>
        
        <div class="main--content">
            <div class="gallery-images">
               
            <?php
           //get the 4 most recent images from the database     
                    $stmt = $db->prepare("SELECT * FROM ba_art ORDER BY art_id DESC");
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
                <div class="gallery-images--image-wrapper">
                    <a href="view-image.php?art_id=<?php echo $art_id; ?>"><img class="gallery-images--image" src="images/art/<?php echo $image; ?>"></a>
                    <label><a class="gallery-images--link" href="view-image.php?art_id=<?php echo $art_id; ?>"><?php echo $title; ?></a> by <a class="gallery-images--link" href="profile.php?id=<?php echo $user_id; ?>"><?php echo $username; ?></a></label>
                </div> <!-- /gallery-images--image-wrapper -->
            <?php
                    }
            ?>

                
<!--
                <div class="gallery-images--image-wrapper">
                    <a href=""><img class="gallery-images--image" id="image-1" src="images/art/polls_profiles_totakeke_3907_348576_xlarge_0419_833896_poll_xlarge.jpeg"></a>
                    <label>'KK Slider' by <a class="gallery-images--link" href="">Nintendo</a></label>
                </div>  /gallery-images--image-wrapper 
-->
                
            </div> <!-- /gallery-images -->
        </div> <!-- /content -->
    </div> <!-- /main -->
</div> <!-- /container -->


<?php include 'includes/footer.php'; ?>