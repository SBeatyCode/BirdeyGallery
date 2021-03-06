<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<div class="container" id="galleryContainer">
    <div class="header" id="galleryHeader">
        <header class="header--banner"><h1>Art Gallery</h1></header>
        <p class="header--text">
           View all uploaded artwork by all users!
        </p> <!-- /header-text -->
    </div> <!-- /header -->
    
    <div class="main" id="galleryMain">
        <h3 class="main--heading">Gallery</h3>
        
        <h4><p>View By Tag:</p></h4>
        
        <ul class="main--filters--wrapper">
            <li class="main--filters" id="watercolor">Watercolor</li>
            <li class="main--filters--spacing">&diams; &nbsp;</li>
            <li class="main--filters" id="painting">Painting</li>
            <li class="main--filters--spacing">&diams; &nbsp;</li>
            <li class="main--filters" id="pencil">Pencil</li>
            <li class="main--filters--spacing">&diams; &nbsp;</li>
            <li class="main--filters" id="pen_ink">Pen/Ink</li>
            <li class="main--filters--spacing">&diams; &nbsp;</li>
            <li class="main--filters" id="digital">Digital</li>
            <li class="main--filters--spacing">&diams; &nbsp;</li>
            <li class="main--filters" id="pixel_art">Pixel Art</li>
            <li class="main--filters--spacing">&diams; &nbsp;</li>
            <li class="main--filters" id="photography">Photography</li>
            <li class="main--filters--spacing">&diams; &nbsp;</li>
            <li class="main--filters" id="other">Other</li>
        </ul>
        
        <div class="main--content">
            <div class="gallery-images">
               
            <?php
           //get all images from the database     
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
                
            </div> <!-- /gallery-images -->
        </div> <!-- /content -->
    </div> <!-- /main -->
</div> <!-- /container -->


<?php include 'includes/footer.php'; ?>